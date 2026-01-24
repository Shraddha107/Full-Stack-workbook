<?php

require 'session.php';
require 'db.php';

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$error = '';

try {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            $error = "Invalid request. CSRF token mismatch.";
        } else {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
    
            if (empty($email) || empty($password)) {
                $error = "Email and Password are required.";
            } else {
                $sql = "SELECT * FROM users WHERE email = :email";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([':email' => $email]);
                $user = $stmt->fetch();
    
                if ($user && password_verify($password, $user['password'])) {
                    session_regenerate_id(true);
    
                    $_SESSION['user_id'] = $user['id'];
                    header('Location: dashboard.php');
                    exit;
                } else {
                    $error = "Invalid login credentials";
                }
    
            }
        }

    }

} catch (Exception $e) {
    $error = "Something went wrong.";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>

    <h2>Login</h2>

    <?php if ($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Email:</label><br>
        <input type="text" name="email"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

        <button type="submit">Login</button>
    </form>
    <br>
    <a href="signup.php">Go to Signup</a>
</body>

</html>