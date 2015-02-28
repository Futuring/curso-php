<?php
$array = array("nome" => 'Breno Douglas', 'idade' => 16, 'sexo' => "MASCULINO");

$sql = "INSERT INTO pessoa (";
$sqlValues = "VALUES (";
$ePrimeiro = false;

foreach ($array as $indice => $valor) {
    
    if($ePrimeiro) {
        $sql .= ",".$indice;
        $sqlValues .= ",".$valor;
    } else {
        $sql .= $indice;
        $sqlValues .= $valor;
        $ePrimeiro = true;
    }
    
    $valor =  md5(uniqid(rand(), true));
}

echo "<pre>";
print_r($array);
echo "</pre>";
die;

$sql .= ") ";
$sqlValues .= ")";

echo "{$sql}{$sqlValues}";