<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<?php

    $num = array(
        "uno"=>"one",
        "dos"=>"two",
        "tres"=>"three",
        "cuatro"=>"four",
        "cinco"=>"five",
        "seis"=>"six",
        "siete"=>"seven",
        "ocho"=>"eight",
        "nueve"=>"nine",
        "diez"=>"ten");

      
        $n = "nueve";
        $trad = "";
            
        foreach(array_keys($num) as &$valor){

            if($valor==$n){
                
                $trad = $valor;

            }
        }
        
        if($trad==$n){
            echo $num[$trad];    
        }else{
            echo "Esa palabra no existe";
        }

        echo "<br>";

       ksort($num);

        foreach(array_keys($num) as &$va){
            echo "<br>" .  $va;
        }
        
        
?>