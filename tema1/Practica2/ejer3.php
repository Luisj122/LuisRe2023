<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<?php

    $word_list_en = array("make", "can", "like", "time", "know");
    $word_list_es = array("hacer", "puedo", "gustar", "tiempo", "saber");

    $palabra = "make";
    $traducido = "";

    for($i=0; $i<count($word_list_es); $i++){
        if($palabra==$word_list_es[$i]){
            $traducido = $word_list_en[$i];
            
        }else{
            for($j=0; $j<count($word_list_en); $j++){
                if($palabra==$word_list_en[$j]){
                    $traducido = $word_list_es[$j];
                }
            }
        }
    }

    echo $traducido;

?>