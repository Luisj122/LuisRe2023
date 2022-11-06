<?php

function palabra(){
    $diccionario = ["hola","manzana","avion","abecedario","dimensional","vagabundo","television","hablar","beber","conducir","trabajar","escribir","arbol","agua"];

    $indice = rand(0,count($diccionario)-1);

    $palabraA = $diccionario[$indice];

    return str_split($palabraA);
}

function palabrasGuion(){
    $_SESSION['palabra']=palabra();
    $guion = "";
    for($i=0; $i<count($_SESSION['palabra']); $i++){
        $guion .= "-"; 
    }

    return $_SESSION['palabraActual'] = $guion;


}

?>