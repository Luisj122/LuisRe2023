<?php
session_start();
    
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

        $ruta = "./usuario/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }

        $ruta = "./vistas/regalo/$clase.php"; 
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

            //Login
            if($_REQUEST['accion'] == "login") {
                $email = filtrado($_REQUEST['email']);
                $password = filtrado($_REQUEST['password']);

                controladorRegalo::login($email, $password);
            }

            //regalo
            if($_REQUEST['accion'] == "regaloU"){
                $id = unserialize($_SESSION['usuario'])->getId();
                controladorRegalo::mostrarRegalosU($id);
            }

            //generarPDF
            if($_REQUEST['accion'] == "generarPDF"){
                $id = unserialize($_SESSION['usuario'])->getId();
                controladorRegalo::GenerarPdf($id);
            }

            //Borrar regalo
            if ($_REQUEST['accion'] == "borrar") {
                $id = filtrado($_REQUEST['id']);
                controladorRegalo::borrarRegalo($id);
            }


            //insertar regalo
            if ($_REQUEST['accion'] == "insertarP") {
                $regalo["nombre"]=filtrado($_REQUEST["nombre"]);
                $regalo["destinatario"]=filtrado($_REQUEST["destinatario"]);
                $regalo["precio"]=filtrado($_REQUEST["precio"]);
                $regalo["estado"]=filtrado($_REQUEST["estado"]);
                $regalo["anio"]=filtrado($_REQUEST["anio"]);
                $regalo["usuario"]= filtrado($_REQUEST["idUsuario"]);
    
                controladorRegalo::insertarRegalos($regalo);   
            }

            //insertar enlace
            if ($_REQUEST['accion'] == "insertarE") {
                $enlace["nombre"]=filtrado($_REQUEST["nombre"]);
                $enlace["enlace"]=filtrado($_REQUEST["enlace"]);
                $enlace["precio"]=filtrado($_REQUEST["precio"]);
                $enlace["imagen"]=filtrado($_REQUEST["imagen"]);
                $enlace["prioridad"]=filtrado($_REQUEST["prioridad"]);
                $enlace["regalo"]= filtrado($_REQUEST["idRegalo"]);
    
                controladorEnlace::insertarEnlace($enlace);   
      


            }

             //editar regalo
            if ($_REQUEST['accion'] == "editar") {
                $id=filtrado($_REQUEST["idRegalo"]);
                $nombre=filtrado($_REQUEST["nombre"]);
                $destinatario=filtrado($_REQUEST["destinatario"]);
                $precio=filtrado($_REQUEST["precio"]); 
                $estado=filtrado($_REQUEST["estado"]);
                $anio=filtrado($_REQUEST["anio"]);
                $idUsuario=filtrado($_REQUEST["idUsuario"]);

    
                controladorRegalo::editarRegalo($id,$nombre,$destinatario, $precio, $estado, $anio, $idUsuario);   
            }

            //buscar año
            if ($_REQUEST['accion'] == "buscarAnio") {
                $anio=filtrado($_REQUEST["anio"]);
    
                controladorRegalo::buscarAnio($anio);   
            }

            //enlace
            if ($_REQUEST['accion'] == "enlace") {
                $id=filtrado($_REQUEST["id"]);
    
                controladorRegalo::mostrarEnlace($id);   
            }

            //enlace
            if ($_REQUEST['accion'] == "enlaceR") {
                $id=filtrado($_REQUEST["idRegalo"]);
    
                controladorRegalo::mostrarEnlace($id);  

            }

            //borrar enlace
            if ($_REQUEST['accion'] == "eliminarE") {
                $id=filtrado($_REQUEST["id"]);
                $idR=filtrado($_REQUEST["idRegalo"]);
                controladorEnlace::eliminarEnlace($id, $idR);   
                                
            }

            //enlace ascendente
            if ($_REQUEST['accion'] == "ascendente") {  
                                
                $idR=filtrado($_REQUEST["id"]);
                controladorEnlace::ordenarAscendente($idR); 
        
            }

            //enlace descendente
            if ($_REQUEST['accion'] == "descendente") {  
                                
                $idR=filtrado($_REQUEST["id"]);
                controladorEnlace::ordenarDescendente($idR); 
          
            }

        }
    }





?>