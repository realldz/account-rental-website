<?php

namespace App\Services;

use App\Models\Order;

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
}
