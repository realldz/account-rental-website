<?php

namespace App\Interfaces;

interface PaymentGatewayInterface
{
    public function form();
    public function pay();
    public function notify();
}
