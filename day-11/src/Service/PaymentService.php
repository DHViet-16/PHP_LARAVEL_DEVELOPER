<?php

namespace Admin\PhpLaravel84Days\Service;

use Admin\PhpLaravel84Days\Payment\PaymentMethod;
use Admin\PhpLaravel84Days\DTO\Transaction;
use Admin\PhpLaravel84Days\Enum\PaymentStatus;

class PaymentService
{
    private PaymentMethod $paymentMethod;

    public function __construct(PaymentMethod $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function process(string $transactionId, float $amount): Transaction
    {
        if ($this->paymentMethod->pay($amount)) {
            $status = PaymentStatus::Paid;
        } else {
            $status = PaymentStatus::Failed;
        }
        $transaction = new Transaction($transactionId, $amount, $status);
        return $transaction;
    }
}
