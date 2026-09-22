<?php

$data = [
    "name" => "  Nguyen Van A  ",
    "age" => "22",
    "email" => "user@example.com",
    "role" => "",
    "is_active" => true,
];

$name = trim($data['name'] ?? "Guest");
$age = (int)$data['age'];
$isAdult = $age >= 18;
$email = $data['email'] ?? null;
$isEmailValid = !empty($email);
if (!$isEmailValid) {
    echo "Email is required\n";
}
$role = $data['role'] ?? "user";

if (empty($role)) {
    $role = "user";
}

$isActive = $data["is_active"] ?? false;

$isValid = !empty($name)
    && $isEmailValid
    && $isAdult
    && $isActive === true;

if ($isValid) {
    echo "Registration is valid\n";
    echo "Name: {$name}\n";
    echo "Age: {$age}\n";
    echo "Email: {$email}\n";
    echo "Role: {$role}\n";
    echo "Active: " . ($isActive ? "yes" : "no") . "\n";
} else {
    echo "Registration is invalid\n";
}

var_dump($name);
var_dump($age);
var_dump($isAdult);
var_dump($email);
var_dump($role);
var_dump($isActive);
var_dump($isValid);
