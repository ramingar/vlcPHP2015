<?php

require('lookForMines.php');
require_once('isBomb.php');

$columns =  $_GET['columns']<5 ? 5 : $_GET['columns'];
$rows =  $_GET['rows']<5 ? 5 : $_GET['rows'];
$cells = $columns*$rows;
$mines = intval($cells/5);
$board = [];

define('MINE', '*');

// Mine positions in board
$mine = 0;
while ($mine<$mines) {
    $where = rand(1, $cells);
    if (!array_key_exists($where, $board)) {
        $board[$where] = MINE;
        $mine++;
    }
}

// Board generation
for ($ii=0; $ii<$cells; $ii++) {
    $board[$ii+1] = !isBomb($ii+1, $board, MINE) ? lookForMines($ii+1, $board, $columns, $rows, MINE) : $board[$ii+1];
    $board[$ii+1] = $board[$ii+1]===0 ? '' : $board[$ii+1];
}

// Render board
echo '<table border=\'1\'><tr>';
for ($ii=0; $ii<$cells; $ii++) {
    echo '<td>' . $board[$ii+1] . '</td>';
    if (($ii+1)%$columns==0 && $ii+1!=$cells) {
        echo '</tr><tr>';
    }
}
echo '</tr></table>';
