<?php
$orders = [
    ["product" => "Laptop", "price" => 1200, "quantity" => 1],
    ["product" => "Mouse", "price" => 25, "quantity" => 2],
    ["product" => "Keyboard", "price" => 80, "quantity" => 1],
    ["product" => "Monitor", "price" => 300, "quantity" => 2],
];
$total = array_reduce(
    $orders,
    function (float $carry, array $order): float {
        return $carry + $order['price'] * $order['quantity'];
    },
    0
);
echo $total;
