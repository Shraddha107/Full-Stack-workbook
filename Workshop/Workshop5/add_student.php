<h2>Add Student Info</h2>
<form method="post" action="">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="text" name="email"><br><br>
    Skills (comma-separated): <input type="text" name="skills"><br><br>
    <input type="submit" value="Save Student">
</form>

<?php
    require "functions.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $name = formatName($_POST["name"]); 
        $email = $_POST["email"]; 
        $skillsArray = cleanSkills($_POST["skills"]); 
        
        if (!validateEmail($email)) { 
            echo "Invalid email!"; 
        } else { 
            if (saveStudent($name, $email, $skillsArray)) { 
                echo "<p style='color:green;'>Student info saved successfully!</p>"; 
            } else { 
                echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>"; 
            } 
        }
    } 
?>