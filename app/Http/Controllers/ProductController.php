<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\CommentService;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private CommentService $commentService;
    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->commentService = new CommentService();
            return $next($request);
        });
    }
    public function index(string $slug) {
        $product = Product::findBySlugOrFail($slug);
        $title = $product->name;
        $relatedProduct = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->limit(4)->get();
        $comments = $product->comment()->whereNull('parent_id')->orderByDesc('id')->paginate(5);

        return view('user.pages.product', compact('title', 'product', 'relatedProduct', 'comments'));
    }

    public function commentCreate(CommentRequest $request, Product $product) {
        return $this->commentService->create($request->content, $product);
    }

    public function commentReply(CommentRequest $request, Product $product, Comment $comment) {
        return $this->commentService->reply($request->content, $comment, $product);
    }
}
