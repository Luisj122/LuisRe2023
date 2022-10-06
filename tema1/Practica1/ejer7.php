<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<?php

    $array = array(1,2,3,4,5);

        foreach ($array as &$valor) {
            for($i=1; $i<=10; $i++){
            echo $valor . " x " , $i  . " = ". $valor * $i . "<br>";
        }
        }

        
   


?>