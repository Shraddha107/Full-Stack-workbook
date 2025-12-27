<link rel="stylesheet" href="style.css">

<?php
include 'db.php';

$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "ID: " . $row["book_id"] . "<br>";
    echo "Title: " . $row["title"] . "<br>";
    echo "Author: " . $row["author"] . "<br>";
    echo "Category: " . $row["category"] . "<br>";
    echo "Quantity: " . $row["quantity"] . "<br><br>";
}
?>