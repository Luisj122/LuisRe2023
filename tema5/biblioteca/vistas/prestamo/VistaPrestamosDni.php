<?php

class VistaPrestamosDni{


  public static function renderDni($prestamosD){
    include_once("./cabecera.php");

   
    echo "<table class='table table-striped '>";
 
  
    echo "<thead class='text-dark'>";
    echo "<tr>";
    echo "<th>Id Libro</th>";
    echo "<th>Id Usuario</th>";
    echo "<th>Fecha Inicio</th>";
    echo "<th>Fecha Fin</th>";
    echo "<th>Estado</th>";
    echo "<th>Acciones</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    

    foreach ($prestamosD as   $value) {

      echo "<tr>";
      echo "<td>" . $value->getIdLibro() . "</td>";
      echo "<td>" . $value->getIdUsuario() . "</td>";
      echo "<td>" . $value->getFecha_i() . "</td>";


      echo '<form method="post" class="user" action="enrutador.php">';

      echo "<td> <input type='date' name='fecha_fin' value='" . $value->getFecha_f() . "' /></td>";

     
      echo "<td><select name='estado'>
                    <option value=" . $value->getEstado() . ">" . $value->getEstado() . "</option>;
                    <option value='activo'>activo</option>;
                    <option value='devuelto'>devuelto</option>;
                    <option value='sobrepaso1Mes'>sobrepaso1Mes</option>;
                    <option value='sobrepaso1Año'>sobrepaso1Año</option>;
                </select></td>";

              

      /* echo "<td align='center'><a href='controlador.php?accion=borrar&id=" . $value['id'] . "' class='btn btn-outline-danger'><span class='material-symbols-outlined'>
                delete
                </span></a>*/

                echo "<input type='hidden' name='idPrestamo' class='form-control form-control-user'
                id='' value='" . $value->getId() . "'>";  
          
                echo '<td><input type="hidden" name="accion" value="editar">
                <button type="submit" class="btn btn-sm btn-outline-secondary">
                    Actualizar
                </button>';
                
          
                echo '<a href="enrutador.php?accion=borrar&id=' . $value->getId() . '" type="button" class="btn btn-sm btn-outline-secondary">borrar</a></td></div>';

      echo "</tr>";
      //pintarModal($value['id']);
      // <a href='#' type='button' data-bs-toggle='modal' data-bs-target='#nuevaLocalizacion" . $value['id'] . "' class='btn btn-outline-success'><span class='material-symbols-outlined'>
      //add
      //</span></a>

    }

   
    
    echo "</tbody>";
    echo "</table>";
    echo '</form>';
    include_once("./pie.php");
  }
}
