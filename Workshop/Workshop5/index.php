<h1>Welcome to the Student Portfolio Manager</h1>
<p>This application demonstrates PHP basics: functions, arrays, string handling, file handling, error handling,
    include/require, and file upload.</p>

<?php
    require "header.php";
?>

<nav>
    <ul>
        <li><a href="add_student.php">Add Student Info</a></li>
        <li><a href="upload.php">Upload Portfolio File</a></li>
    </ul>
</nav>

<?php
    include "footer.php";
?>