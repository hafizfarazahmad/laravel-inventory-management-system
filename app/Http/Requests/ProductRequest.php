<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'category_id'    => 'required|exists:categories,id',
            'name'           => 'required',
            'sku'            => ['nullable', Rule::unique('products', 'sku')->ignore($this->route('product'))],
            'barcode'        => ['nullable',Rule::unique('products','barcode')->ignore($this->route('product'))],
            'purchase_price' => 'nullable|numeric',
            'sale_price'     => 'nullable|numeric',
            'stock'          => 'nullable|integer',
            'minimum_stock'  => 'nullable|integer',
            'unit'           => 'nullable|string|max:50',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description'    => 'nullable|string',
            'status'         => 'required|boolean',   
            

            
        ];
        
    }
    public function messages(): array
{
    return [
        'category_id.required' => 'Please select a category.',
        'category_id.exists'   => 'The selected category is invalid.',

        'name.required'        => 'Product name is required.',

        'sku.unique'           => 'This SKU already exists.',
        'barcode.unique'       => 'This barcode already exists.',

        'purchase_price.numeric' => 'Purchase price must be a number.',
        'sale_price.numeric'     => 'Sale price must be a number.',

        'stock.integer'          => 'Stock must be an integer.',
        'minimum_stock.integer'  => 'Minimum stock must be an integer.',

        'unit.max'             => 'Unit cannot exceed 50 characters.',

        'image.image'          => 'Please upload a valid image.',
        'image.mimes'          => 'Image must be JPG, JPEG or PNG.',
        'image.max'            => 'Image size must not exceed 2 MB.',

        'status.required'      => 'Please select product status.',
        'status.boolean'       => 'Invalid product status.',
    ];
}
}