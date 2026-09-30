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
class PaypalPayment implements PaymentMethod
{
    public function pay(float $amount): bool
    {
        echo "Paid {$amount} via Paypal" . PHP_EOL;

        return true;
    }
}

function processPayment(PaymentMethod $payment, float $amount): bool
{
    return $payment->pay($amount);
}

$creditCard = new CreditCardPayment();
$paypal = new PaypalPayment();

processPayment($creditCard, 100);
processPayment($paypal, 200);
