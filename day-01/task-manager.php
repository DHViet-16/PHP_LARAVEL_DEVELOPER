<?php
function showTasks(array $tasks): void
{
    foreach ($tasks as $task) {
        if ($task['completed']) {
            echo "[x] {$task['id']}. {$task['title']}\n";
        } else {
            echo "[ ] {$task['id']}. {$task['title']}\n";
        }
    }
}
function completeTask(array &$tasks, int $taskId): bool
{
    foreach ($tasks as $index => $task) {
        if ($task['id'] === $taskId) {
            $tasks[$index]['completed'] = true;
            return true;
        }
    }
    return false;
}
$tasks = [
    [
        "id" => 1,
        "title" => "Learn PHP",
        "completed" => false
    ],
    [
        "id" => 2,
        "title" => "Learn Laravel",
        "completed" => false
    ]
];

echo "===== TASKS =====\n\n";

showTasks($tasks);

$task_id = (int) readline("Task ID: ");

if (!completeTask($tasks, $task_id)) {
    echo "Task not found!\n";
} else {
    echo "Task completed! \n";
}

showTasks($tasks);
$is_add = readline("Add another task? (y/n):");
while ($is_add !== "y" && $is_add !== "n") {
    echo "Please enter y or n.\n";
    $is_add = readline("Add another task? (y/n):");
}
while ($is_add === "y") {
    $title = readline("New task: ");
    $new_id = count($tasks) + 1;
    $tasks[] = [
        "id" => $new_id,
        "title" => $title,
        "completed" => false
    ];
    showTasks($tasks);
    $is_add = readline("Add another task? (y/n):");
}
