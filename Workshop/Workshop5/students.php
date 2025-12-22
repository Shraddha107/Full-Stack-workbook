<?php
    require 'header.php';

    echo "<h2>View Students</h2>";

    try {
        if (!file_exists("students.txt")) { 
            throw new Exception("No student records found."); 
        }

        $lines = file("students.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (empty($lines)) { 
            throw new Exception("Student file is empty."); 
        }

        foreach ($lines as $line) { 
            $parts = explode(",", $line);

            if (count($parts) < 4) continue; 
            $timestamp = $parts[0]; 
            $name = $parts[1]; 
            $email = $parts[2]; 
            $skillsStr = $parts[3]; 
            
            $skills = explode("|", $skillsStr);

            echo "<div style='margin-bottom:15px;'>"; 
            echo "<strong>Name:</strong> " . htmlspecialchars($name) . "<br>"; 
            echo "<strong>Email:</strong> " . htmlspecialchars($email) . "<br>"; 
            echo "<strong>Skills:</strong> <ul>"; 
            foreach ($skills as $skill) { 
                echo "<li>" . htmlspecialchars(trim($skill)) . "</li>"; 
            } 
            echo "</ul>"; 
            echo "</div>";
        }
    } catch (Exception $e) {
        echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
    }

    include "footer.php";
?>