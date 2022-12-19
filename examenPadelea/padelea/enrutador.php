<?php
session_start();

//AUTOLOAD
function autocarga($clase)
{
    $ruta = "./controlador/$clase.php";
    if (file_exists($ruta)) {
        include_once $ruta;
    }

    $ruta = "./modelo/$clase.php";
    if (file_exists($ruta)) {
        include_once $ruta;
    }


    $ruta = "./vistas/regalo/$clase.php";
    if (file_exists($ruta)) {
        include_once $ruta;
    }
}
spl_autoload_register("autocarga");


//Función para filtrar los campos del formulario
function filtrado($datos)
{
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

if ($_REQUEST) {
    if (isset($_REQUEST['accion'])) {


        //Inicio
        if ($_REQUEST['accion'] == "inicio") {
            ControladorLogin::mostrarLogin();
        }

        //Login
        if ($_REQUEST['accion'] == "login") {
            $email = filtrado($_REQUEST['email']);
            $password = filtrado($_REQUEST['password']);

            ControladorLogin::login($email, $password);
        }
        if ($_REQUEST['accion'] == "salir") {

            session_destroy();
            ControladorLogin::mostrarLogin();
        }

        //Mostrar Partida
        if ($_REQUEST['accion'] == "partida") {
            ControladorPartida::mostrarPartida();
        }


        //Borrar regalo
        if ($_REQUEST['accion'] == "borrar") {
            $id = filtrado($_REQUEST['id']);
            ControladorPartida::borrarPartida($id);
        }

        //buscar fecha
        if ($_REQUEST['accion'] == "fechaP") {
            $fecha = filtrado($_REQUEST["fecha"]);
            ControladorPartida::buscarFecha($fecha);
        }

        //buscar ciudad
        if ($_REQUEST['accion'] == "ciudadP") {
            $ciudad = filtrado($_REQUEST["ciudad"]);

            ControladorPartida::buscarCiudad($ciudad);
        }

        //insertar partida
        if ($_REQUEST['accion'] == "insertarP") {
            $partida["fecha"] = filtrado($_REQUEST["fecha"]);
            $partida["hora"] = filtrado($_REQUEST["hora"]);
            $partida["ciudad"] = filtrado($_REQUEST["ciudad"]);
            $partida["lugar"] = filtrado($_REQUEST["lugar"]);
            $partida["cubierta"] = filtrado($_REQUEST["cubierta"]);
            $partida["estado"] = filtrado($_REQUEST["estado"]);

            ControladorPartida::insertarPartida($partida);
        }
        //enlace
        if ($_REQUEST['accion'] == "partidas") {
            $id = filtrado($_REQUEST["id"]);

            ControladorPartida::mostrarJugadores($id);
        }
    }
}
