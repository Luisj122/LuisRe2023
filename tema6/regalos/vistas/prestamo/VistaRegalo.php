<?php

class VistaRegalo{


  public static function render($regalos)
  {
    include_once("./cabecera.php");

    echo "<table class='table table-striped '>";

    echo "<div class='formu'>";
    
    echo "<form method='post' action='enrutador.php'>";
      echo "<label class='text-dark'>Año:&nbsp&nbsp&nbsp&nbsp </label>";
        echo "<input  type='text' name='anio'>";
        echo "<input type='hidden' name='accion' value='buscarAnio'>";
      echo "<button class='btn btn-sm btn-outline-secondary' type'submit'>Buscar</button>";
    echo "</form>";

    echo "</div>";
 
  
    echo "<thead class='text-dark'>";
    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>Destinatario</th>";
    echo "<th>Precio</th>";
    echo "<th>Estado</th>";
    echo "<th>Año</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
       
    
    foreach ($regalos as   $value) {

      echo "<tr class='text-dark'>";


      echo '<form method="post" class="user" action="enrutador.php">';

      echo "<td> <input type='text' name='nombre' value='" . $value->getNombre() . "' /></td>";

      echo "<td> <input type='text' name='destinatario' value='" . $value->getDestinatario() . "' /></td>";

      echo "<td> <input type='text' name='precio' value='" . $value->getPrecio() . "' /></td>";

      echo "<td>
              <select name='estado' id='estado'>
                  <option value=" . $value->getEstado() . ">" . $value->getEstado() . "</option>;
                  <option value='pendiente'>Pendiente</option>;
                  <option value='comprado'>Comprado</option>;
                  <option value='envuelto'>Envuelto</option>;
                  <option value='entregado'>Entregado</option>;
              </select>
          </td>";

      echo "<td> <input type='text' name='anio' value='" . $value->getAnio() . "' /></td>";

      echo "<input type='hidden' name='idUsuario' class='form-control form-control-user' value='" . $value->getIdUsuario() ."'>";  
     
      echo "<input type='hidden' name='idRegalo' class='form-control form-control-user' value='" . $value->getId() ."'>"; 
      
 

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
      </a>
      <a href="enrutador.php?accion=enlace&id=' . $value->getId() . '" type="button" class="btn btn-sm btn-outline-secondary">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
      </svg>
              
      </a>
      
      </td></div>';

      echo "</tr>";
    }

   
    
    echo "</tbody>";
    echo "</table>";
    include_once("./pie.php");
  }
}
