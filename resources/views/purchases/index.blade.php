@extends('layouts.app')
@section('title', 'Purchase List')
@section('content')
    <div class="content-header ms-2 me-2 mt-2">
        <h2>Purchases</h2>
    </div>

    <div class="row ms-2 me-2 mt-2 mb-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Purchase List</h3>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('purchase.create') }}" class="btn btn-primary float-end"> <i
                                    class="bi bi-plus-circle"></i> Add Purchase</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover data-list" id="categoryTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Invoice Name</th>
                                    <th>Purchase Date</th>
                                    <th>Supplier</th>
                                    <th>Total Items</th>
                                    <th>Grand Total</th>
                                    <th>Status</th>
                                    <th width="120">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($purchases as $purchase)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $purchase->invoice_no ?? '' }}</td>
                                        <td>{{ $purchase->purchase_date?? '' }}</td>
                                        <td>{{ $purchase->supplier->name?? '' }}</td>
                                        <td>{{ $purchase->purchase_items_count?? '' }}</td>
                                        <td>{{ $purchase->grand_total?? '' }}</td>
                                        <td>
                                            @if ($purchase->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('purchase.show', $purchase->id) }}" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a>
                                            <a href="{{ route('purchase.edit', $purchase->id) }}"
                                                class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('purchase.destroy', $purchase->id) }}" class="d-inline"
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
                                        <td colspan="8" class="text-center">No Data Found</td>
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
