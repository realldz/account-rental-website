<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $totalUser = User::count();
        $totalProduct = Product::count();
        $totalAccount = Account::count();
        $totalOrder = Order::count();
        return view('admin.index', compact('totalUser', 'totalProduct', 'totalAccount', 'totalOrder'));
    }
}
