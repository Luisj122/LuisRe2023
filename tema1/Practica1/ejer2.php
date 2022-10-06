<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<?php

    $cadena1 = "Hola a todo el mundo";
    $cadena2 = "Mi nombre es Luis Jimenez";

    $cadena3 = $cadena1 . $cadena2;

    $cadena1 = $cadena1 . $cadena1 . $cadena2;

    echo "$cadena3" . "<br>";

    echo "$cadena1";
    


?>