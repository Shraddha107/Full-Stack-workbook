<form method="post" action="">
        Enter a sentence: <input type="text" name="sentence" required>
        <input type="submit" value="Count Vowels">
</form>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sentence = $_POST['sentence'];
    $count = 0;

    $sentence = strtolower($sentence);

    for ($i = 0; $i < strlen($sentence); $i++) {
        $char = $sentence[$i];
        if ($char == 'a' || $char == 'e' || $char == 'i' || $char == 'o' || $char == 'u') {
            $count++;
        }
    }

    echo "Sentence: $sentence";
    echo "Number of vowels: $count";
}
?>