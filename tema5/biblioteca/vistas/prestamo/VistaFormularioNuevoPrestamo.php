<?php

class VistaFormularioNuevoPrestamo{


  public static function render($libros, $usuarios){
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
                            <label >Titulo:</label>
                            <select name="titulo" class="form-control">';
                            foreach ($libros as $libro){
                                echo '
                                <option value='.$libro->getId().'>'.$libro->getTitulo().'</option>';
                            }
                            echo '
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Nombre:</label>
                            <select name="nombre" class="form-control ">';
                            foreach ($usuarios as $usuario){
                                echo '
                                <option value='.$usuario->getId().'>'.$usuario->getNombre().'</option>';
                            }
                            echo '</select>
                        </div>';

                        echo '<div class="form-group">
                            <label >Fecha Inicio:</label>
                            <input type="date" name="fecha_i" class="form-control"/>
                            
                        </div>';
                        echo '<div class="form-group ">
                            <label >Fecha Fin:</label>
                            <input type="date" name="fecha_f" class="form-control" />
                            
                        </div>';

                        echo '<div class="form-group">
                            <label >Estado:</label>
                            <select name="estado" class="form-control ">
                                <option value="activo">activo</option>;
                                <option value="devuelto">devuelto</option>;
                                <option value="sobrepaso1Mes">sobrepaso1Mes</option>;
                                <option value="sobrepaso1Año">sobrepaso1Año</option>;
                            </select>
                        </div>';

                        
                        echo'<input type="hidden" name="accion" value="insertarP">
                        <button type="submit" class="btn btn-success mt-3">
                            Insertar prestamo
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
