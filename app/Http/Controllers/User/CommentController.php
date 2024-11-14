<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Product;
use App\Services\CommentService;
use App\Traits\JsonResponseTrait;

class CommentController extends Controller
{
    use JsonResponseTrait;
    private CommentService $commentService;
    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->commentService = new CommentService();
            return $next($request);
        });
    }
    
    public function create(CommentRequest $request, Product $product) {
        if ($this->commentService->create($request->content, $product)) {
            return $this->success('Bình luận thành công');
        }
        return $this->fail('Bạn chưa mua sản phẩm này');
    }

    public function reply(CommentRequest $request, Product $product, Comment $comment) {
        if ($this->commentService->reply($request->content, $comment, $product)) {
            return $this->success('Trả lời bình luận thành công');
        }
        return $this->fail('Trả lời bình luận thất bại');
    }
}