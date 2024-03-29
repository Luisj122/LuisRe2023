<?php
session_start();
    
    //AUTOLOAD
    function autocarga($clase){ 
        $ruta = "./admin/controladores/$clase.php"; 
        if (file_exists($ruta)){ 
          include_once $ruta; 
        }

        $ruta = "./admin/modelos/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }


        $ruta = "./admin/vistas/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }

        $ruta = "./blog/controladores/$clase.php"; 
        if (file_exists($ruta)){ 
          include_once $ruta; 
        }

        $ruta = "./blog/modelos/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }


        $ruta = "./blog/vistas/$clase.php"; 
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
                controladorChat::mostrarLogin();
            }

            //Login
            if($_REQUEST['accion'] == "login") {
                $email = filtrado($_REQUEST['email']);
                $password = filtrado($_REQUEST['password']);

                controladorChat::login($email, $password);
            }
            
            if($_REQUEST['accion'] == "Chatgpt") {
            
                controladorChat::texto();
            }

            if($_REQUEST['accion'] == "verArticulo") {
                $articulo = filtrado($_REQUEST['articulo']); 
                controladorChat::renderArticulo($articulo);
            }

            if($_REQUEST['accion'] == "guardar"){
                $articulo["id"] = null;
                $articulo["titulo"] = filtrado($_REQUEST["titulo"]);
                $articulo["imagen"] = filtrado($_REQUEST["imagen"]);
                $articulo["texto"] = filtrado($_REQUEST["texto"]);
                $articulo["fecha"] = date('d/m/y');

                ControladorArticulo::guardar($articulo);
            }

            if($_REQUEST['accion'] == "verTodo"){
                ControladorArticulo::verTodo();
            }
        }
    }





?>