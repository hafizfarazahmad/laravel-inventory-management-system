<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'customer_id',
        'invoice_no',
        'sale_date',
        'grand_total',
        'note',
        'status',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
}