@extends('layouts.app')
@section('title', 'Purchase Create')
@section('content')
@section('breadcrumb')
    <h3>Add Purchase</h3>
@endsection

<form action="{{ route('purchase.store') }}" method="POST">
    @csrf
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('purchases._form')
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5>Purchase Items</h5>
                </div>
                <div class="card-body">
                    @include('purchases._purchase_item_table')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary float-end">Save</button>
                    <a href="{{ route('purchase.index') }}" class="btn btn-sm btn-secondary float-end me-2">Cencel</a>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
