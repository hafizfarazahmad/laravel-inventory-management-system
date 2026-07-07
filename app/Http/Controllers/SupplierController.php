<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['suppliers'] = Supplier::all();
        return view('suppliers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRequest $request)
    {
        $data =$request->validated();

        $supplier = new Supplier();
        $supplier->name = $data['name'];
        $supplier->email = $data['email'];
        $supplier->phone = $data['phone'];
        $supplier->status = $data['status'];
        $supplier->save();
        return redirect()->route('supplier.index')->with('success', 'Supplier Added Successfully');
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
        $data['supplier'] = Supplier::findOrFail($id);
        return view('suppliers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierRequest $request, string $id)
    {
          $data =$request->validated();

        $supplier = Supplier::findOrFail($id);
        $supplier->name = $data['name'];
        $supplier->email = $data['email'];
        $supplier->phone = $data['phone'];
        $supplier->status = $data['status'];
        $supplier->save();
        return redirect()->route('supplier.index')->with('success', 'Supplier Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success', 'Supplier Deleted Successfully');
    }
}