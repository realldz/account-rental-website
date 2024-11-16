<?php

namespace App\Services;

class ProductCycleService
{
    public function generateOrderItems($carts, $orderId)
    {
        $orderItems = [];
        foreach ($carts as $cart) {
            for ($i = 0; $i < $cart->amount; $i++) {
                $cycleValue = $cart->productCycle->cycle_value;
                $cycleUnitToString = $cart->productCycle->cycle_unit_to_string;

                $orderItems[] = [
                    'start_date' => date('Y-m-d'),
                    'end_date' => date('Y-m-d', strtotime("${cycleValue} ${cycleUnitToString}")),
                    'product_id' => $cart->product_id,
                    'order_id' => $orderId,
                    'price' => $cart->productCycle->cycle_price,
                ];
            }
        }
        return $orderItems;
    }
}
