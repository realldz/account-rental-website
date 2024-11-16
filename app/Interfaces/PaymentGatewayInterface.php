<?php

namespace App\Interfaces;

interface PaymentGatewayInterface
{
    public static function form();
    public function pay($order);
    public function notify($request);
}
