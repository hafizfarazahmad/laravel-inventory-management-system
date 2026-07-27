<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getPurchasePrice()
    {      
    return response()->json([
        'message' => 'Hello AJAX',
        'price' => 50000,
    ]);

    }
}