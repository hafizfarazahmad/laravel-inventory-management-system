<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'status',
        'address'
    ];
    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
    
}