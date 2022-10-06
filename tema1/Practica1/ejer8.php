<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<?php

    $loteria =array();

    for($i=0; $i<6; $i++){
        $num=rand(1,49);
        if (in_array($num, $loteria)!=true) {
            array_push($loteria, $num);
            echo $num . " ";
        }

    }

    
   

?>