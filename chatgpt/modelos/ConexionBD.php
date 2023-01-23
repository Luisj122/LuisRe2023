<?php

    require_once './vendor/autoload.php';
    use MongoDB\Client;

    class ConexionBD {

        private static $conexion;

        public static function conectar($bd="chatgpt") {

            try {
                //CONEXIÓN A MONGODB CLOUD ATLAS. Comentar esta línea para conectar en local.
                //$host = "mongodb+srv://admin:evhT1Hu8ZasF8llx@cluster0.qmwhh.mongodb.net/".$database."?retryWrites=true&w=majority";
                $host = "mongodb+srv://luisjimenez:5oJRftgLwWrNhu1l@cluster0.afrk872.mongodb.net/chatgpt"; //MongoDB en Docker
                self::$conexion = (new Client($host))->{$bd};
            } catch (Exception $e){
                echo $e->getMessage();
            }
            return self::$conexion;

        }

        public static function cerrar() {
            self::$conexion = null;
        }


    }

?>