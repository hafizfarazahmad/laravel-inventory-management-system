@extends('layouts.app')
@section('title', 'Edit Products')
@section('content')

    <div class="container">
        <h2>Products</h2>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="card-title">Edit Product</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('product.index') }}" class="btn btn-secondary float-end">Back</a>
                    </div>
                </div>
                
            </div>

            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @include('products._form')
                </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-primary float-end">Update</button>
                    <a href="{{ route('product.index') }}" class="btn btn-secondary float-end me-2">Cencle</a>
                </div>
            </form>
        </div>
    </div>


@endsection
