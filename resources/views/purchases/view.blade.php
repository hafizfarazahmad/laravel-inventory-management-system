@extends('layouts.app')
@section('title', 'Purchase View')
@section('content')
    <div class="content-header ms-2 me-2 mt-2">
        <h2>Purchase View</h2>
    </div>

    <div class="row ms-2 me-2 mt-2 mb-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Purchase Details</h4>
                </div>
                <div class="card-body float-left">
                    <table>
                        <tr>
                            <th>Invoice No :</th>
                            <td>{{ $purchase->invoice_no ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Supplier :</th>
                            <td>{{ $purchase->supplier->name }}</td>
                        </tr>
                        <tr>
                            <th>Purchase Date :</th>
                            <td>{{ $purchase->purchase_date ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Status :</td>
                            <td>
                                @if ($purchase->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">InActive</span>
                                @endif
                            </td>
                        </tr>
                        <br><br>
                        <tr>
                            <th>Note :</th>
                            <td>{{ $purchase->note ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Grand Total :</th>
                            <td>Rs. {{ $purchase->grand_total }}</td>
                        </tr>
                    </table>
                    <p class="text-center">----------------------------------------------------------</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row me-2 ms-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Purchase Items</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Purchase Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchase->purchaseItems as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->product->name ?? '' }}</td>
                                        <td>{{ $item->quantity ?? '' }}</td>
                                        <td>Rs. {{ number_format($item->purchase_price, 2) }}</td>
                                        <td>Rs. {{ $item->total ?? '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">
                        Grand Total :
                        <strong>Rs. {{ number_format($purchase->grand_total, 2) }}</strong>
                    </h5>

                    <div>
                        <a href="{{ route('purchase.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>

                        <a href="{{ route('purchase.edit', $purchase->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <button type="button" class="btn btn-success" onclick="window.print()">
                            <i class="fas fa-print"></i> Print
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
