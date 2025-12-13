<form method="post" action="">
        Enter a word: <input type="text" name="word" required>
        <input type="submit" value="Reverse">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $word = $_POST['word'];
    $reversed = "";

    for ($i = strlen($word) - 1; $i >= 0; $i--) {
        $reversed .= $word[$i];
    }

    echo "Original Word: $word" . "<br>"; 
    echo "Reversed Word: $reversed";
}
?>