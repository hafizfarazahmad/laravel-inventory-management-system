<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['sales'] = Sale::where('status', 1)->latest()->take(4)->get();
        $data['category'] = Category::where('status', 1)->count();
        $data['product'] = Product::where('status', 1)->count();
        $data['customer'] = Customer::where('status', 1)->count();
        $data['sale'] = Sale::where('status', 1)->count();
        $data['low_stocks'] = Product::where('stock', '<=', 'minimum_stock')->get();
        return view('dashboard.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}