<?php
$user = [
    "name" => "Nguyen Van A",
    "age" => 16,
];

function registerUser(array $user): string
{
    if (empty($user['name'])) {
        throw new Exception("Name is required \n");
    }
    if ($user['age'] < 18) {
        throw new Exception("User must be at least 18 \n");
    }
    return "User registered successfully\n";
}

try {
    echo registerUser($user);
} catch (Exception $e) {
    echo "Registration failed: " . $e->getMessage();
}
