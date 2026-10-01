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

class PaymentService
{
    private PaymentMethod $paymentMethod;

    public function __construct(PaymentMethod $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function process(float $amount): bool
    {
        return $this->paymentMethod->pay($amount);
    }
}

$paymentMethod = new CreditCardPayment();

$service = new PaymentService($paymentMethod);

$result = $service->process(500);

var_dump($result);
