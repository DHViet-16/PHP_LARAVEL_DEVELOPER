<?php
enum PaymentStatus: string
{
    case Pending = 'pending';
    case Paid = 'paid';
    case Failed = 'failed';
}

function getPaymentMessage(PaymentStatus $status): string
{
    return match ($status) {
        PaymentStatus::Pending => 'Payment is pending',
        PaymentStatus::Paid => 'Payment successful',
        PaymentStatus::Failed => 'Payment failed',
    };
}

echo getPaymentMessage(PaymentStatus::Pending) . PHP_EOL;
echo getPaymentMessage(PaymentStatus::Paid) . PHP_EOL;
echo getPaymentMessage(PaymentStatus::Failed) . PHP_EOL;

echo PaymentStatus::Paid->value . PHP_EOL;