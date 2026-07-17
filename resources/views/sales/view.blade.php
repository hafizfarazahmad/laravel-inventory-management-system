@extends('layouts.app')
@section('title', 'Sale View')
@section('content')
    <div class="content-header ms-2 me-2 mt-2">
        <h2>Sale View</h2>
    </div>

    <div class="row ms-2 me-2 mt-2 mb-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Sale Details</h4>
                </div>
                <div class="card-body float-left">
                    <table>
                        <tr>
                            <th>Invoice No :</th>
                            <td>{{ $sale->invoice_no ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Customer :</th>
                            <td>{{ $sale->customer->name }}</td>
                        </tr>
                        <tr>
                            <th>Sale Date :</th>
                            <td>{{ $sale->sale_date ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Status :</td>
                            <td>
                                @if ($sale->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">InActive</span>
                                @endif
                            </td>
                        </tr>
                        <br><br>
                        <tr>
                            <th>Note :</th>
                            <td>{{ $sale->note ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Grand Total :</th>
                            <td>Rs. {{ $sale->grand_total }}</td>
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
                    <h2>Sale Items</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Sale Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sale->saleItems as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->product->name ?? '' }}</td>
                                        <td>{{ $item->quantity ?? '' }}</td>
                                        <td>Rs. {{ number_format($item->sale_price, 2) }}</td>
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
                        <strong>Rs. {{ number_format($sale->grand_total, 2) }}</strong>
                    </h5>

                    <div>
                        <a href="{{ route('sale.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>

                        <a href="{{ route('sale.edit', $sale->id) }}" class="btn btn-primary">
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
