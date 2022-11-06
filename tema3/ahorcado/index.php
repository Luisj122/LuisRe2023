<?php session_start();
//session_destroy();
include_once("lib.php");
include_once("cabecera.php");
?>

<center>
    <?php
    echo '<div  class="fondo">';


    echo "<h1>JUEGO DEL AHORCADO</h1>";

    //array de las letras 
    $boton = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "ñ", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];

    if (!isset($_SESSION['letras'])) {
        $_SESSION['palabra'] = palabra();
        $_SESSION['palabraActual'] = palabrasGuion();
        $_SESSION['letras'] = array();
        $_SESSION['cont'] = 0;
    }

    //Array de la letra pulsada 

    echo '<table>
            <tr>';
    echo "<p> Letras Pulsadas </p>";

    //Numero de letras pulsadas
    echo "<p>Letras totales: " . $_SESSION['cont'] . "</p>";

    foreach ($_SESSION['letras'] as $letra) {
        echo '<th class="text-uppercase">' . $letra . '</th>';
    }
    echo '</tr>';

    echo '</table>';
    echo "<br>";



    //Imagenes del ahoraco y boton de jugar de nuevo si el contador llega 6
    if ($_SESSION['cont'] == 1) {
        echo '<img src="img/ahorcado_5.png" alt="">';
    } else if ($_SESSION['cont'] == 2) {
        echo '<img src="img/ahorcado_4.png" alt="">';
    } else if ($_SESSION['cont'] == 3) {
        echo '<img src="img/ahorcado_3.png" alt="">';
    } else if ($_SESSION['cont'] == 4) {
        echo '<img src="img/ahorcado_2.png" alt="">';
    } else if ($_SESSION['cont'] == 5) {
        echo '<img src="img/ahorcado_1.png" alt="">';
    } else if ($_SESSION['cont'] == 6) {
        echo '<img src="img/ahorcado_0.png" alt="">' . "<br>";
        echo "<br><p class='text-danger'>Has perdido</p>";
        echo "<a class='text-decoration-none btn btn-secondary' href='controlador.php?accion=jugarN'><p class='font-weight-bold '><p class='text-white'> Jugar de nuevo</p></a>";

        $_SESSION['palabraActual']="";
        $boton = array();

    }


    //Convertir la palabra de la array a string y if si la palabra actual es igual a la palabra
    $palabra = implode("", $_SESSION['palabra']);

    if ($_SESSION['palabraActual'] == $palabra) {
        echo "<p class='text-uppercase text-danger'>Has Ganado</p>";
        echo "<p class='text-uppercase text-black'>" . $_SESSION['palabraActual'] . "</p>";
        echo "<a class='text-decoration-none btn btn-secondary' href='controlador.php?accion=jugarN'><p class='font-weight-bold text-white'>Jugar de nuevo</p></a>  ";
    } else {

        //Palabra actual a adivinar pintada por guiones
        echo "<p class='text-uppercase text-black'>" . $_SESSION['palabraActual'] . "</p>";
        echo "<br>";

        //Boton de la letras a pulsar 
        foreach ($boton as $valor) {

            echo "<a  class='text-decoration-none border border-dark border-2 btn btn-outline text-uppercase' href='controlador.php?letra=" . $valor . "'>" . $valor . "</a>  ";
        }

    }



    echo '</div>';
    ?>


    <?php
    include_once("pie.php");
    ?>
</center>