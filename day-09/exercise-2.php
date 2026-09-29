<?php
class Task
{
    protected string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
class BugTask extends Task
{
    public function reportBug(): string
    {
        return "Bug: " . $this->title;
    }
}

$bug = new BugTask("Fix login bug");

echo $bug->getTitle() . PHP_EOL;
echo $bug->reportBug() . PHP_EOL;