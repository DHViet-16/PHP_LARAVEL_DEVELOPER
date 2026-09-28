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
        return $this->completed ? 'Completed' : 'Pending';
    }
}
$task = new Task("Learn PHP");
$task->complete();
echo $task->getStatus();
