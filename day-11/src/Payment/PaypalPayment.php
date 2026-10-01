<?php

namespace Admin\PhpLaravel84Days\Payment;

class PaypalPayment implements PaymentMethod
{
    public function pay(float $amount): bool
    {
        echo "Paid {$amount} via Paypal" . PHP_EOL;

        return true;
    }
}
