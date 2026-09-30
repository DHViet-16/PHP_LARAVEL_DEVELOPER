<?php
interface PaymentMethod
{
    public function pay(float $amount): bool;
}
trait Logger
{
    public function log(): void
    {
        echo "[LOG] Processing payment..." . PHP_EOL;
    }
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
class BankTransferPayment implements PaymentMethod
{
    public function pay(float $amount): bool
    {
        echo "Paid {$amount} via Bank Transfer" . PHP_EOL;

        return true;
    }
}
class PaymentProcessor
{
    use Logger;

    private PaymentMethod $paymentMethod;

    public function __construct(PaymentMethod $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function process(float $amount): bool
    {
        $this->log();

        return $this->paymentMethod->pay($amount);
    }
}

$creditCard = new CreditCardPayment();
$paypal = new PaypalPayment();
$bank = new BankTransferPayment();

$processor = new PaymentProcessor($creditCard);
$processor->process(500);

$processor = new PaymentProcessor($paypal);
$processor->process(300);

$processor = new PaymentProcessor($bank);
$processor->process(1000);
