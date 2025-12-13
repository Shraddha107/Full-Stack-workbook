<?php
$name = "Shraddha";
echo "$name";
$hour = date("H");

echo date("Y-m-d") ."<br>";

if ($hour >= 5 && $hour < 12) {
    echo "Its morning";
} elseif ($hour >= 12 && $hour < 17) {
    echo "Its afternoon";
} else {
    echo "Its evening";
}
?>