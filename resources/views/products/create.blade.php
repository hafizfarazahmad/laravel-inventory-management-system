@extends('layouts.app')
@section('title', 'Product Create')
@section('content')

    <div class="content-header ms-2 me-2 mt-2">
        <h2>Products</h2>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h3 class="card-title">Add Product</h3>
            </div>

            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @include('products._form')
                </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-primary float-end">Save</button>
                    <a href="{{ route('product.index') }}" class="btn btn-secondary float-end me-2">Cencel</a>
                </div>
            </form>
        </div>
    </div>


@endsection
