<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Product;
use App\Services\CommentService;

class CommentController extends Controller
{
    
    private CommentService $commentService;
    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->commentService = new CommentService();
            return $next($request);
        });
    }
    
    public function create(CommentRequest $request, Product $product) {
        return $this->commentService->create($request->content, $product);
    }

    public function reply(CommentRequest $request, Product $product, Comment $comment) {
        return $this->commentService->reply($request->content, $comment, $product);
    }
}