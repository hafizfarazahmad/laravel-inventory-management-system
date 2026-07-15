<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Http\Requests\PurchaseRequest;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use Illuminate\Support\Facades\DB;


class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function generateInvoiceNo()
    {
        $lastPurchase = Purchase::latest()->first();
        if($lastPurchase){
            $lastNumber = (int) str_replace('PUR-', '',$lastPurchase->invoice_no); 
            return 'PUR-' . str_pad($lastNumber + 1, 6, '0', STR_PAD_LEFT);
    }
    return 'PUR-00001';
}
    public function index()
    {
        $data['purchases'] = Purchase::with('supplier')->withcount('purchaseItems')->latest()->get();
        return view('purchases.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['products'] = Product::all();
        $data['suppliers'] = Supplier::all();
        $data['invoiceNo'] = $this->generateInvoiceNo();
        return view('purchases.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PurchaseRequest $request)
    {
        $data = $request->validated();
        DB::beginTransaction();
        try{
            $lastPurchase = Purchase::latest()->first();

            if($lastPurchase){
             $lastNumber = (int) str_replace('PUR-', '', $lastPurchase->invoice_no);
             $invoiceNo  = 'PUR-' . str_pad($lastNumber +1, 6, '0', STR_PAD_LEFT); 
            }else{
                $invoiceNo = 'PUR-000001';
            }

            $purchase = new Purchase();
            $purchase->supplier_id = $data['supplier_id'];
            $purchase->purchase_date = $data['purchase_date'];
            $purchase->invoice_no    = $invoiceNo;
            $purchase->note          = $data['note'];
            $purchase->status        = $data['status'];
            $purchase->grand_total   = $data['grand_total'];
            $purchase->save();
    
            foreach($request->product_ids as $key => $productId){
                $item = new PurchaseItem();
                $item->purchase_id = $purchase->id;
                $item->product_id = $productId;
                $item->quantity = $data['quantity'][$key];
                $item->purchase_price = $data['purchase_price'][$key];
                $item->total = $data['total'][$key];
                $item->save();
                $product = Product::findOrFail($productId);
              
                    $product->stock += $data['quantity'][$key];
                    $product->save();
                    
                
            }

        DB::commit();
        return redirect()->route('purchase.index')->with('success', 'Purchase Added Successfully');
    } catch (\Exception $e) {

        DB::rollBack();

        return back()
            ->withInput()
            ->with('error', $e->getMessage());
    }
    
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['purchase'] = Purchase::findOrFail($id);
        return view('purchases.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['purchase'] = Purchase::findOrFail($id);
        $data['suppliers'] = Supplier::all();
        $data['products'] = Product::all();
        return view('purchases.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PurchaseRequest $request, string $id)
    {
        $data = $request->validated();
        DB::beginTransaction();
        try {
           
        $purchase = Purchase::findOrFail($id);
        foreach ($purchase->purchaseItems as $item) {
            $product         = Product::find($item->product_id);
            if($product){
            $product->stock -= $item->quantity;
            $product->save();
            }
        }
        $purchase->supplier_id   = $data['supplier_id'];
        $purchase->purchase_date = $data['purchase_date'];
        $purchase->note          = $data['note'];
        $purchase->status        = $data['status'];
        $purchase->grand_total   = $data['grand_total'];
        $purchase->save();
        
        $purchase->purchaseItems()->delete();
        foreach($data['product_ids'] as $key => $productId){
                $item = new PurchaseItem();
                $item->purchase_id = $purchase->id;
                $item->product_id = $productId;
                $item->quantity = $data['quantity'][$key];
                $item->purchase_price = $data['purchase_price'][$key];
                $item->total = $data['total'][$key];
                $item->save();
                $product = Product::find($productId);
                    $product->stock += $data['quantity'][$key];
                    $product->save(); 
                    
            }
            DB::commit();
            return redirect()->route('purchase.index')
        ->with('success','Purchase Updated Successfully');
    }
     catch (\Exception $e) {
    DB::rollBack();
     dd($e->getMessage());

    return back()
        ->withInput()
        ->with('error', $e->getMessage());
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {

            $purchase = Purchase::findOrFail($id);

            foreach ($purchase->purchaseItems as $item) {

                $product = Product::find($item->product_id);

                if ($product) {
                    $product->stock -= $item->quantity;
                    $product->save();
                }
            }

            $purchase->purchaseItems()->delete();

            $purchase->delete();

            DB::commit();

            return redirect()->route('purchase.index')
                ->with('success', 'Purchase Deleted Successfully');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }   
}