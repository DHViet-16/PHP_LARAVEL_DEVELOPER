<?php

namespace App\Payment;

class CreditCardPayment
{
    public function pay(float $amount): bool
    {
        echo "Paid {$amount} via Credit Card" . PHP_EOL;
        return true;
    }
}

$payment = new CreditCardPayment();
$payment->pay(100);
echo $payment::class . PHP_EOL;
