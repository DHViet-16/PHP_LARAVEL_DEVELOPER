<?php
function loadTasks(string $filename): array
{
    if (!file_exists($filename)) {
        return [];
    }
    $content = file_get_contents($filename);
    $data = json_decode($content, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("Invalid JSON");
    }
    return $data;
};
function saveTasks(string $filename, array $tasks): void
{
    $json = json_encode($tasks);
    file_put_contents($filename, $json);
};

function addTask(array &$tasks, string $title): void
{
    $nextId = empty($tasks) ? 1 : max(array_column($tasks, 'id')) + 1;
    $title = trim($title);
    $tasks[] = [
        "id" => $nextId,
        "title" => $title,
        "completed" => false,
    ];
};

$filename = "tasks.json";

try {
    $tasks = loadTasks($filename);
    addTask($tasks, "Learn PHP");
    addTask($tasks, "Learn Laravel");
    addTask($tasks, "Learn MySQL");

    saveTasks($filename, $tasks);

    print_r($tasks);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
