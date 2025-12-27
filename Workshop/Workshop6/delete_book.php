<link rel="stylesheet" href="style.css">

<form method="get">
    ID: <input type="text" name="id">
    <button>Delete</button>
</form>

<?php

include 'db.php';

if(isset($_GET['id'])){
    $book_id = $_GET["id"];
    $sql = "DELETE FROM books WHERE book_id='$book_id'";
    mysqli_query($conn, $sql);

    header("Location: view_books.php");
}
?>