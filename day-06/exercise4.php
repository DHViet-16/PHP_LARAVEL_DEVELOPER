<?php
$createdAt = new DateTime("2026-09-20 10:30:00");
$deadline = clone $createdAt;

$deadline->modify("+7 days");
$interval = $createdAt->diff($deadline);

echo "Created: " . $createdAt->format("Y-m-d H:i:s") . "\n";
echo "Deadline: " . $deadline->format("Y-m-d H:i:s") . "\n";
echo "Days: {$interval->days} \n";
