<?php

namespace Admin\PhpLaravel84Days\DTO;

use Admin\PhpLaravel84Days\Enum\PaymentStatus;

class Transaction
{
    public readonly string $id;
    public readonly float $amount;
    public readonly PaymentStatus $status;
    public function __construct(
        string $id,
        float $amount,
        PaymentStatus $status
    ) {
        $this->id = $id;
        $this->amount = $amount;
        $this->status = $status;
    }
}
