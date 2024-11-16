<?php

namespace App\Factories;

use App\Interfaces\PaymentGatewayInterface;
use ReflectionClass;
use Exception;

class PaymentFactory
{
    public static function create(string $type, ...$constructorArgs): object
    {
        $className =  'App\\Payments\\' . ucfirst($type);

        if (class_exists($className)) {
            $reflection = new ReflectionClass($className);

            if ($reflection->implementsInterface(PaymentGatewayInterface::class)) {
                return $reflection->newInstanceArgs($constructorArgs);
            } else {
                throw new Exception("Class does not implement interface PaymentGatewayInterface");
            }
        } else {
            throw new Exception("Payment method does not exist");
        }
    }
    
    public static function getAvailablePaymentMethods()
    {
        $path = app_path('Payments');
        $namespace = 'App\\Payments';
        $paymentMethods = [];

        foreach (scandir($path) as $file) {
            if (preg_match('/^(.+)\.php$/', $file, $matches)) {
                $className = $namespace . '\\' . $matches[1];
                if (class_exists($className)) {
                    $reflection = new ReflectionClass($className);
                    if ($reflection->implementsInterface(PaymentGatewayInterface::class) && !$reflection->isAbstract()) {
                        $paymentMethods[] = $matches[1];
                    }
                }
            }
        }

        return $paymentMethods;
    }
}
