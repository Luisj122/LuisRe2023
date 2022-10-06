<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<?php

    
    $num = [];
    $res =0;
    $impar =0;

    for($i=0; $i<5; $i++){
        array_push($num, rand(0,100));
        
            if ($num[$i]%2==0) {         
                $res += $num[$i];
            }else{
                echo $num[$i] . " ";
            }
    }

    echo "<br>";
    echo " Suma : " . $res/count($num);


?>