<?php

namespace App\Services;

use App\Models\OrderItem;

class ProductCycleService
{
    public function generateOrderItems($carts, $orderId)
    {
        $orderItems = [];
        foreach ($carts as $cart) {
            for ($i = 0; $i < $cart->amount; $i++) {
                $cycleValue = $cart->productCycle->cycle_value;
                $cycleUnitToString = $cart->productCycle->cycle_unit_to_string;
                $startDate = date('Y-m-d');
                $endDate = date('Y-m-d', strtotime("${cycleValue} ${cycleUnitToString}"));
                if ($cart->renew_for) {
                    $orderItem = OrderItem::where('id', $cart->renew_for)->first();
                    $startDate = $orderItem->end_date;
                    $endDate = date('Y-m-d', strtotime("${cycleValue} ${cycleUnitToString}", strtotime($orderItem->end_date)));
                }
                $orderItems[] = [
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                    'product_id' => $cart->product_id,
                    'order_id' => $orderId,
                    'price' => $cart->productCycle->cycle_price,
                    'old_item' => $cart->renew_for ?? null,
                ];
            }
        }
        return $orderItems;
    }
}
