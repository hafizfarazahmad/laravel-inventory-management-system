@extends('layouts.app')
@section('title', 'Supplier List')
@section('content')
@section('breadcrumb')
    <h3>Supplier List</h3>
@endsection

<div class="row mt-4">
    <div class="col-md-10 offset-1">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('supplier.create') }}" class="btn btn-primary btn-sm show-loader"> <i
                        class="bi bi-plus-circle"></i> Add Supplier</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover data-list" id="supplierTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>Status</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $supplier->name ?? '' }}</td>
                                    <td>{{ $supplier->email ?? '' }}</td>
                                    <td>{{ $supplier->phone ?? '' }}</td>
                                    <td>
                                        @if ($supplier->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('supplier.edit', $supplier->id) }}"
                                            class="btn btn-primary btn-sm show-loader"><i class="bi bi-pencil"></i></a>
                                        <form action="{{ route('supplier.destroy', $supplier->id) }}"
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
    new DataTable('#supplierTable', {
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
