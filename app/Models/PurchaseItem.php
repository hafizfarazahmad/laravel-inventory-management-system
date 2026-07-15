<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $fillable = [
      'product_id',
      'supplier_id',
      'quantity',
      'purchase_price',
      'total',  
    ];
    
    public function product()
    {
      return $this->belongsTo(Product::class);
    }
    
     
}