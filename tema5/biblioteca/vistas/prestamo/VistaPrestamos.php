<?php

class VistaPrestamos{


  public static function render($prestamos)
  {
    include_once("./cabecera.php");

    echo "<table class='table table-striped '>";

    echo "<div class='formu'>";
        echo "<form method='post' action='enrutador.php'>";
            echo "<labe class='text-dark '>Estado: </label>";
              echo "<select name='estadoB'>
                      <option value=''></option>;
                      <option value='activo'>activo</option>;
                      <option value='devuelto'>devuelto</option>;
                      <option value='sobrepaso1Mes'>sobrepaso1Mes</option>;
                      <option value='sobrepaso1Año'>sobrepaso1Año</option>;
                    </select>";
            echo "<input type='hidden' name='accion' value='buscarEstado'>";
        echo "<button class='btn btn-sm btn-outline-secondary ' type'submit'>Buscar</button>";
    echo "</form>";

    
    echo "<form method='post' action='enrutador.php'>";
      echo "<label class='text-dark'>DNI:&nbsp&nbsp&nbsp&nbsp </label>";
        echo "<input  type='text' name='dni'>";
        echo "<input type='hidden' name='accion' value='buscarDni'>";
      echo "<button class='btn btn-sm btn-outline-secondary' type'submit'>Buscar</button>";
    echo "</form>";

    echo "</div>";
 
  
    echo "<thead class='text-dark'>";
    echo "<tr>";
    echo "<th>Id Libro</th>";
    echo "<th>Id Usuario</th>";
    echo "<th>Dni</th>";
    echo "<th>Fecha Inicio</th>";
    echo "<th>Fecha Fin</th>";
    echo "<th>Estado</th>";
    echo "<th>Acciones</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
       
    
    foreach ($prestamos as   $value) {

      echo "<tr class='text-dark'>";
      echo "<td>" . $value->getIdLibro() . "</td>";
      echo "<td>" . $value->getIdUsuario() . "</td>";
      echo "<td>" . $value->dni . "</td>";
      echo "<td>" . $value->getFecha_i() . "</td>";


      echo '<form method="post" class="user" action="enrutador.php">';

      echo "<td> <input type='date' name='fecha_fin' value='" . $value->getFecha_f() . "' /></td>";

     
      echo "<td>
                <select name='estado' id='estado'>
                    <option value=" . $value->getEstado() . ">" . $value->getEstado() . "</option>;
                    <option value='activo'>activo</option>;
                    <option value='devuelto'>devuelto</option>;
                    <option value='sobrepaso1Mes'>sobrepaso1Mes</option>;
                    <option value='sobrepaso1Año'>sobrepaso1Año</option>;
                </select>
            </td>";

        echo "<input type='hidden' name='idPrestamo' class='form-control form-control-user' value='" . $value->getId() ."'>";  

      echo '<td>
              <input type="hidden" name="accion" value="editar">
                <button type="submit" class="btn btn-sm btn-outline-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
              </svg>
              </button>';
              echo '</form>';
      
      echo '<a href="enrutador.php?accion=borrar&id=' . $value->getId() . '" type="button" class="btn btn-sm btn-outline-secondary">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
      </a></td></div>';

      echo "</tr>";
    }

   
    
    echo "</tbody>";
    echo "</table>";
    include_once("./pie.php");
  }
}
?>