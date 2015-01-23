<?php

require ('isTriangle.php');

// it's a triangle
$point1 = array(2, 1);
$point2 = array(3, 1);
$point3 = array(4, 2);
echo 'TEST: we have a triangle: ';
echo isTriangle($point1, $point2, $point3) ? 'OK' : 'ERROR';
echo '<br/>' . "\n";

// it's a triangle (with negative coordinates)
$point1 = array(-2, 1);
$point2 = array(3, -1);
$point3 = array(4, 2);
echo 'TEST: we have a triangle: ';
echo isTriangle($point1, $point2, $point3) ? 'OK' : 'ERROR';
echo '<br/>' . "\n";

// point1 and point2 and point3 are in (0,0) -> it's not a triangle
$point1 = array(0, 0);
$point2 = array(0, 0);
$point3 = array(0, 0);
echo 'TEST: point1 and point2 and point3 are in (0,0) ';
echo '-> it\'s not a triangle: ';
echo !isTriangle($point1, $point2, $point3) ? 'OK' : 'ERROR';
echo '<br/>' . "\n";

// point1 and point2 are the same point -> it's not a triangle
$point1 = array(2, 1);
$point2 = array(2, 1);
$point3 = array(4, 2);
echo 'TEST: point1 and point2 are the same point -> it\'s not a triangle: ';
echo !isTriangle($point1, $point2, $point3) ? 'OK' : 'ERROR';
echo '<br/>' . "\n";

// point1 and point3 are the same point -> it's not a triangle
$point1 = array(2, 1);
$point2 = array(4, 2);
$point3 = array(2, 1);
echo 'TEST: point1 and point3 are the same point -> it\'s not a triangle: ';
echo !isTriangle($point1, $point2, $point3) ? 'OK' : 'ERROR';
echo '<br/>' . "\n";

// point1 and point2 and point3 are in the same X-axis' value
$point1 = array(2, 1);
$point2 = array(2, 5);
$point3 = array(2, 2);
echo 'TEST: point1 and point2 and point3 are in the same X-axis\' value ';
echo '-> it\'s not a triangle: ';
echo !isTriangle($point1, $point2, $point3) ? 'OK' : 'ERROR';
echo '<br/>' . "\n";

// point1 and point2 and point3 are in the same Y-axis' value
$point1 = array(1, 2);
$point2 = array(5, 2);
$point3 = array(2, 2);
echo 'TEST: point1 and point2 and point3 are in the same Y-axis\' value ';
echo '-> it\'s not a triangle: ';
echo !isTriangle($point1, $point2, $point3) ? 'OK' : 'ERROR';
echo '<br/>' . "\n";

// point3 is in point1 and point2's vector
$point1 = array(1, 2);
$point2 = array(4, 8);
$point3 = array(2, 4);
echo 'TEST: point3 is in point1 and point2\'s vector ';
echo '-> it\'s not a triangle: ';
echo !isTriangle($point1, $point2, $point3) ? 'OK' : 'ERROR';
echo '<br/>' . "\n";

// point2 is in point1 and point3's vector
$point1 = array(1, 2);
$point2 = array(2, 4);
$point3 = array(4, 8);
echo 'TEST: point3 is in point1 and point2\'s vector ';
echo '-> it\'s not a triangle: ';
echo !isTriangle($point1, $point2, $point3) ? 'OK' : 'ERROR';
echo '<br/>' . "\n";

// point1 is in point2 and point3's vector
$point1 = array(2, 4);
$point2 = array(1, 2);
$point3 = array(4, 8);
echo 'TEST: point3 is in point1 and point2\'s vector ';
echo '-> it\'s not a triangle: ';
echo !isTriangle($point1, $point2, $point3) ? 'OK' : 'ERROR';
echo '<br/>' . "\n";

// point1 is in point2 and point3's vector (negative coordinates in X-axis)
$point1 = array(-2, 4);
$point2 = array(-1, 2);
$point3 = array(-4, 8);
echo 'TEST: point3 is in point1 and point2\'s vector ';
echo '(with negative coordinates) -> it\'s not a triangle: ';
echo !isTriangle($point1, $point2, $point3) ? 'OK' : 'ERROR';
echo '<br/>' . "\n";

// point1 is in point2 and point3's vector (negative coordinates in Y-axis)
$point1 = array(2, -4);
$point2 = array(1, -2);
$point3 = array(4, -8);
echo 'TEST: point3 is in point1 and point2\'s vector ';
echo '(with negative coordinates) -> it\'s not a triangle: ';
echo !isTriangle($point1, $point2, $point3) ? 'OK' : 'ERROR';
echo '<br/>' . "\n";