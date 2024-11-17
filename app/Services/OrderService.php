<?php

namespace App\Services;

use App\Models\Account;

class OrderService
{
    public function createOrder($user, $totalPrice, $paymentMethod)
    {
        $order = $user->orders()->create([
            'total_price' => $totalPrice,
            'status' => 0,
            'payment_method' => $paymentMethod,
        ]);

        if (!$order) {
            throw new \Exception('Unable to create order');
        }

        return $order;
    }

    public function createOrderItems($order, $orderItems)
    {
        if (!$order->item()->createMany($orderItems)) {
            throw new \Exception('Unable to create order items');
        }
    }

    public function completeOrder($order) {
        $order->item()->whereNull('account')->get()->each(function ($item) {
            $account = Account::where('product_id', $item->product_id)->where('status', 0)->first();
            if ($account) {
                $item->update(['account' => $account->info]);
                $account->update(['status' => 1]);
            } else {
                $item->update(['account' => 'Out of stock']);
            }
        });
    }
}
