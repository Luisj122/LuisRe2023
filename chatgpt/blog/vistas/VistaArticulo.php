<?php

class VistaArticulo{


  public static function render($articulo)
  {
    include_once("./cabecera.php");
        
    echo '<a href="enrutador.php?accion=Chatgpt" class="btn btn-dark fixed-top">VOLVER</a>';
    echo '<div class="row">';

        foreach ($articulo as   $value) {

          echo '
                <div class="col-6">
                <div class="card" style="width: 40rem;">
                    <img src="'.$value->getImagen().'" class="card-img-top" height="420" Width="120">
                      <div class="card-body">
                        <h5 class="card-title">'.$value->getTitulo().'</h5>
                        <p class="card-text">'.$value->getTexto().'</p>
                        <p class="card-text">'.$value->getFecha().'</p>
                      </div>
                  </div>
                </div>';


        }
        echo '</div></div>';

      include_once("./pie.php");

  }
}
