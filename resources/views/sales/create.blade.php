@extends('layouts.app')
@section('title', 'Sale Create')
@section('content')
@section('breadcrumb')
    <h3>Add Sale</h3>
@endsection
<div class="row mt-4">
    <div class="col-md-12">
        <form action="{{ route('sale.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    @include('sales._form')
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5>Sales Items</h5>
                </div>
                <div class="card-body">
                    @include('sales._sale_item_table')
                </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-primary btn-sm float-end">Save</button>
                    <a href="{{ route('sale.index') }}" class="btn btn-secondary btn-sm float-end me-2">Cencel</a>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
