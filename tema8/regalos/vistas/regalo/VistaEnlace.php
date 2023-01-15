<?php
class VistaEnlace{


  public static function render($enlaces)
  {
    include_once("./cabecera.php");  

    echo "</div><br><br>";

    echo "<table class='table table-striped '>";
    
    echo '<a href="enrutador.php?accion=ascendente&id='.$_REQUEST["id"].'" class="btn btn-outline-primary ml-5 mb-2">ascendente</a>';
    echo '<a href="enrutador.php?accion=descendente&id='.$_REQUEST["id"].'" class="btn btn-outline-primary ml-1 mb-2">descendente</a>';

    echo "<a  type='button' data-toggle='modal' data-target='#nuevoEnlace' class='btn btn-outline-secondary    float-sm-right mr-5 mb-2  '>
          <span class='material-symbols-outlined'>
          Nuevo Enlace
          </span>
        </a>";
 
    echo '<div class="row">';
    
    echo '<form method="post" action="enrutador.php">';
    foreach ($enlaces as   $value) {
      echo '
      <div class="col-3 ml-5">
        <div class="card">
          <img src="'.$value->getImagen().'" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">'.$value->getNombre().'</h5>
              <p class="card-text">'.$value->getEnlaces().'</p>
              <p class="card-text">Precio: '.$value->getPrecio().' €</p>
              <p class="card-text">Prioridad: '.$value->getPrioridad().'</p>
            </div>
            <div class="card-body">
              <a href="enrutador.php?accion=eliminarE&id='.$value->getId().' &idRegalo=' .$value->getIdRegalo().'" class="card-link">Eliminar</a>
       
            </div>
        </div>
      </div>';
    }
    echo '</div></div>';
    echo '</form>';
   
    
    echo "</tbody>";
    echo "</table>";
    include_once("./pie.php");
  }
}

?>