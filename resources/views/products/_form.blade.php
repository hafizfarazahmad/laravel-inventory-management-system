<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Category<span class="text-danger">*</span></label>
        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Product Name<span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $product->name ?? '') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">SKU</label>
        <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror"
            value="{{ old('sku', $product->sku ?? '') }}">
        @error('sku')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Barcode</label>
        <input type="text" name="barcode" class="form-control @error('barcode') is-invalid @enderror"
            value="{{ old('barcode', $product->barcode ?? '') }}">
        @error('barcode')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Purchase Price</label>
        <input type="number" step="0.01" name="purchase_price"
            class="form-control @error('purchase_price') is-invalid @enderror"
            value="{{ old('purchase_price', $product->purchase_price ?? '') }}">
        @error('purchase_price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Sale Price</label>
        <input type="number" step="0.01" name="sale_price"
            class="form-control @error('sale_price') is-invalid @enderror"
            value="{{ old('sale_price', $product->sale_price ?? '') }}">
        @error('sale_price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Stock</label>
        <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
            value="{{ old('stock', $product->stock ?? '') }}">
        @error('stock')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Minimum Stock</label>
        <input type="number" name="minimum_stock" class="form-control @error('minimum_stock') is-invalid @enderror"
            value="{{ old('minimum_stock', $product->minimum_stock ?? '') }}">
        @error('minimum_stock')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Unit</label>
        <select name="unit" class="form-select @error('unit') is-invalid @enderror">
            <option value="">Select Unit</option>
            <option value="Piece" {{ old('unit', $product->unit ?? '') == 'Piece' ? 'selected' : '' }}>Piece</option>
            <option value="Kg" {{ old('unit', $product->unit ?? '') == 'Kg' ? 'selected' : '' }}>Kg</option>
            <option value="Gram" {{ old('unit', $product->unit ?? '') == 'Gram' ? 'selected' : '' }}>Gram</option>
            <option value="Liter" {{ old('unit', $product->unit ?? '') == 'Liter' ? 'selected' : '' }}>Liter</option>
            <option value="Milliliter" {{ old('unit', $product->unit ?? '') == 'Milliliter' ? 'selected' : '' }}>
                Milliliter
            </option>
            <option value="Box" {{ old('unit', $product->unit ?? '') == 'Box' ? 'selected' : '' }}>Box</option>
            <option value="Pack" {{ old('unit', $product->unit ?? '') == 'Pack' ? 'selected' : '' }}>Pack</option>
            <option value="Dozen" {{ old('unit', $product->unit ?? '') == 'Dozen' ? 'selected' : '' }}>Dozen</option>
            <option value="Meter" {{ old('unit', $product->unit ?? '') == 'Meter' ? 'selected' : '' }}>Meter</option>
            <option value="Roll" {{ old('unit', $product->unit ?? '') == 'Roll' ? 'selected' : '' }}>Roll </option>
            <option value="Bag" {{ old('unit', $product->unit ?? '') == 'Bag' ? 'selected' : '' }}>Bag</option>
            <option value="Carton" {{ old('unit', $product->unit ?? '') == 'Carton' ? 'selected' : '' }}>Carton
            </option>
        </select>
        @error('unit')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Description</label>

        <textarea name="description" rows="4" class="form-control">{{ old('description', $product->description ?? '') }}</textarea>
        @error('description')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Status</label>

        <select name="status" class="form-select @error('status') is-invalid @enderror">
            <option value="1" {{ old('status', $product->status ?? 1) == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0" {{ old('status', $product->status ?? 1) == 0 ? 'selected' : '' }}>
                Inactive
            </option>
        </select>
    </div>
</div>
