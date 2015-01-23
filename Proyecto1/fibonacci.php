<?php
$max = 25;
$first = 0;
$second = 1;
for ($a=0; $a<=$max; $a++) {
    $result = $first + $second; 
    echo $result . ",";
    $first = $second;
    $second = $result;
}
