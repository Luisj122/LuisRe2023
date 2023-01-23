        <?php

        require_once '../vendor/autoload.php';

        use MongoDB\Client;

        class ConexionBD
        {
            private static $conexion;

            public static function conectar($bd = "regaloNavidad", $usuario = "root", $password = "toor", $host = "mariadb")
            {

                try {
                    //LOCALHOST
                    //$host = "mongodb+srv://admin:evhT1Hu8ZasF8llx@cluster0.afrk872.mongodb.net/?retryWrites=true&w=majority";
                    $host = "mongodb://root:toor@54.164.95.76:27017/"; //MongoDB en Docker
                    self::$conexion = (new Client($host))->{$bd};
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    echo self::$conexion->errorInfo();
                }

                return self::$conexion;
            }

            public static function cerrar()
            {
                self::$conexion = null;
            }
        }

        ?>