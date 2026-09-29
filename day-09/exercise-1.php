<?php
class Task
{
    private string $title;
    private bool $completed;

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

    public function setTitle(string $title): void
    {
        $title = trim($title);

        if ($title === '') {
            throw new Exception("Task title cannot be empty");
        }

        $this->title = $title;
    }
}
$task = new Task("Learn Encapsulation");

$task = new Task("Learn PHP");

$task->setTitle("   ");

echo $task->getTitle() . PHP_EOL;
