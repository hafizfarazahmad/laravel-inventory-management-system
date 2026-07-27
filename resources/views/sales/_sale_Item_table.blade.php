<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-striped" id="saleTable">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>sale Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="saleItems">
                    @if (isset($sale))
                        @foreach ($sale->saleItems as $item)
                            <tr>
                                <td>
                                    <input type="hidden" name="sale_item_ids[]" value="{{ $item->id }}">
                                    <select name="product_ids[]" class="form-select">
                                        <option value="">Select Product</option>
                                        @foreach ($products as $product)
                                            <option data-price="{{ $product->sale_price }}" value="{{ $product->id }}"
                                                {{ $item->product_id == $product->id ? 'selected' : '' }}>
                                                {{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" id="quantity" class="form-control"
                                        value="{{ $item->quantity }}" name="quantity[]" min="1">
                                </td>
                                <td><input type="number" id="sale_price" step="0.01" class="form-control"
                                        name="sale_price[]" value="{{ $item->sale_price }}"></td>
                                <td><input type="number" step="0.01" class="form-control" name="total[]"
                                        value="{{ $item->total }}" readonly></td>
                                <td><button class="btn btn-danger removeRow"><i class="bi bi-trash"></i></a></button>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>
                                <select name="product_ids[]" class="form-select">
                                    <option value="">Select Product</option>
                                    @foreach ($products as $product)
                                        <option data-price="{{ $product->sale_price }}" value="{{ $product->id }}">
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>

                            <td>
                                <input type="number" name="quantity[]" class="form-control" value="1">
                            </td>

                            <td>
                                <input type="number" name="sale_price[]" class="form-control" value="0">
                            </td>

                            <td>
                                <input type="number" name="total[]" class="form-control" value="0" readonly>
                            </td>

                            <td>
                                <button class="btn btn-danger removeRow">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            <button type="button" class="btn btn-success" id="addRowbtn">
                <i class="fas fa-plus"></i> Add Row
            </button>
        </div>
        <div class="row mt-3">
            <div class="col-md-4 offset-md-8">
                <label class="form-label">Grand Total</label>
                <input type="number" class="form-control" name="grand_total" value="{{ $sale->grand_total ?? '' }}"
                    readonly>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        const saleItems = document.getElementById('saleItems');
        const addRowbtn = document.getElementById('addRowbtn');
        addRowbtn.addEventListener('click', function() {
            const lastRow = saleItems.querySelector('tr');
            const newRow = lastRow.cloneNode(true);
            newRow.querySelector('select').selectedIndex = 0;
            newRow.querySelector('input[name="quantity[]"]').value = 1;
            newRow.querySelector('input[name="sale_price[]"]').value = 0.00;
            newRow.querySelector('input[name="total[]"]').value = 0.00;
            saleItems.appendChild(newRow);
        });
        saleItems.addEventListener('click', function(e) {
            if (e.target.closest('.removeRow')) {
                e.preventDefault();
                const row = e.target.closest('tr');
                const totalRows = saleItems.querySelectorAll('tr').length;
                if (totalRows > 1) {
                    row.remove();
                } else {
                    alert('atleast one row is required');
                }
            }
        });

        function calculateRowTotal(row) {
            const qty = parseFloat(row.querySelector('input[name="quantity[]"]').value) || 0;
            const price = parseFloat(row.querySelector('input[name="sale_price[]"]').value) || 0;
            const total = row.querySelector('input[name="total[]"]');
            total.value = (qty * price).toFixed(2);
            calculateGrandTotal();
        }

        document.addEventListener('input', function(e) {
            if (e.target.name === 'quantity[]' || e.target.name === 'sale_price[]') {
                const row = e.target.closest('tr');
                calculateRowTotal(row);
                calculateGrandTotal();
            }
        });

        function calculateGrandTotal() {
            const total = document.querySelectorAll('input[name="total[]"]');
            let grandTotal = 0;
            total.forEach(function(item) {
                grandTotal += parseFloat(item.value) || 0;
                document.querySelector('input[name="grand_total"]').value = grandTotal.toFixed(2);
            })
        }
        $(document).on('change', 'select[name="product_ids[]"]', function() {
            let row = $(this).closest('tr');
            let price = $(this).find(':selected').data('price');
            row.find('input[name="sale_price[]"]').val(price);
            calculateRowTotal(row[0]);
            calculateGrandTotal();
        })
    </script>
@endpush
