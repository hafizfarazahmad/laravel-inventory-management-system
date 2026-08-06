@extends('layouts.app')
@section('title', 'Edit Customer')
@section('content')
@section('breadcrumb')
    <h2>Edit Customer</h2>
@endsection

<div class="container-fluid">
    <div class="row mt-4 me-2 ms-2">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @include('customers._form')
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm float-end ms-2">Update</button>
                        <a href="{{ route('customer.index') }}" class="btn btn-sm btn-secondary float-end">Cencle</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
