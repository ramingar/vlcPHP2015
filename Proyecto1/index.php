<?php
echo 'hello world!';
echo '<br/>';       // en html pero no en código
echo '\n';          // pone el literal
echo "\n";          // las comillas dobles evalúan el carácter de escapado
echo "\"rafeta\"";
echo 'rafeta';

// Comentario

echo "hola"; // Comentario

/*
 * Comentario
 */

/**
 * Viene con el IDE Zend Studio y sirve para crear DocBlocks (bloques de docu)
 * Viene de PhpDocumentor.
 */
 
// echo y print
// echo es una instrucción (no devuelve nada)
// print es una función que devolverá un valor (true si salió bien)

echo "hola" . " mundo"; // se puede usar coma, pero la bna práctica con punto

// include y require
// los dos incluyen el fichero, la diferencia es el nivel de error
// require te da un fatal error si no puede incluir el fichero

// niveles: noticia, warning, y fatal error

// tb existe: include_one y require_one para que solo lo exija una vez, si
// está no lo vuelve a incluir