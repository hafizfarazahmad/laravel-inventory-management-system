@extends('layouts.app')
@section('title', 'Edit Category')
@section('content')

@section('breadcrumb')
    <div class="row">
        <div class="col-md-12">
            <h3>Categories</h3>
        </div>
    </div>
@endsection


<div class="container-fluid mt-4">
    <div class="row mt-2 me-2 ms-2">
        <div class="col-md-12">
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h3 class="card-title">Edit Category</h3>
                    </div>
                    <div class="card-body">
                        @include('categories._form')
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm float-end">Update</button>
                        <a href="{{ route('category.index') }}"
                            class="btn btn-secondary float-end me-2 btn-sm">Cencle</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
