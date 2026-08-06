@extends('layouts.app')
@section('title', 'Edit Supplier')
@section('content')
@section('breadcrumb')
    <h3>Edit Supplier</h3>
@endsection
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @include('suppliers._form')
                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-primary float-end btn-sm">Update</button>
                        <a href="{{ route('supplier.index') }}"
                            class="btn btn-secondary btn-sm float-end me-2">Cencle</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection
