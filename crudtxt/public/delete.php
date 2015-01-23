<?php

echo '¿Está REALMENTE seguro de que quiere ELIMINAR este usuario?';
echo '<form method="POST">';
echo '<input name="id" type="hidden" value="'. $_GET['id'] .'" />';
echo '<input type="submit">Bórrame!</a>';
echo '<a href="/usuarios.php">Me he hecho caca</a>';
echo '</form>';