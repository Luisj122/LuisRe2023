<?php session_start();

//session_destroy();
?>

  <?php
  include("cabecera.php");
  ?>

  <?php



  $proyectos = array(
    array(
      "id" => 1, "nombre" => "Proyecto 1", "fechaInicio" => "16/10/2022", "fechaFinPrevisto" => "20/10/2022",
      "diasTranscurridos" => "12", "porcentajeCompletado" => "10", "importancia" => 5
    ),
    array(
      "id" => 2, "nombre" => "Proyecto 1", "fechaInicio" => "26/10/2022", "fechaFinPrevisto" => "30/10/2022",
      "diasTranscurridos" => "13", "porcentajeCompletado" => "30", "importancia" => 5
    )
  );

                if (!isset($_SESSION['proyectos']))
                  $_SESSION['proyectos'] = $proyectos;

                echo "<table class='table'>";
                echo "<thead>";
                echo "<tr>";
                echo "<td> Nombre </td>";
                echo "<td> Fecha Inicio </td>";
                echo "<td> Fecha Fin Previsto </td>";
                echo "<td> Dias Transcurridos </td>";
                echo "<td> Porcentaje Completado </td>";
                echo "<td> Importancia </td>";
                echo "</tr>";
                echo "</thead>";

                echo "<tbody>";

                foreach ($_SESSION['proyectos'] as  $clave => $valor) {
                  echo "<tr>";
                  echo "<td>" . $valor["nombre"] . "</td>";
                  echo "<td>" . $valor["fechaInicio"] . "</td>";
                  echo "<td>" . $valor["fechaFinPrevisto"] . "</td>";
                  echo "<td>" . $valor["diasTranscurridos"] . "</td>";
                  echo "<td>" . $valor["porcentajeCompletado"] . "</td>";
                  echo "<td>" . $valor["importancia"] . " </td>";
                  echo "<td> <a href='controlador.php?accion=borrarProyecto&id=" . $clave . "' class='btn btn-primary'>Borrar</a> </td>";
                  
                  echo "<td> <a href='controlador.php?accion=verInfo&id=" . $clave . "' class='btn btn-primary'>Info</a> </td>";
                  echo "</tr>";
                }
                echo "</tbody>";

                echo "</table>";


  ?>

  <?php

  include("pie.php");

  ?>