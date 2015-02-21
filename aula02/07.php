<?php
$array = array(1, 2, 3, 4, 5);
$array[] = 6;
$array[] = 7;

$array2 = array();
$tamanho = count($array);

foreach ($array as $key => $value) {
    $array2[] = $value;
}

for($contandor = 0; $contador < $tamanho; $contador++) {
    $array2[] = $array[$contador] * 2;
}

var_dump($array2);
die();

while($contador < $tamanho) {
    $array2[] = $array[$contador] * 2;
    $contador++;
}


