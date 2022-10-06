<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<?php

    $empresas = array("Cosentino", "Garciden", "Deretil", "Makito", "Globomatik");

    $convertido = "";

    function convierteCliente($nombre, $opcion){
        
        for($i=0; $i<count($nombre); $i++){
            if($opcion == "L"){
                echo $convertido = strtolower($nombre[$i]) . " ";
            }elseif ($opcion == "U") {
                echo $convertido = strtoupper($nombre[$i]) . " ";
            }
        }
        
    }

    $opcion = "L";

    echo convierteCliente($empresas,$opcion);
?>