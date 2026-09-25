<?php
$orders = [
    ["product" => "Laptop", "price" => 1200, "quantity" => 1],
    ["product" => "Mouse", "price" => 25, "quantity" => 2],
    ["product" => "Keyboard", "price" => 80, "quantity" => 1],
    ["product" => "Monitor", "price" => 300, "quantity" => 2],
];


$productNames = array_map(fn($item) => $item['product'], $orders);
$filteredOrders = array_values(array_filter($orders, fn($value) => $value['quantity'] >= 2));
$totalAmount = array_reduce($orders, fn($carry, $item) => $carry + $item['price'] * $item['quantity'], 0);
print_r($productNames);
print_r($filteredOrders);
print_r($totalAmount);
