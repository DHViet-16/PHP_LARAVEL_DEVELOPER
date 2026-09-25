<?php
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$evenNumbers = array_values(array_filter($numbers, fn($number) => $number % 2 === 0));
$results = array_map(fn($number) => $number * 10, $evenNumbers);
$total = array_reduce($results, function (float $carry, float $result) {
    return $carry + $result;
}, 0);
echo $total;
