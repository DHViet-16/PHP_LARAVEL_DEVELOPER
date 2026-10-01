<?php
class Transaction
{
    public readonly string $id;
    public readonly float $amount;
    public function __construct(string $id, float $amount)
    {
        $this->id = $id;
        $this->amount = $amount;
    }
}

$transaction = new Transaction('TX001', 500);

echo $transaction->id . PHP_EOL;
echo $transaction->amount . PHP_EOL;