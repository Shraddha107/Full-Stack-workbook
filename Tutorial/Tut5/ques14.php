<?php
    $name = "John Doe";
    $email = "john@example.com";
    $message = "Hello there!";

    $name = htmlspecialchars(trim($name));
    $email = htmlspecialchars(trim($email));
    $message = htmlspecialchars(trim($message));

    $timestamp = date('Y-m-d H:i:s');
    
    $single = $timestamp . ', ' . $name . ', ' . $email . ', ' . $message. "\n";

    file_put_contents("contact.csv", $single, FILE_APPEND);

    $read = file("contact.csv");

    foreach ($read as $line) {
        echo "$line" . "<br>";
    }



?>