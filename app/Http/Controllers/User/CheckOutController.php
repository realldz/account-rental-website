<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index() {
        $title = 'Thanh toán';
        $user = auth()->user();
        $cart_items = $user->cart()->get();
        $payments = Payment::where('enable', 1)->get();
        return view('user.pages.checkout', compact('cart_items', 'title', 'payments'));
    }
}
