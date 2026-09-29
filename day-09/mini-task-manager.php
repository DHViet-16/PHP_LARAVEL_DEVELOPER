<?php
class Task
{
    protected string $title;
    protected bool $completed;

    public function __construct(string $title)
    {
        $title = trim($title);

        if ($title === '') {
            throw new Exception("Task title cannot be empty");
        }

        $this->title = $title;
        $this->completed = false;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function isCompleted(): bool
    {
        return $this->completed;
    }
    public function complete(): void
    {
        $this->completed = true;
    }
    public function getType(): string
    {
        return "Task";
    }
}

class BugTask extends Task
{
    private string $severity;

    public function __construct(string $title, string $severity)
    {
        parent::__construct($title);
        $this->severity = $severity;
    }

    public function getSeverity(): string
    {
        return $this->severity;
    }

    public function getType(): string
    {
        return "Bug";
    }
}

class FeatureTask extends Task
{
    private string $priority;

    public function __construct(string $title, string $priority)
    {
        parent::__construct($title);
        $this->priority = $priority;
    }

    public function getPriority(): string
    {
        return $this->priority;
    }

    public function getType(): string
    {
        return "Feature";
    }
}

$task = new Task("Learn OOP");

$bug = new BugTask(
    "Fix login bug",
    "Critical"
);

$feature = new FeatureTask(
    "Implement payment",
    "High"
);

$bug->complete();

echo "{$task->getType()}: {$task->getTitle()} - ";
echo $task->isCompleted() ? "Completed" : "Pending";
echo PHP_EOL;
echo "{$bug->getType()}: {$bug->getTitle()} - {$bug->getSeverity()} - ";
echo $bug->isCompleted() ? "Completed" : "Pending";
echo PHP_EOL;
echo "{$feature->getType()}: {$feature->getTitle()} - "
    . "{$feature->getPriority()} - "
    . ($feature->isCompleted() ? "Completed" : "Pending")
    . PHP_EOL;
echo PHP_EOL;

$tasks = [
    $task,
    $bug,
    $feature,
];
foreach ($tasks as $task) {
    echo $task->getType() . ": "
        . $task->getTitle()
        . PHP_EOL;
}
