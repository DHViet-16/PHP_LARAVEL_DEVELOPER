<?php
$now = new DateTime();
$deadline = clone $now;
$deadline->modify("+7 days");

echo $now->format("Y-m-d H:i:s");
echo "\n";
echo $deadline->format("Y-m-d H:i:s");