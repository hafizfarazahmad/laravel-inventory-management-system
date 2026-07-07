<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Customer Name <span class="text-danger">*</span></label>

        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $customer->name ?? '') }}">

        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Customer Email</label>

        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $customer->email ?? '') }}">

        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Customer Phone</label>

        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
            value="{{ old('phone', $customer->phone ?? '') }}">

        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Address</label>

        <textarea name="address" rows="4" class="form-control">{{ old('address', $customer->address ?? '') }}</textarea>
        @error('description')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Status</label>

        <select name="status" class="form-select">
            <option value="1" {{ old('status', $category->status ?? 1) == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0" {{ old('status', $category->status ?? 1) == 0 ? 'selected' : '' }}>
                Inactive
            </option>
        </select>
    </div>
</div>
