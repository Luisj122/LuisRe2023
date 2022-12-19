</div>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">

                    <!-- Nested Row within Card Body -->
                    <div class='modal fade' id='nuevoRegalo'>
                        <div class='modal-dialog'>
                            <div class='modal-content text-dark'>
                                <div class='modal-header'>
                                    <div class='modal-title'>
                                        <h1 class='h4 text-gray-900 mb-4'>Nuevo Regalo</h1>
                                    </div>
                                </div>
                                <div class='modal-body'>
                                    <div class='container-fluid'>
                                        <form method="post" class="user" action="enrutador.php">


                                            <div class="form-group">
                                                <label>Nombre:</label>
                                                <input type="text" name="nombre" class="form-control" />

                                            </div>

                                            <div class="form-group">
                                                <label>Destinatario:</label>
                                                <input type="text" name="destinatario" class="form-control" />

                                            </div>
                                            <div class="form-group ">
                                                <label>Precio:</label>
                                                <input type="number" name="precio" class="form-control" />

                                            </div>

                                            <div class="form-group">
                                                <label>Estado:</label>
                                                <select name="estado" class="form-control ">
                                                    <option value="pendiente">Pendiente</option>;
                                                    <option value="comprado">Comprado</option>;
                                                    <option value="envuelto">Envuelto</option>;
                                                    <option value="entregado">Entregado</option>;
                                                </select>
                                            </div>

                                            <div class="form-group ">
                                                <label>Año:</label>
                                                <input type="number" name="anio" class="form-control" />

                                            </div>

                                            <?php
                                            echo '<input type="hidden" name="idUsuario" value="' . unserialize($_SESSION["usuario"])->getId() . '">'
                                            ?>

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

                    <div class='modal fade' id='nuevoEnlace'>
                        <div class='modal-dialog'>
                            <div class='modal-content text-dark'>
                                <div class='modal-header'>
                                    <div class='modal-title'>
                                        <h1 class='h4 text-gray-900 mb-4'>Nuevo Regalo</h1>
                                    </div>
                                </div>
                                <div class='modal-body'>
                                    <div class='container-fluid'>
                                        <form method="post" class="user" action="enrutador.php">


                                            <div class="form-group">
                                                <label>Nombre:</label>
                                                <input type="text" name="nombre" class="form-control" />

                                            </div>

                                            <div class="form-group">
                                                <label>Enlace:</label>
                                                <input type="text" name="enlace" class="form-control" />

                                            </div>
                                            <div class="form-group ">
                                                <label>Precio:</label>
                                                <input type="number" name="precio" class="form-control" />

                                            </div>

                                            <div class="form-group">
                                                <label>Imagen:</label>
                                                <input type="text" name="imagen" class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                <label>Prioridad:</label>
                                                <select name="prioridad" class="form-control ">
                                                    <option value="baja">0</option>;
                                                    <option value="media">1</option>;
                                                    <option value="alta">2</option>;
                                                </select>
                                            </div>

                                            <?php
                                            echo '<input type="hidden" name="idRegalo" value="' . $_REQUEST["id"]. '">'
                                            ?>

                                            <input type="hidden" name="accion" value="insertarE">
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