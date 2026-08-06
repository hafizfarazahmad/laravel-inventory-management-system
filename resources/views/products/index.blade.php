@extends('layouts.app')
@section('title', 'Product List')
@section('content')

@section('breadcrumb')
    <div class="content-header ms-2 me-2 mt-2">
        <h2>Product List</h2>
    </div>
@endsection
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm "
                        style="border-radius: 0px !important">
                        <i class="bi bi-plus-circle"></i> Add Product</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover data-list" id="productTable">
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
                                                <img class="img-thumbnail"
                                                    src="{{ asset('uploads/products/' . $product->image) }}"
                                                    height="50" width="50">
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
                                            <form action="{{ route('product.destroy', $product->id) }}"
                                                class="d-inline delete-btn" method="POST">
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
</div>

@endsection

@push('scripts')
<script>
    new DataTable('#productTable', {
        responsive: true,
        pageLength: 10,
        lengthMenu: [10, 25, 50, 100],

        layout: {
            topStart: {
                buttons: [
                    'copy',
                    'csv',
                    'excel',
                    'pdf',
                    'print',
                    'colvis'
                ]
            }
        }
    });
</script>
@endpush
