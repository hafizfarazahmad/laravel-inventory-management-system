@extends('layouts.app')
@section('title', 'Sale Create')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2 class="text-left">Sales</h2>
            </div>
        </div>
    </div>

    <form action="{{ route('sale.store') }}" method="POST">
        <div class="card me-4 ms-4 mt-2 ">
            <div class="card-header bg-dark text-white">
                <h5>Sale Information</h5>
            </div>
            <div class="card-body">
                @csrf

                @include('sales._form')
            </div>
        </div>

        <div class="card me-4 ms-4 mt-2">
            <div class="card-header bg-dark text-white">
                <h5>Sales Items</h5>
            </div>
            <div class="card-body">
                @include('sales._sale_item_table')
            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-primary float-end">Save</button>
                <a href="{{ route('sale.index') }}" class="btn btn-secondary float-end me-2">Cencel</a>
            </div>
        </div>
    </form>

@endsection
