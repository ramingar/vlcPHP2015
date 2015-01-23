<?php

require('arrayToString.php');
require('stringToArray.php');

$columns = $_POST['columns'];
$rows = $_POST['rows'];
$cells = $_POST['cells'];
$mines = $_POST['mines'];
$board = stringToArray($_POST['board']);
$mine = $_POST['mine'];
if (array_key_exists('opened', $_POST) && array_key_exists('openCell', $_POST)) {
    $_POST['opened'] .= $_POST['opened']!='' ? ',' : '';
    $_POST['opened'] .= $_POST['openCell'];
}
$sOpened = array_key_exists('opened', $_POST) ? $_POST['opened'] : '';
$opened = $sOpened!='' ? stringToArray($sOpened) : [];
$dead = false;

//
$sBoard = arrayToString($board);
$sOpened = $opened!='' ? arrayToString($opened) : '';
$url = 'minesWeeper.php?';
$url .= 'columns=' . $columns;
$url .= '&rows=' . $rows;
$url .= '&cells=' . $cells;
$url .= '&mines=' . $mines;
$url .= '&mine=' . $mine;
$url .= '&board=' . $sBoard;

// Render solution board
echo 'solucion<br/>';
echo '<table border=\'1\'><tr>';
for ($ii=0; $ii<$cells; $ii++) {
    echo '<td>' . $board[$ii+1] . '</td>';
    if (($ii+1)%$columns==0 && $ii+1!=$cells) {
        echo '</tr><tr>';
    }
}
echo '</tr></table>';
echo '<br/>';