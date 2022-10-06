<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<?php

    function encriptar($mensaje,$clave){

        $encriptado = "";
        foreach($mensaje as &$valor){
            $encriptado = $encriptado.chr(ord($valor)+$clave);
        }

        return $encriptado;
       
    }

    function desencriptar($mensaje,$clave){

        $desencriptado = "";
        foreach($mensaje as &$valor){
            $desencriptado = $desencriptado.chr(ord($valor)-$clave);
        }

        return $desencriptado;
       
    }

    $mensaje = "prueba encriptar";
    $array = explode(" ",$mensaje);
    
    foreach($array as &$valor){
        echo strrev($valor) . " ";
    }

    $clave = 3;

    echo "<br>";
    $encriptado = encriptar($array,$clave);
  

    echo encriptar($mensaje,$clave) . "<br>";
  

?>