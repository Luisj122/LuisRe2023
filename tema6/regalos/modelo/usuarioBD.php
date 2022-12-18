<?php

    class usuarioBD {

        public static function getUsuarios() {

            $conexion = ConexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM usuarios");

            $stmt->execute();

            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $usuarios = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'usuario');

            ConexionBD::cerrar();

            return $usuarios;
        }
        
        public static function chequearLogin($email, $password, &$usuario) {
            $conexion = ConexionBD::conectar();
            
            $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = ? AND password = ?");
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $password);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario');
            $usuario = $stmt->fetch();

            $filas = $stmt->rowCount();

            //Si no me devuelve ninguna fila el password es incorrecto
            if ($filas == 0) {
                return 0;
            } else {
                //Usuario existe y password correcto 
                ConexionBD::cerrar();
                return 2;
            }
        }

    }
    ?>