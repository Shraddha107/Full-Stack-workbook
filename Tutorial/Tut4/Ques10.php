<form method="POST">
    Num1: <input type="number" name="a">
    Num2: <input type="number" name="b">
    Operation:
    <select name="op">
        <option>add</option>
        <option>subtract</option>
        <option>multiply</option>
        <option>divide</option>
    </select>
    <button>Calculate</button>
</form>

<?php
if (!empty($_POST)) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $op = $_POST['op'];

    switch ($op) {
        case "add": echo $a + $b; break;
        case "subtract": echo $a - $b; break;
        case "multiply": echo $a * $b; break;
        case "divide": echo $b==0 ? "Cannot divide by zero" : $a/$b; break;
    }
}
?>