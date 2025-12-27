<link rel="stylesheet" href="style.css">

<form method="get">
    Category: <input type="text" name="category">
    <button>Search</button>
</form>

<?php
include 'db.php';

if(isset($_GET['category'])){
    $category = $_GET['category'];
    $sql = "SELECT * FROM books WHERE category='$category'";
    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){
        echo "ID: " . $row["book_id"] ."<br>";
        echo "Title: " . $row["title"] ."<br>";
        echo "Author: " . $row["author"] ."<br>";
        echo "Category: " . $row["category"] ."<br>";
        echo "Quantity: " . $row["quantity"] ."<br><br>";
    }
}
?>