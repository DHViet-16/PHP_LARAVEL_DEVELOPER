<?php

$orders = [
    ["price" => 100, "quantity" => 2],
    ["price" => 50, "quantity" => 0],
    ["price" => 200, "quantity" => 1],
];

function calculateOrderTotal(array $orders, float $discount): float
{
    $filteredOrders = array_filter($orders, fn($order) => $order['quantity'] > 0);
    $totalOrder = array_reduce($filteredOrders, function (float $carry, array $order): float {
        return $carry + $order['price'] *  $order['quantity'];
    }, 0.0);
    return $totalOrder - $totalOrder * $discount / 100;
}
echo calculateOrderTotal($orders, 10);
