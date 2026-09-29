<?php
class Task
{
    protected string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getType(): string
    {
        return "Task";
    }
}

class BugTask extends Task
{
    public function getType(): string
    {
        return "Bug";
    }
}

$task = new Task("Learn OOP");
$bug = new BugTask("Fix login bug");

echo $task->getType() . PHP_EOL;
echo $bug->getType() . PHP_EOL;
