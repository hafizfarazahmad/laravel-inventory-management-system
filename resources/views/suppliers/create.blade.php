@extends('layouts.app')
@section('title', 'Supplier Create')
@section('content')
@section('breadcrumb')
    <h3>Add Supplier</h3>
@endsection
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('supplier.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        @include('suppliers._form')
                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-primary btn-sm float-end">Save</button>
                        <a href="{{ route('supplier.index') }}"
                            class="btn btn-secondary float-end btn-sm me-2">Cencel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection
