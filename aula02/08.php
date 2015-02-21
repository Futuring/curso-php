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
}

$sql .= ") ";
$sqlValues .= ")";

echo "{$sql}{$sqlValues}";