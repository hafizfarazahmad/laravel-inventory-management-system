<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data['products'] = Product::where('status', 1)->get();
        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::where('status', 1)->get();
        return view('products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        $product = new Product();
        $product->category_id    = $data['category_id'];
        $product->name           = $data['name'];
        $product->sku            = $data['sku'];
        $product->barcode        = $data['barcode'];
        $product->purchase_price = $data['purchase_price'];
        $product->sale_price     = $data['sale_price'];
        $product->stock          = $data['stock'];
        $product->minimum_stock  = $data['minimum_stock'];
        $product->unit           = $data['unit'];
        $product->description    = $data['description'];
        $product->status         = $data['status'];

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            
            $product->image = $imageName;
        }
        $product->save();
        return redirect()->route('product.index')->with('success', 'Products Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['product'] = Product::findOrFail($id);
        $data['categories'] = Category::all();
        return view('products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $data = $request->validated();

        $product = Product::findOrFail($id);
        $product->category_id    = $data['category_id'];
        $product->name           = $data['name'];
        $product->sku            = $data['sku'];
        $product->barcode        = $data['barcode'];
        $product->purchase_price = $data['purchase_price'];
        $product->sale_price     = $data['sale_price'];
        $product->stock          = $data['stock'];
        $product->minimum_stock  = $data['minimum_stock'];
        $product->unit           = $data['unit'];
        $product->description    = $data['description'];
        $product->status         = $data['status'];

          if ($request->hasFile('image')) {
            // Purani image delete karo
            if ($product->image && file_exists(public_path('uploads/products/' . $product->image))) {
            unlink(public_path('uploads/products/' . $product->image));
            }
            // New image upload karo
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $product->image = $imageName;
        }
        $product->save();
        return redirect()->route('product.index')->with('success', 'Products Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if($product->image && file_exsits(public_path('uploads/products/' . $product->image))){
            unlink(public_path('uploads/products/'. $product->image));
        }
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product Deleted Successfully');
    }
}