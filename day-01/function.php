<?php
function sayHello(string $name): string
{
    $name = trim($name);
    return "Hello {$name}!";
}

function add(int $a, int $b): int
{
    return $a + $b;
}

function isAdult($age): bool
{
    return $age >= 18;
}
echo sayHello("Hoang Viet");
echo "\n";
echo add(10, 20);
echo "\n";
var_dump(isAdult(23));
var_dump(isAdult(15));