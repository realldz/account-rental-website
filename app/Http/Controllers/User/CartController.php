<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CartRequest;
use App\Services\CartService;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use JsonResponseTrait;

    private $cartService;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->cartService = new CartService();
            return $next($request);
        });
    }

    public function addToCart(CartRequest $request) 
    {
        if ($this->cartService->add($request->product_id, $request->cycle_id, $request->amount)) {
            return $this->success('Thêm vào giỏ hàng thành công');
        }
        return $this->fail('Thêm vào giỏ hàng thất bại');
    }

    public function remove(Request $request)
    {
        if ($this->cartService->remove($request)) {
            return $this->success('Xóa khỏi giỏ hàng thành công');
        } 
        return $this->fail('Xóa khỏi giỏ hàng thất bại');
    }
    
    public function update(Request $request)
    {
        if ($this->cartService->update($request)) {
            return $this->success('Cập nhật giỏ hàng thành công');
        }
        return $this->fail('Cập nhật giỏ hàng thất bại');
    }

    public function count()
    {
        return $this->success(['count' => $this->cartService->count()]);
    }

    public function getPrice(Request $request)
    {
        return $this->success(['price' => $this->cartService->getPrice($request)]);
    }

    public function getTotalPrice()
    {
        return $this->success(['total' => $this->cartService->getTotalPrice()]);
    }
}
