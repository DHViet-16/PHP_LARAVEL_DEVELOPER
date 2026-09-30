<?php
abstract class Payment
{
    protected string $transactionId;

    public function __construct(string $transactionId)
    {
        $this->transactionId = $transactionId;
    }

    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    abstract public function pay(float $amount): bool;
}

class CreditCardPayment extends Payment
{
    public function pay(float $amount): bool
    {
        echo "Paid {$amount} via Credit Card" . PHP_EOL;

        return true;
    }
}

$payment = new CreditCardPayment("TX001");

echo $payment->getTransactionId() . PHP_EOL;

$result = $payment->pay(250);

var_dump($result);
