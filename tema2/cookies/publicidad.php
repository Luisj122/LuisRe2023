<?php

function desencriptar($mensaje,$clave){

    $desencriptado = "";
    for($i=0; $i < strlen($mensaje); $i++){
        $desencriptado = $desencriptado.chr(ord($mensaje[$i])-$clave);
    }

    return $desencriptado;
   
}

    echo "TE gusta: ";
    echo desencriptar($_COOKIE['servidor'],5);

?> 