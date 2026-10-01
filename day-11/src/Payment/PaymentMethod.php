<?php

namespace Admin\PhpLaravel84Days\Payment;

interface PaymentMethod
{
    public function pay(float $amout): bool;
}
