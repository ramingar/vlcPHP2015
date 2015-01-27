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
// echo 'solucion<br/>';
// echo '<table border=\'1\'><tr>';
// for ($ii=0; $ii<$cells; $ii++) {
//     echo '<td>' . $board[$ii+1] . '</td>';
//     if (($ii+1)%$columns==0 && $ii+1!=$cells) {
//         echo '</tr><tr>';
//     }
// }
// echo '</tr></table>';
// echo '<br/>';


// Render board
echo '<table border=\'1\'><tr>';
for ($ii=0; $ii<$cells; $ii++) {
    echo '<td>';
    echo '<a onclick="document.getElementById(\'openCell\').value=\'' . ($ii+1) . ':true' . '\'; document.frm.submit();">';
    if (array_key_exists(($ii+1), $opened)) {
        echo $board[$ii+1];
        if ($board[$ii+1]==$mine) {
            $dead = true;
        }
    } else {
        echo '_';
    }
    
    echo '</a>';
    echo '</td>';
    if (($ii+1)%$columns==0 && $ii+1!=$cells) {
        echo '</tr><tr>';
    }
}
echo '</tr></table>';

echo '<br/>';
echo $dead ? 'HAS PERDIDO!!!!' : '';
echo count($opened)>=$cells-$mines ? 'HAS GANADO!!!!' : '';
echo '<br/>';
echo '<a href="main.html">Volver a empezar</a>';
echo '<br/>';


echo '<form name="frm" method="post" action="minesWeeper.php">';
echo '<input type="hidden" name="columns" value="' . $columns . '" />';
echo '<input type="hidden" name="rows" value="' . $rows . '" />';
echo '<input type="hidden" name="cells" value="' . $cells . '" />';
echo '<input type="hidden" name="mines" value="' . $mines . '" />';
echo '<input type="hidden" name="mine" value="' . $mine . '" />';
echo '<input type="hidden" name="board" value="' . $sBoard . '" />';
echo '<input type="hidden" name="opened" value="' . $sOpened . '" />';
echo '<input type="hidden" name="openCell" id="openCell" value="" />';
echo '</form>';