@extends('layouts.app')
@section('title', 'Edit Customer')
@section('content')

    <div class="content-header ms-2 me-2 mt-2">
        <h2>Customers</h2>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="card-title">Edit Customer</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('customer.index') }}" class="btn btn-secondary float-end">Back</a>
                    </div>
                </div>
                
            </div>

            <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @include('customers._form')
                </div>
                <div class="card-footer float-end">
                    <button type="submit" class="btn btn-primary text-end">Update</button>
                    <a href="{{ route('customer.index') }}" class="btn btn-secondary text-end">Cencle</a>
                </div>
            </form>
        </div>
    </div>


@endsection
