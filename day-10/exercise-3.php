<?php
trait Logger
{
    public function log(string $message): void
    {
        echo "[LOG] {$message}" . PHP_EOL;
    }
}


class PaymentService
{
    use Logger;
}

$service = new PaymentService();
$service->log("Payment started");
