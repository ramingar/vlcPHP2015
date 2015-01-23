<?php

require('lookForMines.php');
require('arrayToString.php');
require('stringToArray.php');
require_once('isBomb.php');
//require('Http/Request.php');

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


// ------------------------------
$sBoard = arrayToString($board);
// $url = 'minesWeeper.php?';
// $url .= 'columns=' . $columns;
// $url .= '&rows=' . $rows;
// $url .= '&cells=' . $cells;
// $url .= '&mines=' . $mines;
// $url .= '&mine=' . MINE;
// $url .= '&board=' . $sBoard;
// header('Location: ' . $url);
// die();

echo '<form name="frm" method="post" action="minesWeeper.php">';
echo '<input type="hidden" name="columns" value="' . $columns . '" />';
echo '<input type="hidden" name="rows" value="' . $rows . '" />';
echo '<input type="hidden" name="cells" value="' . $cells . '" />';
echo '<input type="hidden" name="mines" value="' . $mines . '" />';
echo '<input type="hidden" name="mine" value="' . MINE . '" />';
echo '<input type="hidden" name="board" value="' . $sBoard . '" />';
echo '</form>';

?>

<script language="JavaScript">
document.frm.submit();
</script>