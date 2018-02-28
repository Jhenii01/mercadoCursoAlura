<?php

function dataPtBrParaMysql($dataPtBr) {
    $partes = explode("/", $dataPtBr);
    return "{$partes[2]}-{$partes[1]}-{$partes[0]}";
}

function dataMysqlParaPtBr($dataMysql){
 
    $date = new DateTime($dataMysql);
    return $date->format("d/m/Y");
}