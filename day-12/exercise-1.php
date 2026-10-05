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

class BankPayment implements PaymentMethod
{
    public function pay(float $amount): bool
    {
        echo "Paid {$amount} via Bank" . PHP_EOL;
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

class BitcoinPayment implements PaymentMethod
{
    public function pay(float $amount): bool
    {
        echo "Paid {$amount} via Bitcoin" . PHP_EOL;
        return true;
    }
}
$service = new PaymentService(new CreditCardPayment());
$service->process(500);
$service = new PaymentService(new PaypalPayment());
$service->process(300);
$service = new PaymentService(new BankPayment());
$service->process(1000);
$service = new PaymentService(new BitcoinPayment());
$service->process(700);