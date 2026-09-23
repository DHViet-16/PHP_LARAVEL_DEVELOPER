<?php
$users = [
    [
        "id" => 1,
        "name" => "  Nguyen Van An ",
        "email" => "AN@EXAMPLE.COM",
        "age" => 22,
        "active" => true,
        "role" => "admin",
    ],
    [
        "id" => 2,
        "name" => "Tran Thi Binh",
        "email" => "binh@example.com",
        "age" => 17,
        "active" => true,
        "role" => "user",
    ],
    [
        "id" => 3,
        "name" => "Le Van Cuong",
        "email" => "CUONG@EXAMPLE.COM",
        "age" => 25,
        "active" => false,
        "role" => "admin",
    ],
    [
        "id" => 4,
        "name" => "Pham Thi Dung",
        "email" => "dung@example.com",
        "age" => 20,
        "active" => true,
        "role" => "user",
    ],
];

$names = array_map(fn($item) => strtolower(trim($item['name'])), $users);
$totalUsers = count($users);
$activeAdults = array_filter($users, fn($item) => $item['age'] >= 18 && $item['active'] === true);
$totalActiveAdults = count($activeAdults);
$roles = implode(", ", array_values(array_unique(array_column($users, 'role'))));
usort(
    $users,
    fn($a, $b) => $b["age"] <=> $a["age"]
);
$sortedUsers = $users;
$keyword = "cuong";
$searchResults  = array_filter($users, fn($item) => str_contains(strtolower(trim($item['name'])), strtolower(trim($keyword))));
$searchResultNames  = $searchResultNames = array_map(
    fn($item) => $item['name'],
    $searchResults
);
$searchResult = implode(", ", $searchResultNames);

echo "Total users: {$totalUsers}\n";
echo "Active adults: {$totalActiveAdults}\n";
echo "Roles: {$roles}\n";
echo "Search result: {$searchResult}\n";
