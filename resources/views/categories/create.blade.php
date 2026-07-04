@extends('layouts.app')
@section('title', 'Category Create')
@section('content')

    <div class="content-header ms-2 me-2 mt-2">
        <h2>Categories</h2>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Category</h3>
            </div>

            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    @include('categories._form')
                </div>
                <div class="card-footer float-end">
                    <button type="submit" class="btn btn-primary text-end">Save</button>
                    <a href="{{ route('category.index') }}" class="btn btn-secondary text-end">Cencel</a>
                </div>
            </form>
        </div>
    </div>


@endsection
