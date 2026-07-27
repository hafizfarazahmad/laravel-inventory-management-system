@extends('layouts.app')
@section('title', 'Category Create')
@section('content')
@section('breadcrumb')
    <div class="row">
        <div class="col-md-12">
            <h3>Add Categories</h3>
        </div>
    </div>
@endsection

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        @include('categories._form')
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-end btn-sm">Save</button>
                        <a href="{{ route('category.index') }}"
                            class="btn btn-secondary btn-sm float-end me-2">Cencel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

