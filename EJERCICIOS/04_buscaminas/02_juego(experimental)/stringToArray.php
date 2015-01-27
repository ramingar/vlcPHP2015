<?php
/**
 * Converts a string to an array
 * @param string $string with this format "key:value,..."
 * @return array
 */
function stringToArray($string) {
    $arrayTemp = array_map(function ($v) { return explode(':', $v); }, explode(',', $string));
    return array_reduce($arrayTemp, function ($temp, $v){ $temp[$v[0]]=$v[1]; return $temp; });
}