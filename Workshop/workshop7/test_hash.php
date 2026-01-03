<?php
$plain = 'martin@123';
$hash = password_hash($plain, PASSWORD_BCRYPT);
echo "Hash: $hash\n";

if (password_verify($plain, $hash)) {
    echo "✅ Password verified!";
} else {
    echo "❌ Password failed!";
}
