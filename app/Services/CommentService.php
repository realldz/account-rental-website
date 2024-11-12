<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\OrderItem;
use App\Models\Product;
use App\Traits\JsonResponseTrait;

class CommentService
{
    use JsonResponseTrait;
    
    public function create(string $content, Product $product)
    {
        $user = auth()->user();
        $is_bought = OrderItem::where('product_id', $product->id)
            ->whereHas('order', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->exists();
        if (!$is_bought) {
            return $this->fail('Bạn chưa mua sản phẩm này', 403);
        }
        $product->comment()->create([
            'product_id' => $product->id,
            'content' => $content,
            'user_id' => auth()->user()->id,
        ]);
        return $this->success('Bình luận thành công');
    }

    public function reply(string $content, Comment $comment, Product $product)
    {
        $user = auth()->user();
        $comment->children()->create([
            'product_id' => $product->id,
            'content' => $content,
            'user_id' => $user->id,
        ]);
        return $this->success('Trả lời bình luận thành công');
    }
}
