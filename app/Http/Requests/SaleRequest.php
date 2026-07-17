<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         return [
            'customer_id'     => 'required',
            'sale_date'       => 'required',
            'invoice_no'      => 'required',
            'note'            => 'nullable',
            'status'          => 'required|boolean',
            'product_id.*'    => 'required',
            'quantity.*'      => 'required',
            'sale_price.*'=> 'required', 
            'total.*'         => 'required',
            'grand_total'     => 'required',
            'product_ids' => 'required|array|min:1',
            'product_ids.*' => 'required|exists:products,id',
        ];
    }
}