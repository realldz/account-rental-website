<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Order;
use App\Models\OrderItem;
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
        $newUserToday = User::where('created_at', '>=', date('Y-m-d 00:00:00'))->count();
        $newOrderToday = Order::where('created_at', '>=', date('Y-m-d 00:00:00'))->count();
        $newOrderSuccessToday = Order::where('created_at', '>=', date('Y-m-d 00:00:00'))->where('status', 1)->count();
        $productForSale = Product::where('status', 1)->count();
        $revenueToday = Order::where('created_at', '>=', date('Y-m-d 00:00:00'))->where('status', 1)->sum('total_price');
        $revenueMonth = Order::where('created_at', '>=', date('Y-m-1 00:00:00'))->where('status', 1)->sum('total_price');
        $revenueTotal = Order::where('status', 1)->sum('total_price');
        $accountRenting = Account::where('status', 1)->count();
        $accountRentingExpired = OrderItem::whereNotNull('account')->where('status', 1)->where('end_date', '<', date('Y-m-d'))->count();
        return view('admin.index', compact(
            'totalUser',
            'totalProduct', 
            'totalAccount', 
            'totalOrder', 
            'newUserToday', 
            'newOrderToday', 
            'newOrderSuccessToday', 
            'productForSale', 
            'revenueToday',
            'revenueMonth',
            'revenueTotal',
            'accountRenting',
            'accountRentingExpired'
        ));
    }
}
