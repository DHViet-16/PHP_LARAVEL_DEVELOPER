<?php
$skills = ["PHP", "Laravel", "MySQL", "Git", "Docker"];
$count_skill = count($skills);
echo "Total skills: {$count_skill}\n";

if (in_array("Laravel", $skills)) {
    echo "Laravel: YES \n";
} else {
    echo "Laravel: NO \n";
}
if (in_array("Python", $skills)) {
    echo "Python: YES \n";
} else {
    echo "Python: NO \n";
}

$skills = ["PHP", "Laravel", "MySQL"];
array_push($skills, "Git", "Docker");
echo "Skills:\n";
foreach ($skills as $skill) {
    echo "- {$skill}\n";
}

$numbers = [1, 2, 3, 4, 5];
$result = array_map(fn($number) => $number * 2, $numbers);

var_dump($numbers);
var_dump($result);


$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$result = array_filter($numbers, fn($number) =>  $number % 2 === 0);
$result = array_values($result);
var_dump($result);

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$result = array_filter($numbers, fn($number) =>  $number % 2 === 0);
$result = array_values($result);
$result = array_map(fn($number) => $number * $number, $result);
var_dump($result);