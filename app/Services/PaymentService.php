<?php

namespace App\Services;

use App\Factories\PaymentFactory;

class PaymentService
{
    public function createPayment($order, $payment_method) {

        $gateway = PaymentFactory::create($payment_method->gateway, $payment_method);

        return $gateway->pay($order);
    }
}
