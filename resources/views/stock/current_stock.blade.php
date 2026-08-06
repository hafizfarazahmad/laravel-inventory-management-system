@extends('layouts.app')
@section('title', 'Current Stock')
@section('content')
@section('breadcrumb')
    <h3>Current Stock</h3>
@endsection
<div class="container">
    <div class="row mt-4">
        <div class="col-col-md-12
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>purchase Price</th>
                                <th>Sale Price</th>
                                <th>Current Stock</th>
                                <th>Stock Alert</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td><img src="{{ asset('uploads/products/' . $product->image) }}"
                                            alt="{{ $product->name }}" width="50"></td>
                                    <td>{{ $product->name ?? '' }}</td>
                                    <td>{{ $product->category->name ?? '' }}</td>
                                    <td>${{ number_format($product->purchase_price, 2 ?? '') }}</td>
                                    <td>${{ number_format($product->sale_price, 2 ?? '') }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->minimum_stock ?? '' }}</td>
                                    <td>
                                        @if ($product->stock >= $product->minimum_stock)
                                            <span class="badge bg-success">Normal</span>
                                        @elseif($product->stock <= $product->minimum_stock && $product->stock > 0)
                                            <span class="badge bg-danger">Low</span>
                                        @else
                                            <span class="badge bg-warning">Out of Stock</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
