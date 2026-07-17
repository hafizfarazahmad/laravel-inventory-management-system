<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'status',
        'address',
    ];
    public function sale()
    {
        return $this->hasMany(Sale::class);
    }
    
}