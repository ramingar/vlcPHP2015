<?php
$rows = 4;
$columns = 5;
echo "<table border=1>";
for ($a=0; $a<=$rows; $a++) {
    echo "<tr><td>" . $a . "</td>";
    for ($b=1; $b<=$columns; $b++) {
        if ($a==0) {
            echo "<td>" . $b . "</td>";
        } else {
            echo "<td>" . $a*$b . "</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";