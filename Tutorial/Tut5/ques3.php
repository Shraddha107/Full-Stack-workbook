<?php
    $globalVar = "I am global";

    function test1() {
        echo $globalVar; 
    }

    function test2() {
        global $globalVar;
        echo $globalVar;
    }

    echo "<b>Without global:</b><br>";
    test1(); 

    echo "<br><br><b>With global:</b><br>";
    test2(); 
?>