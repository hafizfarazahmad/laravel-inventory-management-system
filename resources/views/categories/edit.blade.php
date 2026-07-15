@extends('layouts.app')
@section('title', 'Edit Category')
@section('content')

    <div class="content-header ms-2 me-2 mt-2">
        <h2>Categories</h2>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h3 class="card-title">Edit Category</h3>
            </div>
        </div>

        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                @include('categories._form')
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-end">Update</button>
                <a href="{{ route('category.index') }}" class="btn btn-secondary float-end me-2">Cencle</a>
            </div>
        </form>
    </div>
    </div>


@endsection
