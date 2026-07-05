<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'sku',
        'barcode',
        'purchase_price',
        'sale_price',
        'stock',
        'minimum_stock',
        'unit',
        'image',
        'description',
        'status'
    ] ;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}