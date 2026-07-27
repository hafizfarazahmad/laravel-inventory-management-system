@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
    <div class="container-fluid mb-4">
        <div class="row mb-3">
            <div class="col-lg-12">
                <h1 class="h3 mb-0 text-gray-800">Product Details</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-0">
                                <tr>
                                    <th>Product Name</th>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $product->category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Cost</th>
                                    <td>{{ number_format($product->purchase_price) }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ number_format($product->sale_price) }}</td>
                                </tr>
                                <tr>
                                    <th>Quantity</th>
                                    <td>{{ $product->stock}}</td>
                                </tr>
                                <tr>
                                    <th>Stock Worth</th>
                                    <td>
                                        COST:: {{ number_format($product->purchase_price * $product->stock) }} /
                                        PRICE:: {{ number_format($product->sale_price * $product->stock) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Alert Quantity</th>
                                    <td>{{ $product->minimum_stock }}</td>
                                </tr>
                                <tr>
                                    <th>Note</th>
                                    <td>{{ $product->description ?? 'N/A' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card h-100">
                    <div class="card-body">
                       <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



