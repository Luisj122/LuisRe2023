<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<?php

    $num = rand(0,35);

    echo $num;

    echo "<br>";
    
    $decena = intval($num / 10);
    $unidad = ($num % 10) / 1;
    
    if ($decena == 0 && $unidad >=0) {
        switch($unidad){
            case 0:{
                echo "cero";
                break;
            }
            case 1:{
                echo "uno";
                break;
            }
            case 2:{
                echo "dos";
                break;
            }case 3:{
                echo "tres";
                break;
            }case 4:{
                echo "cuatro";
                break;
            }case 5:{
                echo "cinco";
                break;
            }case 6:{
                echo "seis";
                break;
            }case 7:{
                echo "siete";
                break;
            }case 8:{
                echo "ocho";
                break;
            }case 9:{
                echo "nueve";
                break;
            }       
        }        
    }elseif($decena == 1 && $unidad == 0){
        echo "diez";
    }elseif ($decena ==1 && $unidad == 1) {
        echo "once";
    }elseif ($decena ==1 && $unidad == 2) {
        echo "doce";
    }elseif ($decena ==1 && $unidad == 3) {
        echo "trece";
    }elseif ($decena ==1 && $unidad == 4) {
        echo "catorce";
    }elseif ($decena ==1 && $unidad == 5) {
        echo "quince";
    }elseif ($decena ==1 && $unidad == 6) {
        echo "dieciseis";
    }elseif ($decena ==1 && $unidad == 7) {
        echo "diecisiete";
    }elseif ($decena ==1 && $unidad == 8) {
        echo "dieciocho";
    }elseif ($decena ==1 && $unidad == 9) {
        echo "Diecinueve";
    }elseif ($decena ==2 && $unidad == 0) {
        echo "veinte";
    }elseif ($decena == 2 && $unidad >0) {
        switch($unidad){
            case 1:{
                echo "veinti" . "uno";
                break;
            }
            case 2:{
                echo "veinti" . "dos";
                break;
            }case 3:{
                echo "veinti" . "tres";
                break;
            }case 4:{
                echo "veinti" . "cuatro";
                break;
            }case 5:{
                echo "veinti" . "cinco";
                break;
            }case 6:{
                echo "veinti" . "seis";
                break;
            }case 7:{
                echo "veinti" . "siete";
                break;
            }case 8:{
                echo "veinti" . "ocho";
                break;
            }case 9:{
                echo "veinti" . "nueve";
                break;
            }
             
        }        
    }elseif ($decena ==3 && $unidad == 0) {
        echo "treinta";
    }elseif ($decena == 3 && $unidad >0) {
        switch($unidad){
            case 1:{
                echo "treinta " . " y " . " uno";
                break;
            }case 2:{
                echo "treinta " . " y " . " dos";
                break;
            }case 3:{
                echo "treinta " . " y " . " tres";
                break;
            }case 4:{
                echo "treinta " . " y " . " cuatro";
                break;
            }case 5:{
                echo "treinta " . " y " . " cinco";
                break;
            }
            
             
        }
    }        
    
    
?>
