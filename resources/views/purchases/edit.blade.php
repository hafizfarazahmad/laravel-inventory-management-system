@extends('layouts.app')
@section('title', 'Purchase Edit')
@section('content')
@section('breadcrumb')
    <h3>Edit Purchase</h3>
@endsection
<div class="row mt-4">
    <div class="col-md-10 offset-1">
        <form action="{{ route('purchase.update', $purchase->id) }}" method="POST">
            @csrf
            @method('PUT')
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
                <div class="card-footer ">
                    <button type="submit" class="btn btn-primary btn-sm float-end">Update</button>
                    <a href="{{ route('purchase.index') }}" class="btn btn-sm btn-secondary float-end me-2">Cencel</a>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
