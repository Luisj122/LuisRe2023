<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<?php

    $num = intval(substr("79759156D", 0,-1));

    $resto = $num % 23;
    echo $num . "<br>" . "Resto: " .$resto;
    echo "<br>" . "Letra:   ";

    switch($resto){
        case 0:{
            echo "T";
            break;
        }case 1:{
            echo "R";
            break;
        }case 2:{
            echo "W";
            break;
        }case 3:{
            echo "A";
            break;
        }case 4:{
            echo "G";
            break;
        }case 5:{
            echo "M";
            break;
        }case 6:{
            echo "Y";
            break;
        }case 7:{
            echo "F";
            break;
        }case 8:{
            echo "P";
            break;
        }case 9:{
            echo "D";
            break;
        }case 10:{
            echo "X";
            break;
        }case 11:{
            echo "B";
            break;
        }case 12:{
            echo "N";
            break;
        }case 13:{
            echo "J";
            break;
        }case 14:{
            echo "Z";
            break;
        }case 15:{
            echo "S";
            break;
        }case 16:{
            echo "Q";
            break;
        }case 17:{
            echo "V";
            break;
        }case 18:{
            echo "H";
            break;
        }case 19:{
            echo "L";
            break;
        }case 20:{
            echo "C";
            break;
        }case 21:{
            echo "K";
            break;
        }case 22:{
            echo "E";
            break;
        }

    }



?>