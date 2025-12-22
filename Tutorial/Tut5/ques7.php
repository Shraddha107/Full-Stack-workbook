<?php
    $file = fopen("note.txt", "w");

    fwrite($file, "This is first line.\n");
    fwrite($file, "This is second line.\n");

    fclose($file);
?>