<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<?php

    function encriptar($mensaje,$clave){

        $encriptado = "";
        for($i=0; $i < strlen($mensaje); $i++){
            $encriptado = $encriptado.chr(ord($mensaje[$i])+$clave);
        }

        return $encriptado;
       
    }

    function desencriptar($mensaje,$clave){

        $desencriptado = "";
        for($i=0; $i < strlen($mensaje); $i++){
            $desencriptado = $desencriptado.chr(ord($mensaje[$i])-$clave);
        }

        return $desencriptado;
       
    }

    $mensaje = "prueba encriptado";
    $clave = 3;
    $encriptado = encriptar($mensaje,$clave);
  

    echo encriptar($mensaje,$clave) . "<br>";
    echo desencriptar($encriptado,$clave);

?>