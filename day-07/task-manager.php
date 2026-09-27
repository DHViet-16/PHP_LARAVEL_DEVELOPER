<?php
function loadTasks(string $filename): array
{
    if (!file_exists($filename)) {
        return [];
    }

    $content =  file_get_contents($filename);
    $data = json_decode($content, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("Invalid JSON");
    }

    return $data;
}
function saveTasks(string $filename, array $tasks): void
{
    $json = json_encode($tasks);
    file_put_contents($filename, $json);
}

function listTasks(array $tasks): void
{
    if (empty($tasks)) {
        echo "No tasks found.\n";
        return;
    }

    foreach ($tasks as $task) {
        if ($task['completed'] === true) {
            echo "[x] {$task['id']}. {$task['title']}\n";
        } else {
            echo "[ ] {$task['id']}. {$task['title']}\n";
        }
    }
}

function addTask(array &$tasks, string $title): void
{
    $title = trim($title);

    if ($title === '') {
        throw new Exception("Invalid task title");
    }

    $nextId = empty($tasks) ? 1 :  max(array_column($tasks, 'id')) + 1;
    $tasks[] = [
        'id' => $nextId,
        'title' => $title,
        'completed' => false,
    ];

    echo "Task added successfully.\n";
}

function completeTask(array &$tasks, int $taskId): void
{
    foreach ($tasks as $index => $task) {
        if ($task['id'] === $taskId) {
            $tasks[$index]['completed'] = true;
            echo "Task completed successfully.\n";
            return;
        }
    }
    echo "Task not found.\n";
}

function deleteTask(array &$tasks, int $taskId): void
{
    foreach ($tasks as $index => $task) {
        if ($task['id'] === $taskId) {
            unset($tasks[$index]);
            $tasks = array_values($tasks);

            echo "Task deleted successfully.\n";
            return;
        }
    }
    echo "Task not found.\n";
}

$filename = "tasks.json";

$tasks = loadTasks($filename);

while (true) {
    echo "\n===== TASK MANAGER =====\n";
    echo "1. List tasks\n";
    echo "2. Add task\n";
    echo "3. Complete task\n";
    echo "4. Delete task\n";
    echo "5. Exit\n";

    $choice = readline("Choose an option: ");
    switch ($choice) {
        case '1':
            listTasks($tasks);
            break;

        case '2':
            $title = readline("Enter task title: ");
            addTask($tasks, $title);
            saveTasks($filename, $tasks);
            break;

        case '3':
            $taskId = readline("Enter task id: ");
            $taskId = (int)$taskId;
            completeTask($tasks, $taskId);
            saveTasks($filename, $tasks);
            break;

        case '4':
            $taskId = readline("Enter task id: ");
            $taskId = (int)$taskId;
            deleteTask($tasks, $taskId);
            saveTasks($filename, $tasks);
            break;

        case "5":
            echo "Goodbye!\n";
            break 2;
        default:
            echo "Invalid option.\n";
    }
}
