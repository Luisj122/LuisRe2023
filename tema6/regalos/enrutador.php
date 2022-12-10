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
                controladorRegalo::mostrarLogin();
            }

            //Borrar prestamo
            if ($_REQUEST['accion'] == "borrar") {
                $id = filtrado($_REQUEST['id']);
                controladorRegalo::borrarPrestamo($id);
            }

            //formulario prestamo
            if ($_REQUEST['accion'] == "insertar") {
               controladorRegalo::mostrarFormularioNuevaPrestamo();   
            }

            //insertar prestamo
            if ($_REQUEST['accion'] == "insertarP") {
                $regalo["nombre"]=filtrado($_REQUEST["nombre"]);
                $regalo["destinatario"]=filtrado($_REQUEST["destinatario"]);
                $regalo["precio"]=filtrado($_REQUEST["precio"]);
                $regalo["estado"]=filtrado($_REQUEST["estado"]);
                $regalo["anio"]=filtrado($_REQUEST["anio"]);
                $regalo["usuario"]=filtrado($_REQUEST["usuario"]);
    
                controladorRegalo::insertarRegalos($regalo);   
            }

             //editar prestamo
            if ($_REQUEST['accion'] == "editar") {
                $id=filtrado($_REQUEST["idRegalo"]);
                $nombre=filtrado($_REQUEST["nombre"]);
                $destinatario=filtrado($_REQUEST["destinatario"]);
                $precio=filtrado($_REQUEST["precio"]); 
                $estado=filtrado($_REQUEST["estado"]);
                $anio=filtrado($_REQUEST["anio"]);
                $idUsuario=filtrado($_REQUEST["idUsuario"]);

    
                controladorRegalo::editarPrestamo($id,$nombre,$destinatario, $precio, $estado, $anio, $idUsuario);   
            }

            //buscar año
            if ($_REQUEST['accion'] == "buscarAnio") {
                $anio=filtrado($_REQUEST["anio"]);
    
                controladorRegalo::buscarAnio($anio);   
            }


        }
    }





?>