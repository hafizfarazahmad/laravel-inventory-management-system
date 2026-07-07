@extends('layouts.app')
@section('title', 'Supplier Create')
@section('content')

    <div class="content-header ms-2 me-2 mt-2">
        <h2>Suppliers</h2>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Supplier</h3>
            </div>

            <form action="{{ route('supplier.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    @include('suppliers._form')
                </div>
                <div class="card-footer float-end">
                    <button type="submit" class="btn btn-primary text-end">Save</button>
                    <a href="{{ route('supplier.index') }}" class="btn btn-secondary text-end">Cencel</a>
                </div>
            </form>
        </div>
    </div>


@endsection
