<?php
$user = [
    "name" => "Nguyen Van A",
    "age" => 22,
    "roles" => ["user", "editor"],
    "active" => true,
];

$json = json_encode($user);
file_put_contents("users.json", $json);
$json = file_get_contents("users.json");
$data = json_decode($json, true);

echo "User loaded from file \n";
echo "Name: " . $data['name'] .  "\n";
echo "Age: " . $data['age'] .  "\n";
echo "Role: " . $data['roles'][0] .  "\n";