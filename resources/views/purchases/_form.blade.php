<div class="row">
    <div class="col-md-12 mb-3">
        <label class="form-label">Supplier<span class="text-danger">*</span></label>
        <select name="supplier_id" id="supplier_id" class="form-select @error('supplier_id') is-invalid @enderror">
            <option value="">Select Supplier</option>
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}"
                    {{ old('supplier_id', $purchase->supplier_id ?? '') == $supplier->id ? 'selected' : '' }}>
                    {{ $supplier->name }}
                </option>
            @endforeach
        </select>

        @error('supplier_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Purchase Date<span class="text-danger">*</span></label>
        <input type="date" name="purchase_date" class="form-control @error('purchase_date') is-invalid @enderror"
            value="{{ old('purchase_date', $purchase->purchase_date ?? '') }}">
        @error('purchase_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Invoice</label>
        <input type="text" readonly name="invoice_no" class="form-control @error('invoice_no') is-invalid @enderror"
            value="{{ old('invoice_no', $invoiceNo ?? ($purchase->invoice_no ?? '')) }}">
        @error('invoice_no')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">Note</label>
        <textarea name="note" class="form-control @error('note') is-invalid @enderror">{{ old('note', $purchase->note ?? '') }}</textarea>
        @error('note')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Status</label>

        <select name="status" class="form-select @error('status') is-invalid @enderror">
            <option value="1" {{ old('status', $purchase->status ?? 1) == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0" {{ old('status', $purchase->status ?? 1) == 0 ? 'selected' : '' }}>
                Inactive
            </option>
        </select>
    </div>
</div>
