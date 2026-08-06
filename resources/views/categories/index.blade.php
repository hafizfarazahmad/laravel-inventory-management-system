@extends('layouts.app')
@section('title', 'Category List')
@section('content')

@section('breadcrumb')
    <h3>Category List</h3>
@endsection

<div class="row mt-4 me-2 ms-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm show-loader"> <i
                        class="bi bi-plus-circle"></i>
                    Add Category</a>
                <hr>
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
                                                class="btn btn-primary btn-sm show-loader"><i
                                                    class="bi bi-pencil"></i></a>
                                            <form action="{{ route('category.destroy', $category->id) }}"
                                                class="d-inline delete-btn" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="bi bi-trash"></i></button>
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
@push('scripts')
    <script>
        new DataTable('#categoryTable', {
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
