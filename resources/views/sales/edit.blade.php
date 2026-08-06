@extends('layouts.app')
@section('title', 'Sale Edit')
@section('content')
@section('breadcrumb')
    <h3>Edit Sale</h3>
@endsection
<div class="row mt-4">
    <div class="col-md-12">
        <form action="{{ route('sale.update', $sale->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">

                    @include('sales._form')
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5>Sale Items</h5>
                </div>
                <div class="card-body">
                    @include('sales._sale_item_table')
                </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-primary btn-sm float-end">Update</button>
                    <a href="{{ route('sale.index') }}" class="btn btn-secondary btn-sm float-end me-2">Cencel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
