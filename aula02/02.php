<?php
$a = array();

$b = array(2, 3, 4, 5, 6);

$c = array('a' => 1, 'b' => 2, 'c' => 3);

$d = array(1 => 'teste', 3 => 6, 9 => 'numero 5', 2 => 10);

$e = array( 1 => array(1, 3, 4), 2 => array('chave' => 'valor'));

echo $b[0];
echo '<br>';

echo $c['a'];
echo '<br>';

echo $e[1][0];
echo '<br>';

echo $e[2]['chave'];