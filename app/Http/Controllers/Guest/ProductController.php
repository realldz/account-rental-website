<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(string $slug) {
        $product = Product::findBySlugOrFail($slug);
        $title = $product->name;
        $relatedProduct = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->limit(4)->get();
        $comments = $product->comment()->whereNull('parent_id')->orderByDesc('id')->paginate(5);

        return view('user.pages.product', compact('title', 'product', 'relatedProduct', 'comments'));
    }
}
