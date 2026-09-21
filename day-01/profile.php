<?php
$name = "Hoang Viet";
$age = 23;
$email = "hoangvietpk16@gmail.com";
$job = "Front-end Developer";
$salary = 10000000;
$isDeveloper = true;
$skills = [
    "PHP",
    "HTML/CSS",
    "Git",
    "MySQL"
];

var_dump($name);
var_dump($age);
var_dump($job);
var_dump($salary);
var_dump($isDeveloper);

echo "===== PROFILE ===== \n";
echo "Name: {$name}\n";
echo "Age: {$age}\n";
echo "Email: {$email}\n";
echo "Job: {$job}\n";
echo "Salary: {$salary}\n";
if ($isDeveloper) {
    echo "Is Developer: YES\n";
}
else{
     echo "Is Developer: NO\n";
}
echo "\n";
echo "Skills:\n";
echo "- {$skills[0]}\n";
echo "- {$skills[1]}\n";
echo "- {$skills[2]}\n";
echo "- {$skills[3]}\n";