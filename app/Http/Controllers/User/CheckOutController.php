<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index() {
        $title = 'Thanh toán';
        $user = auth()->user();
        $cart_items = $user->cart()->get();
        return view('user.pages.checkout', compact('cart_items', 'title'));
    }
}
