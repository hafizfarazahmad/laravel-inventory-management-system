@extends('layouts.app')
@section('title', 'Edit Products')
@section('content')

    <div class="content-header ms-2 me-2 mt-2">
        <h2>Products</h2>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
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
                <div class="card-footer float-end">
                    <button type="submit" class="btn btn-primary text-end">Update</button>
                    <a href="{{ route('product.index') }}" class="btn btn-secondary text-end">Cencle</a>
                </div>
            </form>
        </div>
    </div>


@endsection
