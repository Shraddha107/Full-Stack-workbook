<?php
$users = [
  ["email" => "martin@gmail.com"],
  ["email" => "james@gmail.com"],
  ["email" => "keonho@gmail.com"]
];

$newEmail = "martin@gmail.com";
$found = false;

foreach ($users as $u) {
    if ($u["email"] == $newEmail) {
        $found = true;
        break;
    }
}

echo $found ? "Email already exists" : "Email not available";

?>
