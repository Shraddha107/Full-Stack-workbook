<form method="POST">
    Full Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    <button>Submit</button>
</form>

<?php
if (!empty($_POST)) {
    if (empty($_POST['name']) || empty($_POST['email'])) {
        echo "<span style='color:red;'>Fields cannot be empty!</span>";
    } else {
        echo "<span style='color:green;'>All good!</span>";
    }
}