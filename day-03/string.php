<?php
$input = " PHP, Laravel, API, php, MySQL, Laravel ";

$items = explode(",", $input);

foreach ($items as $index => $item) {
    $items[$index] = strtolower(trim($item));
}
$uniqueInput = array_unique($items);
$result = array_values($uniqueInput);