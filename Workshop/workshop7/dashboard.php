<?php
session_start();

if (empty($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit;
}

$theme = isset($_COOKIE['theme']) && in_array($_COOKIE['theme'], ['light', 'dark'], true)
    ? $_COOKIE['theme']
    : 'light';

$css = $theme === 'dark'
    ? "body { background:#111; color:#eee; } a { color:#9bd; } .btn { background:#333; color:#eee; }"
    : "body { background:#fff; color:#222; } a { color:#06c; } .btn { background:#f5f5f5; color:#222; }";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <style><?= $css ?></style>
</head>
<body>
    <h2>Welcome, <?= htmlspecialchars($_SESSION['full_name'] ?? 'Student') ?>!</h2>
    <p>Theme: <strong><?= htmlspecialchars($theme) ?></strong></p>

    <nav>
        <a href="dashboard.php">Home</a> |
        <a href="preference.php">Preferences</a> |
        <form action="logout.php" method="post" style="display:inline;"> 
            <button type="submit" class="btn">Logout</button> 
        </form>
    </nav>

    <hr>
    <p>This is your student grade portal dashboard. You can add links to grades, profile, or other features here.</p>
</body>
</html>
