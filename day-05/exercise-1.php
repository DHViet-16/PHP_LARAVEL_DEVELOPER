<?php
$numbers = [2, 4, 6, 8, 10];
$result = array_map(fn($item) => $item * 2, $numbers);
print_r($result);

$numbers = [3, 8, 12, 5, 20, 7, 30];
$result = array_filter($numbers, fn($value) => $value >= 10);
$result = array_values($result);
print_r($result);


$numbers = [1, 2, 3, 4, 5, 6, 7, 8];

$evenNumbers = array_filter($numbers, fn($value) => $value % 2 === 0);
$evenNumbers = array_values($evenNumbers);
$result = array_map(fn($item) => $item * 10, $evenNumbers);
print_r($result);

$numbers = [10, 20, 30, 40];

$total = array_reduce(
    $numbers,
    fn($carry, $number) => $carry + $number,
    0
);

echo $total;
