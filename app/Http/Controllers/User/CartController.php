<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
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
        return $this->cartService->add($request);
    }

    public function remove(Request $request)
    {
        return $this->cartService->remove($request);
    }
    
    public function update(Request $request)
    {
        return $this->cartService->update($request);
    }

    public function count()
    {
        return $this->cartService->count();
    }

    public function getPrice(Request $request)
    {
        return $this->cartService->getPrice($request);
    }

    public function getTotalPrice()
    {
        return $this->cartService->getTotalPrice();
    }
}
