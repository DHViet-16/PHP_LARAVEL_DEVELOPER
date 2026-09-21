<?php
$skills = [
    "PHP",
    "Laravel",
    "MySQL",
    "Git",
    "Docker"
];

foreach ($skills as $skill) {
    echo "- $skill \n";
}
var_dump($skills);

$user = [
    "name" => "Hoang Viet",
    "age" => 23,
    "email" => "your-email",
    "job" => "Backend Developer"
];

echo "User: \n";
echo "Name: {$user['name']}\n";
echo "Age:  {$user['age']}\n";
echo "Email:  {$user['email']}\n";
echo "Job:  {$user['job']}";

var_dump($user);