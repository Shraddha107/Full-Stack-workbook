<?php

require 'session.php';
require 'db.php';

$user_email = '';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT email FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $user_id]);
    $user = $stmt->fetch();
    if ($user) {
        $user_email = htmlspecialchars($user['email']);
    }
}

if (isset($_POST['logout'])) {
    $_SESSION = [];
    session_destroy();
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h1>Welcome to my site</h1>
<?php if ($user_email): ?>
    <p>Logged In User : <?php echo $user_email; ?></p>
    <form method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>

<?php else: ?>
    <a href="login.php">
        <button>Login</button>
    </a>

<?php endif; ?>

</body>
</html>
