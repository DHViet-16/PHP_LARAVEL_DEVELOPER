<?php
$input = " PHP, Laravel, , API, php, MySQL, Laravel,  , PHP ";

$items = explode(",", $input);

$items = array_map(
    fn($item) => strtolower(trim($item)),
    $items
);
$items = array_filter($items, fn($item) => !empty($item));

$items = array_unique($items);
$tags = array_values($items);

print_r($tags);
PHP Laravel API