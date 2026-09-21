<?php
$users = [
    [
        "name" => "Hoang Viet",
        "age" => 23,
        "job" => "Backend Developer",
        "skills" => ["PHP", "Laravel", "MySQL"]
    ],
    [
        "name" => "Nguyen Van A",
        "age" => 25,
        "job" => "Frontend Developer",
        "skills" => ["HTML/CSS", "JavaScript", "VueJS"]
    ]
];

echo "===== USERS ===== \n";
foreach ($users as $user){
    echo "Name: {$user['name']}\n";
    echo "Age:  {$user['age']}\n";
    echo "Job:  {$user['job']}\n";
    echo "Skills:\n";
    foreach ( $user['skills'] as $skill){
        echo "- $skill\n";
    }
}