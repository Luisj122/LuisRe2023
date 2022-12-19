</div>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">

                    <!-- Nested Row within Card Body -->
                    <div class='modal fade' id='nuevoPartido'>
                        <div class='modal-dialog'>
                            <div class='modal-content text-dark'>
                                <div class='modal-header'>
                                    <div class='modal-title'>
                                        <h1 class='h4 text-gray-900 mb-4'>Nueva Partida</h1>
                                    </div>
                                </div>
                                <div class='modal-body'>
                                    <div class='container-fluid'>
                                        <form method="post" class="user" action="enrutador.php">


                                            <div class="form-group">
                                                <label>Fecha:</label>
                                                <input type="date" name="fecha" class="form-control" />

                                            </div>

                                            <div class="form-group">
                                                <label>Hora:</label>
                                                <input type="text" name="hora" class="form-control" />

                                            </div>
                                            <div class="form-group ">
                                                <label>Ciudad:</label>
                                                <input type="text" name="ciudad" class="form-control" />

                                            </div>
                                            <div class="form-group ">
                                                <label>Lugar:</label>
                                                <input type="text" name="lugar" class="form-control" />

                                            </div>
                                            <div class="form-group ">
                                                <label>Cubierta:</label>
                                                <input type="radio" id="si" name="cubierta" value="Si">
                                                <label for="si">Si</label>
                                                <input type="radio" id="no" name="cubierta" value="No">
                                                <label for="no">No</label><br>

                                            </div>


                                            <input type="hidden" name="estado" value="abierta" />

                                            <input type="hidden" name="accion" value="insertarP">
                                            <button type="submit" class="btn btn-success mt-3">
                                                Insertar Regalo
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="enrutador.php?accion=salir">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="./estilos/jquery/jquery.min.js"></script>
    <script src="./estilos/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./estilos/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>



    </body>

    </html>