<?php

require_once('isBomb.php');

/**
 * Look for mines around $position
 * 
 * @param integer $position
 * @param array $board
 * @param integer $columns
 * @param string $symbolMine
 * @return integer $count Number of mines found
 */
function lookForMines($position, $board, $columns, $rows, $symbolMine)
{
    $count = 0;
    $forbidden = [];
    
    // Forbidden left
    if (($position-1)%$columns==0) {
        $forbidden['left']=true;
    }
    
    // Forbidden right
    if ($position%$columns==0) {
        $forbidden['right']=true;
    }
    
    // Forbidden bot
    if ($position>($columns*$rows-$columns)) {
        $forbidden['bot']=true;
    }
    
    // Forbidden top
    if ($position<=$columns) {
        $forbidden['top']=true;
    }
    
    // -------------------------
    
    if (!array_key_exists('left', $forbidden)) {
        $count += (int)mineInLeft($position, $board, $symbolMine);
    }
    
    if (!array_key_exists('right', $forbidden)) {
        $count += (int)mineInRight($position, $board, $symbolMine);
    }
    
    if (!array_key_exists('bot', $forbidden)) {
        $count += (int)mineInBottom($position, $board, $columns, $symbolMine);
    }
    
    if (!array_key_exists('top', $forbidden)) {
        $count += (int)mineInTop($position, $board, $columns, $symbolMine);
    }
    
    if (!array_key_exists('left', $forbidden) && !array_key_exists('top', $forbidden)) {
        $count += (int)mineInTopLeft($position, $board, $columns, $symbolMine);
    }
    
    if (!array_key_exists('top', $forbidden) && !array_key_exists('right', $forbidden)) {
        $count += (int)mineInTopRight($position, $board, $columns, $symbolMine);
    }
    
    if (!array_key_exists('left', $forbidden) && !array_key_exists('bot', $forbidden)) {
        $count += (int)mineInBotLeft($position, $board, $columns, $symbolMine);
    }
    
    if (!array_key_exists('bot', $forbidden) && !array_key_exists('right', $forbidden)) {
        $count += (int)mineInBotRight($position, $board, $columns, $symbolMine);
    }

    return $count;
}

function mineInLeft($position, $board, $symbolMine)
{
    $where = $position-1;
    return isBomb($where, $board, $symbolMine);
}

function mineInRight($position, $board, $symbolMine)
{
    $where = $position+1;
    return isBomb($where, $board, $symbolMine);
}

function mineInTop($position, $board, $columns, $symbolMine)
{
    $where = $position-$columns;
    return isBomb($where, $board, $symbolMine);
}

function mineInBottom($position, $board, $columns, $symbolMine)
{
    $where = $position+$columns;
    return isBomb($where, $board, $symbolMine);
}

function mineInTopLeft($position, $board, $columns, $symbolMine)
{
    $where = $position-$columns-1;
    return isBomb($where, $board, $symbolMine);
}

function mineInTopRight($position, $board, $columns, $symbolMine)
{
    $where = $position-$columns+1;
    return isBomb($where, $board, $symbolMine);
}

function mineInBotLeft($position, $board, $columns, $symbolMine)
{
    $where = $position+$columns-1;
    return isBomb($where, $board, $symbolMine);
}

function mineInBotRight($position, $board, $columns, $symbolMine)
{
    $where = $position+$columns+1;
    return isBomb($where, $board, $symbolMine);
}