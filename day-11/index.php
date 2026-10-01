<?php

require __DIR__ . '/../vendor/autoload.php';

use Admin\PhpLaravel84Days\Payment\CreditCardPayment;
use Admin\PhpLaravel84Days\Payment\PaypalPayment;
use Admin\PhpLaravel84Days\Payment\FailedPayment;
use Admin\PhpLaravel84Days\Service\PaymentService;

// $creditCard = new CreditCardPayment();

// $service = new PaymentService($creditCard);

// $transaction = $service->process('TX001', 500);

// echo $transaction->id . PHP_EOL;
// echo $transaction->amount . PHP_EOL;
// echo $transaction->status->value . PHP_EOL;
// $paypal = new PaypalPayment();

// $service = new PaymentService($paypal);

// $transaction = $service->process('TX002', 750);

// echo $transaction->id . PHP_EOL;
// echo $transaction->amount . PHP_EOL;
// echo $transaction->status->value . PHP_EOL;
$failedPayment = new FailedPayment();

$service = new PaymentService($failedPayment);

$transaction = $service->process('TX003', 100);

echo $transaction->status->value . PHP_EOL;