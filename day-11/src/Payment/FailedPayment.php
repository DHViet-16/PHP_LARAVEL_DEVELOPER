<?php

namespace Admin\PhpLaravel84Days\Payment;

class FailedPayment implements PaymentMethod
{
    public function pay(float $amount): bool
    {
        echo "Payment failed" . PHP_EOL;

        return false;
    }
}
