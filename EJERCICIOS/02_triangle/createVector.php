<?php

/**
 * Create a vector from two points
 * 
 * @param array $point1 (1, 2)
 * @param array $point2 (4, 6)
 * @return array
 */
function createVector($point1, $point2)
{
    return array($point2[0]-$point1[0], $point2[1]-$point1[1]);
}