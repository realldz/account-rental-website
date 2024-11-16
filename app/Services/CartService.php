<?php

namespace App\Services;

use App\Models\Product;
use App\Traits\JsonResponseTrait;
use Illuminate\Support\Facades\Auth;

class CartService
{
    private $user;
    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function getUserCart($user) {
        return $user->cart()->get();
    }

    public function clearCart($user)
    {
        return $user->cart()->delete();
    }

    public function add($request): bool
    {
        $cart = $this->getUserCart($this->user);
        $product_in_cart = $cart->where('product_id', $request->product_id)->where('cycle_id', $request->cycle_id)->first();
        if ($product_in_cart) {
            $product_in_cart->amount += $request->amount;
            $product_in_cart->save();
            return true;
        }

        $product = Product::where('id', $request->product_id)->where('status', 1)->first();
        $cycle = $product->productCycle()->where('id', $request->cycle_id)->first();
        $amount = $request->amount;
        $this->user->cart()->create([
            'product_id' => $product->id,
            'cycle_id' => $cycle->id,
            'amount' => $amount
        ]);
        return true;
    }
    public function remove($request): bool
    {
        $cart_item = $this->user->cart()->where('id', $request->cart_item_id)->first();
        $cart_item->delete();
        return true;
    }

    public function update($request): bool
    {
        $cart_item = $this->user->cart()->where('id', $request->cart_item_id)->first();
        // return $request;
        $cart_item->amount = $request->amount;
        $cart_item->save();
        return true;
    }

    public function count(): int
    {
        return $this->user->cart()->count();
    }

    public function getPrice($request): float
    {
        $cart_item = $this->user->cart()->where('id', $request->cart_item_id)->first();
        $amount = $cart_item->amount;
        $price_per_one = $cart_item->productCycle->cycle_price;
        $price = $amount * $price_per_one;
        return $price;
    }
    public function getTotalPrice(): float|int
    {
        $carts = $this->getUserCart($this->user);
        $total = 0;
        foreach ($carts as $cart) {
            $product = Product::where('id', $cart->product_id)->where('status', 1)->first();
            $cycle = $product->productCycle()->where('id', $cart->cycle_id)->first();
            $total += $cycle->cycle_price * $cart->amount;
        }
        return $total;
    }
}
