<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $data = [];

        $data['carts'] = Cart::content();

        $data['title'] = 'Cart';

        return view('frontend.cart', $data);
    }

}
