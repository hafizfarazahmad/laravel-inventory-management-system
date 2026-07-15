@extends('layouts.app')
@section('title', 'Edit Supplier')
@section('content')

    <div class="content-header ms-2 me-2 mt-2">
        <h2>Suppliers</h2>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="card-title">Edit Supplier</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('supplier.index') }}" class="btn btn-secondary float-end">Back</a>
                    </div>
                </div>
                
            </div>

            <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @include('suppliers._form')
                </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-primary float-end">Update</button>
                    <a href="{{ route('supplier.index') }}" class="btn btn-secondary float-end me-2">Cencle</a>
                </div>
            </form>
        </div>
    </div>


@endsection
