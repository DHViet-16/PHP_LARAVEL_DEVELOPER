<?php
function calculateDiscount(float $price, float $discount): float
{
    return $price - ($price * $discount / 100);
}

$finalPrice = calculateDiscount(100, 10);
print_r($finalPrice);
