<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
</head>
<body>
    <form method="post" action="">
        <label for="name">Full Name:</label><br>
        <input type="text" id="name" name="name" required
                    value="<?php echo isset($_POST['name']) ? $_POST['name']:''; ?>"><br><br>
        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email" required
                    value="<?php echo isset($_POST['email']) ? $_POST['email']:''; ?>"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
    
        <button type="submit" name="register">Submit</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['register'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $cpass    = $_POST['confirm_password'];

    $errors = [];

    if(empty($name))   $errors[] = "Name is required";
    if(empty($email))  $errors[] = "Email is required";
    if(empty($password)) $errors[] = "Password is required";
    if(empty($cpass))    $errors[] = "Confirm password is required";
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format";
    if(strlen($password) < 8) $errors[] = "Password must be ≥ 8 characters";
    if($password !== $cpass) $errors[] = "Passwords do not match";

    // Simulate existing users from JSON
    // $existing_json = '[{"name":"Ram","email":"ram@example.com","password":"xxx"},{"name":"Sita","email":"sita@example.com","password":"xxx"}]';
    $file = "users.json";
    if(!file_exists($file)){
        file_put_contents($file, "[]");
    }
    
    $all_users = json_decode(file_get_contents($file), true);

    $email_exists = false;
    foreach($all_users as $u) {
        if($u['email'] === $email) {
            $email_exists = true;
            break;
        }
    }
    if($email_exists) {
        $errors[] = "Email already registered";
    }

    if(!empty($errors)) {
        echo "<h3 style='color:red'>Fix these errors:</h3>";
        foreach($errors as $e) echo "<p style='color:red'>→ $e</p>";
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $new_user = ["name"=>$name, "email"=>$email, "password"=>$hashed];
        $all_users[] = $new_user;

        file_put_contents($file, json_encode($all_users, JSON_PRETTY_PRINT));

        echo "<div style='background:green;color:white;padding:20px;border-radius:10px'>";
        echo "<h2>Registration Successful!</h2>";
        echo "Welcome <b>$name</b>!<br>";
        echo "Total registered users: " . count($all_users);
        echo "<h4>Final users array (tomorrow this will be saved to users.json):</h4>";
        echo "<pre>";
        print_r($all_users);
        echo "</pre>";
        echo "</div>";
    }
}
?>