<?php

/**
 * Converts an array to a string keeping the keys 
 * @param array $array
 * @return string "key:value,..." -> "7:*,10:*,2:*,15:*"
 */
function arrayToString($array) {
    return implode(',', array_map(function ($v, $k) { return $k . ':' . $v; }, $array, array_keys($array)));
}