@extends('layouts.app')
@section('title', 'Current Stock')
@section('content')
@section('breadcrumb')
    <h3>Current Stock</h3>
@endsection
<div class="container mt-2">
    <div class="row mt-4">
        <div class="col-col-md-12
            <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Current Stock</th>
                            <th>Stock Alert</th>
                            <th>shortage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name ?? '' }}</td>
                                <td>{{ $product->category->name ?? '' }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->minimum_stock ?? '' }}</td>
                                <td>{{ $product->minimum_stock - $product->stock ?? '' }}</td>
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
