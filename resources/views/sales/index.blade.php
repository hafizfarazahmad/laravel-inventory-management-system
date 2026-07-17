@extends('layouts.app')
@section('title', 'Sale List')
@section('content')
    <div class="content-header ms-2 me-2 mt-2">
        <h2>Sales</h2>
    </div>

    <div class="row ms-2 me-2 mt-2 mb-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Sale List</h3>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('sale.create') }}" class="btn btn-primary float-end"> <i
                                    class="bi bi-plus-circle"></i> Add Sale</a>
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
                                    <th>Sale Date</th>
                                    <th>Customer</th>
                                    <th>Total Items</th>
                                    <th>Grand Total</th>
                                    <th>Status</th>
                                    <th width="120">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sales as $sale)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sale->invoice_no ?? '' }}</td>
                                        <td>{{ $sale->sale_date?? '' }}</td>
                                        <td>{{ $sale->customer->name?? '' }}</td>
                                        <td>{{ $sale->sale_items_count?? '' }}</td>
                                        <td>{{ $sale->grand_total?? '' }}</td>
                                        <td>
                                            @if ($sale->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('sale.show', $sale->id) }}" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a>
                                            <a href="{{ route('sale.edit', $sale->id) }}"
                                                class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('sale.destroy', $sale->id) }}" class="d-inline"
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
