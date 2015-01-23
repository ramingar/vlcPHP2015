<?php

/**
 * Check if there is a mine in $position
 * 
 * @param integer $position
 * @param array $board
 * @param string $symbolMine
 * @return boolean
 */
function isBomb($position, $board, $symbolMine) {
    return array_key_exists($position, $board) && $board[$position]==$symbolMine ? true : false;
}