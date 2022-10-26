<?php

session_start();
?>
<?php
include("cabecera.php");

?>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->

            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Crear un nuevo Proyecto</h1>
              </div>
              <form class="user" action="controlador.php" method="POST">

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name = "nombre" id = "nombre"  placeholder="nombre">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="fechaInicio" id = "fechaInicio"  placeholder="FechaInicio">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="fechaFinPrevisto" id="fechaFinPrevisto"  placeholder="FechaFinPrevisto">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="diasTranscurridos" id="diasTranscurridos"  placeholder="DiasTranscurridos">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="porcentajeCompletado" id="porcentajeCompletad"  placeholder="PorcentajeCompletado">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="importancia" id="importancia"  placeholder="Importancia">
                </div>
             
                <button type="submit" name="crearProyecto" class="btn btn-primary btn-user btn-block">
                  Crear Proyecto
                </button>

              </form>
              <hr>


            </div>
          </div>
  
        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>


<?php



?>

<?php

include("pie.php");

?>