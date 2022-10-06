<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<?php

    $num = [];
    

    for($i=0; $i<7; $i++){
        for($j=0; $j<7; $j++){
            if($i==$j){
                echo $num[$i][$j] = 1 . " ";
            }else{
                echo $num[$j][$j]=rand(1,9) . " " ;
            }
            
        }
        echo "<br>";
    }

    echo "<br>";
    echo "Suma de filas <br>";

    $sumFila = [];

    for($i=0; $i<7; $i++){
        
        $sumFila[$i]=array_sum($num[$i]);
    }

    foreach($sumFila as &$valor){
        echo $valor . " " ;
    }

?>