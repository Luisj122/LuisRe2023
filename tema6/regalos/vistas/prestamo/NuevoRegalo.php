<?php

class NuevoRegalo{


  public static function render($usuario){
    include_once("./cabecera.php");

    echo '<body class="bg-gradient-primary">

    <div class="container">
  
      <!-- Outer Row -->
      <div class="row justify-content-center">
  
        <div class="col-xl-10 col-lg-12 col-md-9">
  
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
  
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Nuevo Prestamo</h1>
                </div>


                <form method="post" class="user" action="enrutador.php">

                        <div class="form-group">
                            <label >Usuario:</label>
                            <select name="usuario" class="form-control">';
                            foreach ($usuario as $value){
                                echo '
                                <option value='.$value->getId().'>'.$value->getNombre().'</option>';

                                
                            }
                            echo '
                            </select>
                        </div>';

                        echo '<div class="form-group">
                            <label >Nombre:</label>
                            <input type="text" name="nombre" class="form-control"/>
                            
                        </div>';

                        echo '<div class="form-group">
                            <label >Destinatario:</label>
                            <input type="text" name="destinatario" class="form-control"/>
                            
                        </div>';
                        echo '<div class="form-group ">
                            <label >Precio:</label>
                            <input type="number" name="precio" class="form-control" />
                            
                        </div>';

                        echo '<div class="form-group">
                            <label >Estado:</label>
                            <select name="estado" class="form-control ">
                                <option value="pendiente">Pendiente</option>;
                                <option value="comprado">Comprado</option>;
                                <option value="envuelto">Envuelto</option>;
                                <option value="entregado">Entregado</option>;
                            </select>
                        </div>';

                        echo '<div class="form-group ">
                            <label >Año:</label>
                            <input type="number" name="anio" class="form-control" />
                            
                        </div>';
  
                        
                        echo'<input type="hidden" name="accion" value="insertarP">
                        <button type="submit" class="btn btn-success mt-3">
                            Insertar Regalo
                        </button>
                    </form>
                <hr>
              </div>
            </div>
    
          </div>
  
        </div>
  
      </div>
    </div>
    
  
  </body>';
        

    include_once("./pie.php");
  }
}
?>
