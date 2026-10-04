<?php

// header('Content-Type: application/json');

// $task = [
//     'id' => 16,
//     'title' => 'Learn Laravel',
//     'completed' => false,
// ];

// http_response_code(201);
// $status = http_response_code();

// echo json_encode([
//     'status' => $status,
//     'message' => 'Task created successfully',
//     'data' => $task,
// ]);

// header('Content-Type: application/json');

// $tasks = [
//     [
//         'id' => 1,
//         'title' => 'Learn PHP',
//         'completed' => true,
//     ],
//     [
//         'id' => 2,
//         'title' => 'Learn OOP',
//         'completed' => true,
//     ],
//     [
//         'id' => 3,
//         'title' => 'Learn Laravel',
//         'completed' => false,
//     ],
// ];
// $data = $tasks;
// $status = $_GET['status'] ?? null;

// if (!empty($status)) {
//     if ($status === 'completed') {
//         $statusTasks = array_values(array_filter($tasks, fn($status) => $status['completed'] === true));
//         $data = $statusTasks;
//     } else if ($status === 'pending') {
//         $statusTasks = array_values(array_filter($tasks, fn($status) => $status['completed'] === false));
//         $data = $statusTasks;
//     }
// }

// http_response_code(200);

// echo json_encode([
//     'data' => $data,
// ]);


header('Content-Type: application/json');

$tasks = [
    [
        'id' => 1,
        'title' => 'Learn PHP',
        'completed' => true,
    ],
    [
        'id' => 2,
        'title' => 'Learn OOP',
        'completed' => true,
    ],
    [
        'id' => 3,
        'title' => 'Learn Laravel',
        'completed' => false,
    ],
];


$pageInput = $_GET['page'] ?? null;

if ($pageInput === null) {
    $page = 1;
} elseif (!ctype_digit($pageInput) || (int) $pageInput < 1) {
    http_response_code(422);

    echo json_encode([
        'message' => 'Invalid query parameters',
    ]);

    exit;
} else {
    $page = (int) $pageInput;
}

$perPage = 2;
$offset = ($page - 1) * $perPage;

$status = $_GET['status'] ?? null;

if ($status === null) {
    $data = $tasks;
} elseif ($status === 'completed') {
    $data = array_values(
        array_filter(
            $tasks,
            fn($task) => $task['completed'] === true
        )
    );
} elseif ($status === 'pending') {
    $data = array_values(
        array_filter(
            $tasks,
            fn($task) => $task['completed'] === false
        )
    );
} else {
    http_response_code(422);
    echo json_encode([
        "message" => "Invalid query parameters",
    ]);
    exit;
}

$data = array_slice($data, $offset, $perPage);

http_response_code(200);
$status = http_response_code();
echo json_encode([
    'status' => $status,
    'data' => $data,
    'meta' => [
        'page' => $page,
        'per_page' => $perPage,
    ]
]);
