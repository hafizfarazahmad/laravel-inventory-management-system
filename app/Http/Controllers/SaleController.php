<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Customer;
use App\Models\Product;
use App\Http\Requests\SaleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class SaleController extends Controller
{
     private function generateInvoiceNo()
    {
        $lastSale = Sale::latest()->first();
        if($lastSale){
            $lastNumber = (int) str_replace('INV-', '',$lastSale->invoice_no); 
            return 'INV-' . str_pad($lastNumber + 1, 6, '0', STR_PAD_LEFT);
    }
    return 'INV-00001';
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['sales'] = Sale::with('customer')->withcount('saleItems')->latest()->get();
        return view('sales.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['customers'] = Customer::all();
        $data['products'] = Product::all();
        $data['invoiceNo'] = $this->generateInvoiceNo();
        return view('sales.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleRequest $request)
    {
        $data = $request->validated();
        DB::beginTransaction();
        try{
            $sale = new Sale();
            $sale->customer_id = $data['customer_id'];
            $sale->sale_date   = $data['sale_date'];
            $sale->invoice_no  = $data['invoice_no'];
            $sale->note        = $data['note'];
            $sale->status      = $data['status'];
            $sale->grand_total = $data['grand_total'];
            $sale->save();
        
            foreach($data['product_ids'] as $key => $productId)
            {
                $item = new SaleItem();
                $item->sale_id      = $sale->id;
                $item->product_id   = $productId; 
                $item->quantity     = $data['quantity'][$key];
                $item->sale_price   = $data['sale_price'][$key];
                $item->total        = $data['total'][$key];
                $item->save();
                $product = Product::find($productId);
                if ($product->stock < $data['quantity'][$key]) {
                        throw new \Exception('Insufficient stock.');
                    }
                $product->stock    -= $data['quantity'][$key];
                $product->save();
        }
        DB::commit();
        return redirect()->route('sale.index')->with('success', 'Sale Added Successfully');
        } catch(\Exception $e){
            DB::rollBack();
            return back()->withInput()->with('error', $e->getMessage());
        }
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['sale'] = Sale::findOrFail($id);
        return view('sales.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $data['sale'] = Sale::findOrFail($id);
        $data['customers'] = Customer::all();
        $data['products'] = Product::all();
        return view('sales.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaleRequest $request, string $id)
    {
        $data = $request->validated();
        DB::beginTransaction();
        try {
           
            $sale = Sale::findOrFail($id);
            foreach ($sale->saleItems as $item) {
                $product         = Product::find($item->product_id);
                if($product){
                    $product->stock += $item->quantity;
                    $product->save();
                }
            }
            $sale->customer_id   = $data['customer_id'];
            $sale->sale_date = $data['sale_date'];
            $sale->note          = $data['note'];
            $sale->status        = $data['status'];
            $sale->grand_total   = $data['grand_total'];
            $sale->save(); 
            $sale->saleItems()->delete();
            foreach($data['product_ids'] as $key => $productId){
                $item = new SaleItem();
                $item->sale_id = $sale->id;
                $item->product_id = $productId;
                $item->quantity = $data['quantity'][$key];
                $item->sale_price = $data['sale_price'][$key];
                $item->total = $data['total'][$key];
                $item->save();
                $product = Product::find($productId);
                if ($product->stock < $data['quantity'][$key]) {
                    throw new \Exception('Insufficient stock.');
                }
                $product->stock -= $data['quantity'][$key];
                $product->save(); 
                    
            }
            DB::commit();
            return redirect()->route('sale.index')->with('success','Sale Updated Successfully');
        }catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    DB::beginTransaction();

    try {

        $sale = Sale::findOrFail($id);

        foreach ($sale->saleItems as $item) {

            $product = Product::find($item->product_id);

            if ($product) {
                $product->stock += $item->quantity;
                $product->save();
            }
        }

        $sale->saleItems()->delete();
        $sale->delete();

        DB::commit();

        return redirect()->route('sale.index')
            ->with('success', 'Sale Deleted Successfully');

    } catch (QueryException $e) {

        DB::rollBack();

        return back()->with(
            'error',
            'This record cannot be deleted because it is being used.'
        );

    } catch (\Exception $e) {

        DB::rollBack();

        return back()->with(
            'error',
            'Something went wrong.'
        );
    }
}   
public function sale_report(Request $request)
{
    $data['customers'] = Customer::all();
    $data['sales'] = Sale::with('customer')->withcount('saleItems')->latest()->get();
    if($request->isMethod('post'))
    {
        $data['from_date'] = $request->input('from_date');
        $data['to_date'] = $request->input('to_date');
        $data['customer_id'] = $request->input('customer_id');

        $query = Sale::with('customer')->withcount('saleItems')->latest();

        if ($data['from_date']) {
            $query->whereDate('sale_date', '>=', $data['from_date']);
        }

        if ($data['to_date']) {
            $query->whereDate('sale_date', '<=', $data['to_date']);
        }

        if ($data['customer_id']) {
            $query->where('customer_id', $data['customer_id']);
        }

        $data['sales'] = $query->get();
    }

    return view('sales.report', $data);
}
}