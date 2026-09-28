<?php

class Task
{
    public string $title;
    public bool $completed;

    public function __construct(string $title)
    {
        $this->title = $title;
        $this->completed = false;
    }

    public function complete(): void
    {
        $this->completed = true;
    }

    public function rename(string $title): void
    {
        $this->title = $title;
    }

    public function isCompleted(): bool
    {
        return $this->completed;
    }

    public function getStatus(): string
    {
        return $this->completed ? "Completed" : "Pending";
    }
}

$task1 = new Task("Learn PHP");
$task2 = new Task("Learn OOP");
$task3 = new Task("Learn Laravel");

$task1->complete();
$task2->rename('Learn Advanced OOP');

echo $task1->title . " - {$task1->getStatus()}\n";
echo $task2->title . " - {$task2->getStatus()}\n";
echo $task3->title . " - {$task3->getStatus()}\n";
