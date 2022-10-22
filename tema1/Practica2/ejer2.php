<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<?php

    $direccionIp = "192.168.11.200";    
    $array = str_split($direccionIp);

    foreach($array as &$valor){
        echo $valor . " : ";
    }

?>