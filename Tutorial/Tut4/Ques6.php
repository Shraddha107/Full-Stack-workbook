<form method="POST">
    Name: <input type="text" name="name"><br>
    Age: <input type="number" name="age"><br>
    Favorite Language: <input type="text" name="lang"><br>
    <button>Preview</button>
</form>

<?php
if (!empty($_POST)) {
    if ($_POST['name'] && $_POST['age'] && $_POST['lang']) {
        echo "<h3>User Preview:</h3>";
        echo "Name: ".$_POST['name']."<br>";
        echo "Age: ".$_POST['age']."<br>";
        echo "Favorite Language: ".$_POST['lang'];
    } else {
        echo "<span style='color:red;'>All fields required!</span>";
    }
}