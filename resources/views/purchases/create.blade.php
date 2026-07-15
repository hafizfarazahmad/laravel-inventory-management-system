@extends('layouts.app')
@section('title', 'Purchase Create')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2 class="text-left">Purchases</h2>
            </div>
        </div>
    </div>

    <form action="{{ route('purchase.store') }}" method="POST">
        <div class="card me-4 ms-4 mt-2 ">
            <div class="card-header bg-dark text-white">
                <h5>Purchase Information</h5>
            </div>
            <div class="card-body">
                @csrf

                @include('purchases._form')
            </div>
        </div>

        <div class="card me-4 ms-4 mt-2">
            <div class="card-header bg-dark text-white">
                <h5>Purchase Items</h5>
            </div>
            <div class="card-body">
                @include('purchases._purchase_item_table')
            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-primary float-end">Save</button>
                <a href="{{ route('purchase.index') }}" class="btn btn-secondary float-end me-2">Cencel</a>
            </div>
        </div>
    </form>

@endsection
