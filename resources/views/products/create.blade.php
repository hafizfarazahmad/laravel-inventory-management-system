@extends('layouts.app')
@section('title', 'Product Create')
@section('content')
@section('breadcrumb')
    <div class="content-header ms-2 me-2 mt-2">
        <h2>Add Product</h2>
    </div>
@endsection



<div class="container-fluid mt-2 me-2 ms-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @include('products._form')
                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-primary float-end btn-sm">Save</button>
                        <a href="{{ route('product.index') }}"
                            class="btn btn-secondary btn-sm float-end me-2">Cencel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
