<?php
interface PaymentMethod
{
    public function pay(float $amount): bool;
}

class CreditCardPayment implements PaymentMethod
{
    public function pay(float $amount): bool
    {
        echo "Paid {$amount} via Credit Card" . PHP_EOL;

        return true;
    }
}
$payment = new CreditCardPayment();

$result = $payment->pay(100);

var_dump($result);
