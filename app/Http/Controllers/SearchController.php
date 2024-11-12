<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Tim kiếm';
        $q = $request->input('q');
        $category = $request->input('category');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');

        $products = Product::where('name', 'like', "%{$q}%");

        if ($category) {
            $products = Product::where('category_id', $category);
        }

        if ($min_price && $max_price) {
            $products = Product::with('productcycle')
                ->whereHas('productcycle', function ($query) use ($min_price, $max_price) {
                    $query->whereBetween('cycle_price', [$min_price, $max_price]);
                });
        }
        $products = $products->paginate(12);
        $all_categories = Category::where('status', 1)->take(15)->get();
        return view('user.pages.search', compact('title', 'products', 'all_categories'));
    }
}
