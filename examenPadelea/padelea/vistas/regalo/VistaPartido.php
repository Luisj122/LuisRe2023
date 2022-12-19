<?php

class VistaPartido{


  public static function render($partidos)
  {
    include_once("./cabecera.php");

    echo "<table class='table table-striped '>";

      echo "<div class='formu'>";
      
      echo "<form method='post' action='enrutador.php'>
              <label class='text-dark'>Fecha:&nbsp&nbsp&nbsp&nbsp </label>
                <input  type='date' name='fecha'>
                <input type='hidden' name='accion' value='fechaP'>
              <button class='btn btn-sm btn-outline-secondary' type'submit'>Buscar</button>   

              <a  type='button' data-toggle='modal' data-target='#nuevoPartido' class='btn btn-sm btn-outline-secondary float-sm-right'>
                <span class='material-symbols-outlined'>Nuevo Partido</span>
              </a>
              
            </form>";

      echo "<form method='post' action='enrutador.php'>
            <label class='text-dark'>Ciudad:&nbsp&nbsp&nbsp&nbsp </label>
              <input  type='text' name='ciudad'>
              <input type='hidden' name='accion' value='ciudadP'>
            <button class='btn btn-sm btn-outline-secondary' type'submit'>Buscar</button>
            </form>";

      echo "</div>";



    
      echo "<thead class='table-primary text-dark font-weight-bold'>";
        echo "<tr>";
        echo "<th>Fecha</th>";
        echo "<th>Hora</th>";
        echo "<th>Ciudad</th>";
        echo "<th>Lugar</th>";
        echo "<th>Cubierta</th>";
        echo "<th>Estado</th>";
        echo "<th>Accion</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody><br>";
          
        

        foreach ($partidos as   $value) {

          echo "<tr class='text-dark'>";

       

          echo "<td>" . $value->getFecha() . "</td>
                <td>" . $value->getHora() . "</td>
                <td>" . $value->getCiudad() . "</td>
                <td>" . $value->getLugar() . "</td>
                <td>" . $value->getCubierta() . "</td>";

                ?>
                <?php
                  if(strtolower($value->getEstado()) =='abierta'){
                    echo " <td class='text-success'>" . $value->getEstado() . "</td>";
                  }else{
                    echo " <td class='text-danger'>" . $value->getEstado() . "</td>";
                  }
                   
                  
                ?>
                

          <?php
          echo '<td>
                <a href="enrutador.php?accion=borrar&id=' . $value->getId() . '" type="button" class="btn btn-sm btn-outline-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </a>

                <a href="enrutador.php?accion=partidas&id=' . $value->getId() . '" type="button" class="btn btn-sm btn-outline-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                </a>
          
              </td>';

          echo "</tr>";
        }

      echo "</tbody>";
    echo "</table>";
    include_once("./pie.php");
  }
}
