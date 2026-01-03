<?php
require 'db.php';  
session_start();        

$errors = [];
$notice = isset($_GET['registered']) ? 'Registration successful. Please log in.' : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = trim($_POST['student_id'] ?? '');
    $password   = $_POST['password'] ?? '';

    if ($student_id === '' || $password === '') {
        $errors[] = 'Student ID and password are required.';
    } else {
        $stmt = $pdo->prepare('SELECT full_name, password_hash FROM students WHERE student_id = ?');
        $stmt->execute([$student_id]);
        $user = $stmt->fetch();

        if (!$user || !password_verify($password, $user['password_hash'])) {
            $errors[] = 'Invalid credentials.';
        } else {
            session_regenerate_id(true);
            $_SESSION['logged_in']  = true;
            $_SESSION['student_id'] = $student_id;
            $_SESSION['full_name']  = $user['full_name'];

            header('Location: dashboard.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php if ($notice): ?>
        <p style="color:green;"><?= htmlspecialchars($notice) ?></p>
    <?php endif; ?>

    <?php if ($errors): ?>
        <div style="color:red;">
            <?php foreach ($errors as $e) echo "<p>".htmlspecialchars($e)."</p>"; ?>
        </div>
    <?php endif; ?>

    <form method="post" autocomplete="off">
        Student ID: <input type="text" name="student_id" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>

    <p>New here? <a href="register.php">Register</a></p>
</body>
</html>
