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
}

$bug = new BugTask(
    "Fix login bug",
    "Critical"
);

echo $bug->getTitle() . PHP_EOL;
echo $bug->getSeverity() . PHP_EOL;
