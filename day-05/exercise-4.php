<?php
$discount = 20;

$calculatePrice = function (float $price) use ($discount): float {
    return $price - ($price * $discount / 100);
};

// echo $calculatePrice(100);
// echo $calculatePrice(250);
// echo $calculatePrice(500);


$discount = 10;

$prices = [100, 200, 500, 1000];


$calculatePrice = array_map(function (float $price) use ($discount): float {
    return $price - ($price * $discount / 100);
}, $prices);

print_r($calculatePrice);
