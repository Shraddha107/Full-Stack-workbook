<?php
session_start();

if (empty($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit;
}

$theme = isset($_COOKIE['theme']) && in_array($_COOKIE['theme'], ['light', 'dark'], true)
    ? $_COOKIE['theme']
    : 'light';

$message = '';
$css = $theme === 'dark'
    ? "body { background:#111; color:#eee; } a { color:#9bd; } .btn { background:#333; color:#eee; }"
    : "body { background:#fff; color:#222; } a { color:#06c; } .btn { background:#f5f5f5; color:#222; }";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value = $_POST['theme'] ?? 'light';
    if (!in_array($value, ['light', 'dark'], true)) {
        $message = 'Invalid theme selected.';
    } else {
        setcookie('theme', $value, time() + 86400 * 30, '/', '', false, true);
        $theme = $value;
        $css   = $theme === 'dark'
            ? "body { background:#111; color:#eee; } a { color:#9bd; } .btn { background:#333; color:#eee; }"
            : "body { background:#fff; color:#222; } a { color:#06c; } .btn { background:#f5f5f5; color:#222; }";
        $message = 'Theme updated to ' . htmlspecialchars($theme) . '.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Preferences</title>
    <style><?= $css ?></style>
</head>
<body>
    <h2>Preferences</h2>
    <?php if ($message): ?><p style="color:green;"><?= $message ?></p><?php endif; ?>

    <form method="post">
        <label>Select Theme:</label><br>
        <label><input type="radio" name="theme" value="light" <?= $theme === 'light' ? 'checked' : '' ?>> Light mode</label><br>
        <label><input type="radio" name="theme" value="dark"  <?= $theme === 'dark'  ? 'checked' : '' ?>> Dark mode</label><br><br>
        <button type="submit" class="btn">Save Preference</button>
    </form>

    <p><a href="dashboard.php">Back to Dashboard</a></p>
</body>
</html>
