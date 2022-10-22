<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<?php

        function encriptar($mensaje, $clave)
        {

            $encriptado = "";
            for ($i = 0; $i < strlen($mensaje); $i++) {
                $encriptado = $encriptado . chr(ord($mensaje[$i]) + $clave);
            }

            return $encriptado;
        }

        function desencriptar($mensaje, $clave)
        {

            $encriptado = "";
            for ($i = 0; $i < strlen($mensaje); $i++) {
                $encriptado = $encriptado . chr(ord($mensaje[$i]) - $clave);
            }

            return $encriptado;
        }

        $mensaje = "prueba encriptar";
        $array = explode(" ", $mensaje);
        $ms = "";
        $let = "";

        echo $mensaje . "<br>";

        foreach ($array as &$valor) {
            echo  strrev($valor) . " ";
            $ms = $ms . strrev($valor) . " ";
        }

        $clave = 3;
        $encriptado = encriptar($ms, $clave);

        echo "<br>";

        echo  $encriptado . "<br>";
        echo desencriptar($encriptado,$clave);


?>