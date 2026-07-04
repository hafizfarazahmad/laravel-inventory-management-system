@extends('layouts.app')
@section('title', 'Category List')
@section('content')

    <div class="content-header ms-2 me-2 mt-2">
        <h2>Categories</h2>
    </div>

    <div class="row ms-2 me-2 mt-2 mb-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Category List</h3>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('category.create') }}" class="btn btn-primary float-end"> <i
                                    class="bi bi-plus-circle"></i> Add Category</a>
                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover data-list" id="categoryTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th width="120">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @if ($category->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}"
                                                class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                                <form action="{{ route('category.destroy', $category->id) }}" class="d-inline" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                                </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
