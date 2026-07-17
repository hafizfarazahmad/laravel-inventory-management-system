<div class="row">
    <div class="col-md-12 mb-3">
        <label class="form-label">Customer<span class="text-danger">*</span></label>
        <select name="customer_id" id="customer_id" class="form-select @error('customer_id') is-invalid @enderror">
            <option value="">Select Customer</option>
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}"
                    {{ old('customer_id', $sale->customer_id ?? '') == $customer->id ? 'selected' : '' }}>
                    {{ $customer->name }}
                </option>
            @endforeach
        </select>

        @error('customer_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">sale Date<span class="text-danger">*</span></label>
        <input type="date" name="sale_date" class="form-control @error('sale_date') is-invalid @enderror"
            value="{{ old('sale_date', $sale->sale_date ?? '') }}">
        @error('sale_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Invoice</label>
        <input type="text" readonly name="invoice_no" class="form-control @error('invoice_no') is-invalid @enderror"
            value="{{ old('invoice_no', $invoiceNo ?? ($sale->invoice_no ?? '')) }}">
        @error('invoice_no')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">Note</label>
        <textarea name="note" class="form-control @error('note') is-invalid @enderror">{{ old('note', $sale->note ?? '') }}</textarea>
        @error('note')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Status</label>

        <select name="status" class="form-select @error('status') is-invalid @enderror">
            <option value="1" {{ old('status', $sale->status ?? 1) == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0" {{ old('status', $sale->status ?? 1) == 0 ? 'selected' : '' }}>
                Inactive
            </option>
        </select>
    </div>
</div>
