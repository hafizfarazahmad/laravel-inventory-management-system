@extends('layouts.app')
@section('title', 'Category Create')
@section('content')

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
                    <a href="{{ route('category.index') }}" class="btn btn-secondary text-end">Cencle</a>
                </div>
            </form>
        </div>
    </div>


@endsection
