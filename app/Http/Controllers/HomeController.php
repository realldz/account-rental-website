<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $title = 'Trang chủ';
        $products = Product::whereStatus(1)->withCount('orderItem');
        
        $newProducts = (clone $products)->orderByDesc('id')->take(16)->get();
        $bestSellers = (clone $products)->orderByDesc('order_item_count')->take(16)->get();

        return view('user.index', compact('newProducts', 'bestSellers', 'title'));
    }
}
