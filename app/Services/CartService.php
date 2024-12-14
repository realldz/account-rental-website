<?php

namespace App\Services;

use App\Models\OrderItem;
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

    public function add($product_id, $cycle_id, $amount = 1, $renew_for = null): bool
    {
        $cart = $this->getUserCart($this->user);

        if ($renew_for) {
            $product_in_cart = $cart->where('product_id', $product_id)->where('renew_for', $renew_for)->first();
            $account = OrderItem::find($renew_for)->account;
            if (!$account) {
                return false;
            }
            if ($product_in_cart) {
                return true;
            }
        } else {
            $product_in_cart = $cart->where('product_id', $product_id)->where('cycle_id', $cycle_id)->whereNull('renew_for')->first();
            if ($product_in_cart) {
                $product_in_cart->amount += $amount;
                $product_in_cart->save();
                return true;
            }
        }

        $product = Product::where('id', $product_id)->where('status', 1)->first();
        if (!$product) {
            return false;
        }
        $cycle = $product->productCycle()->where('id', $cycle_id)->first();
        $this->user->cart()->create([
            'product_id' => $product->id,
            'cycle_id' => $cycle->id,
            'amount' => $amount,
            'renew_for' => $renew_for ?? null
        ]);
        return true;
    }
    public function remove($request): bool
    {
        $cart_item = $this->user->cart()->where('id', $request->cart_item_id)->first();
        if (!$cart_item) {
            return false;
        }
        $cart_item->delete();
        return true;
    }

    public function update($request): bool
    {
        $cart_item = $this->user->cart()->where('id', $request->cart_item_id)->first();
        if (!$cart_item) {
            return false;
        }
        if ($cart_item->renew_for) {
            return false;
        }
        // return $request;
        if ($request->amount <= 0) {
            return false;
        }
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
