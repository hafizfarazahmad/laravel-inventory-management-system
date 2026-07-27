@extends('layouts.app')
@section('title', 'Customer Create')
@section('content')
@section('breadcrumb')
    <h3>Add Customer</h3>
@endsection

<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-md-10 offset-1">
            <div class="card">
                <form action="{{ route('customer.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        @include('customers._form')
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm float-end ms-2">Save</button>
                        <a href="{{ route('customer.index') }}" class="btn btn-sm btn-secondary float-end">Cencel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
