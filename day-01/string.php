<?php
$name = "  Hoang Viet  ";

$name = trim($name);
$name = strtoupper($name);
echo "$name\n";


$email = "  HOANGVIET@EXAMPLE.COM  ";

$email = trim($email);
$email = strtolower($email);
echo "$email\n";

$text = "I am learning PHP";

$result = str_replace("PHP", "Laravel", $text);
echo "$result\n";

$skillsText = "PHP,Laravel,MySQL,Git,Docker";
$result = explode(",", $skillsText);
echo "Skills:\n";
foreach ($result as $item) {
    echo "- {$item}\n";
}


$skills = ["PHP", "Laravel", "MySQL", "Git", "Docker"];
$result = implode(" | ", $skills);
echo "$result\n";

$user = [
    "name" => "  Hoang Viet  ",
    "email" => " HOANGVIET@EXAMPLE.COM ",
    "skills" => "PHP,Laravel,MySQL,Git"
];
$name = trim($user['name']);
$email = strtolower(trim($user['email']));
$user_skills = explode(",", $user['skills']);
$count_skill = count($user_skills);
echo "===== USER PROFILE =====\n";
echo "Name: {$name}\n";
echo "Email: {$email}\n";
echo "\n\n";
echo "Skills:\n";
foreach ($user_skills as $skill) {
    echo "- {$skill}\n";
}
echo "\n\n";
echo "Total skills: {$count_skill}\n";