<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $carts = auth()->user()->carts;
        $order = auth()->user()->order;

        return view('panel.cart.order', compact('carts', 'order'));
    }
}
