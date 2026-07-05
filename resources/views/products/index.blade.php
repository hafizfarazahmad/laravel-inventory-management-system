@extends('layouts.app')
@section('title', 'Product List')
@section('content')

    <div class="content-header ms-2 me-2 mt-2">
        <h2>Products</h2>
    </div>

    <div class="row ms-2 me-2 mt-2 mb-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Product List</h3>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('product.create') }}" class="btn btn-primary float-end"> <i
                                    class="bi bi-plus-circle"></i> Add Product</a>
                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover data-list" id="categoryTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th width="120">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->category->name }}</td>

                                        <td>
                                            @if ($product->image)
                                                <img class="img-thumbnail" src="{{ asset('uploads/products/'. $product->image) }}" height="50"
                                                    width="50">
                                            @else
                                                <span>No Image Found</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            @if ($product->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('product.destroy', $product->id) }}" class="d-inline"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No Data Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
