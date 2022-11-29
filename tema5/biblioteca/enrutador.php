<?php
    
    //AUTOLOAD
    function autocarga($clase){ 
        $ruta = "./controlador/$clase.php"; 
        if (file_exists($ruta)){ 
          include_once $ruta; 
        }

        $ruta = "./modelo/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }

        $ruta = "./vistas/prestamo/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }

        $ruta = "./vistas/criticas/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }

        $ruta = "./vistas/usuarios/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }
    } 
    spl_autoload_register("autocarga");


    //Función para filtrar los campos del formulario
    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    if ($_REQUEST) {
        if (isset($_REQUEST['accion'])) {


             //Inicio
             if ($_REQUEST['accion'] == "inicio") {
                controladorPrestamo::mostrarPrestamos();
            }

            //Borrar prestamo
            if ($_REQUEST['accion'] == "borrar") {
                $id = filtrado($_REQUEST['id']);
                controladorPrestamo::borrarPrestamo($id);
                controladorPrestamo::mostrarPrestamos();
            }

            //formulario prestamo
            if ($_REQUEST['accion'] == "insertar") {
               controladorPrestamo::mostrarFormularioNuevaPrestamo();   
            }

            //insertar prestamo
            if ($_REQUEST['accion'] == "insertarP") {
                $prestamo["idUsuario"]=filtrado($_REQUEST["nombre"]);
                $prestamo["idLibro"]=filtrado($_REQUEST["titulo"]);
                $prestamo["fecha_i"]=filtrado($_REQUEST["fecha_i"]);
                $prestamo["fecha_f"]=filtrado($_REQUEST["fecha_f"]);
                $prestamo["estado"]=filtrado($_REQUEST["estado"]);
    
                controladorPrestamo::insertarPrestamo($prestamo);   
            }

             //editar prestamo
            if ($_REQUEST['accion'] == "editar") {
                $id=filtrado($_REQUEST["idPrestamo"]);
                $fechaF=filtrado($_REQUEST["fecha_fin"]);
                $estado=filtrado($_REQUEST["estado"]);

    
                controladorPrestamo::editarPrestamo($id,$fechaF,$estado);   
            }

            //buscar dni
            if ($_REQUEST['accion'] == "buscarDni") {
                $dni=filtrado($_REQUEST["dni"]);
    
                controladorPrestamo::buscarDni($dni);   
            }

            //buscar dni
            if ($_REQUEST['accion'] == "buscarEstado") {
                $estado =filtrado($_REQUEST["estadoB"]);
    
                controladorPrestamo::buscarEstado($estado);   
            }

        }
    }





?>