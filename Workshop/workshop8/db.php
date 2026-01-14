<?php

$host = 'localhost';       
$user = 'root';           
$pass = '';              
$db   = 'school_db';      

$conn = mysqli_connect($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
} else {
    echo "Connection successful!";
}

?>


