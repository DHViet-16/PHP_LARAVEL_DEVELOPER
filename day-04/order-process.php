<?php

$order = [
    "customer" => "Nguyen Van A",
    "age" => 22,
    "price" => 120.5,
    "quantity" => 3,
    "status" => "paid",
];

function isAdult(int $age): bool
{
    return $age >= 18;
}

function calculateTotal(float $price, int $quantity): float
{
    return $price * $quantity;
}

function isOrderPaid(string $status): bool
{
    return $status === "paid";
}

function processOrder(array $order): string
{
    if (empty($order['customer'])) {
        return "Invalid customer";
    }
    if (isAdult($order['age']) === false) {
        return "Customer must be adult \n";
    }
    if ($order['quantity'] <= 0) {
        return "Invalid quantity";
    }

    if ($order['price'] <= 0) {
        return "Invalid price";
    }
    if (!isOrderPaid($order['status'])) {
        return "Order is not paid";
    }
    $totalOrder = calculateTotal($order['price'], $order['quantity']);
    $totalOrder = number_format($totalOrder, 2, '.', '');
    return "Order accepted. Total: {$totalOrder}\n";
}

echo processOrder($order);
