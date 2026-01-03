<?php
require 'db.php'; 
$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = trim($_POST['student_id'] ?? '');
    $full_name  = trim($_POST['full_name'] ?? '');
    $password   = $_POST['password'] ?? '';

    if ($student_id === '' || $full_name === '' || $password === '') {
        $errors[] = 'All fields are required.';
    }

    if (!$errors) {
        try {
            $stmt = $pdo->prepare('SELECT id FROM students WHERE student_id = ?');
            $stmt->execute([$student_id]);
            if ($stmt->fetch()) {
                $errors[] = 'Student ID already registered.';
            } else {
                $hash = password_hash($password, PASSWORD_BCRYPT);
                $insert = $pdo->prepare(
                    'INSERT INTO students (student_id, full_name, password_hash) VALUES (?, ?, ?)'
                );
                $insert->execute([$student_id, $full_name, $hash]);

                header('Location: login.php?registered=1');
                exit;
            }
        } catch (PDOException $e) {
            $errors[] = 'Database error: ' . htmlspecialchars($e->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    <?php if ($errors): ?>
        <div style="color:red;">
            <?php foreach ($errors as $e) echo "<p>".htmlspecialchars($e)."</p>"; ?>
        </div>
    <?php endif; ?>

    <form method="post" action="register.php">
        Student ID: <input type="text" name="student_id" required><br><br> 
        Full Name: <input type="text" name="full_name" required><br><br> 
        Password: <input type="password" name="password" required><br><br> 
        <button type="submit">Create Account</button> 
    </form> 
    <p>Already registered? <a href="login.php">Login</a></p> 

</body> 
</html>