<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        $user = auth()->user();
        $cart = $user->cart()->get();
        dd($cart);
    }
}
