<?php
$age = "21";
$price = "49.99";
$quantity = "3";
$isActive = true;

$age = (int) $age;
$price = (float) $price;
$quantity = (int) $quantity;

$total = $price * $quantity;
$isAdult = $age >= 18;
$isUser = $isAdult && $isActive;
$isOrder = $quantity > 0 && $price > 0 && $isUser === TRUE;

var_dump($age);
var_dump($price);
var_dump($quantity);
var_dump($total);
var_dump($isAdult);
var_dump($isUser);
var_dump($isOrder);

if ($isOrder) {
    echo "Order is valid \n";
    echo "Total: {$total}\n";
} else {
    echo "Order is invalid\n";
}
