<form method="post">
    Enter a number: <input type="number" name="num" required>
    <input type="submit" value="Generate Table">
</form>

<?php
if (isset($_POST["num"])) {
    $num = $_POST["num"];
    
    for ($i = 1; $i <= 10; $i++) {
        echo $num . " x " . $i . " = " . ($num * $i) . "<br>";
    }
}
?>