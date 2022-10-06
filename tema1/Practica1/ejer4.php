<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<?php

    $a = 1;
    $b = 1;
    $c = 1;

    $total = (pow($b,2)-4 * $a * $c);

    if ($total<=0) {
        echo "No tiene solucion";
    }else{
        $pOperacion = sqrt($total);
        $divisor = 2 * $a;

        $suma = (-3 +   $pOperacion) / $divisor;
        $resta = (-3 - $pOperacion) / $divisor; 

        echo "La suma : " . $suma . "<br>";
        echo "La resta : " . $resta . "<br>";
  
    }

?>      