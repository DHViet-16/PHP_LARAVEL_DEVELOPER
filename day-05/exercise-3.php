<?php
$numbers = [1, 2, 3, 4, 5];

$result1 = array_map(function ($number) {
    return $number * 3;
}, $numbers);

print_r($result1);

$result2 = array_map(fn($number) => $number * 3, $numbers);

print_r($result2);
