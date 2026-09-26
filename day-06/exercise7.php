<?php
$user = [
    "name" => "Nguyen Van A",
    "age" => 22,
    "roles" => ["user", "editor"],
    "active" => true,
];
function loadUsers(string $filename): array
{
    if (!file_exists($filename)) {
        throw new Exception("File not found");
    }
    $content = file_get_contents($filename);
    $data = json_decode($content, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("Invalid JSON");
    }
    return $data;
}
try {
    $data = loadUsers("users.json");
    print_r($data);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}