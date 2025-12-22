<h2>Upload Portfolio File</h2>
<form method="post" enctype="multipart/form-data">
    Select file (PDF, JPG, PNG, max 2MB):<br><br>
    <input type="file" name="portfolio"><br><br>
    <input type="submit" value="Upload">
</form>

<?php
    require "functions.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $result = uploadPortfolioFile($_FILES["portfolio"]); 
        echo $result;
    }
?>




