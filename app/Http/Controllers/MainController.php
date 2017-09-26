<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getAddProduct()
    {
        return view('product-add');
    }
    
    public function getOrders()
    {
        return view('orders');
    }

    public function getInventory()
    {
        return view('inventory');
    }
}