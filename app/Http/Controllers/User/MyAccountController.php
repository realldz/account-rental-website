<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function index() {
        $title = 'Tài khoản';
        $user = Auth::user();
        $orders = $user->orders();
        return view('user.pages.myaccount', compact('user', 'orders', 'title'));
    }
}
