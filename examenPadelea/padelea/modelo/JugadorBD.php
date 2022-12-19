<?php

    class JugadorBD {

        public static function jugador1() {

            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM jugadores where id = '4'");

            $stmt->execute();

            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $usuarios = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jugador');

            ConexionBD::cerrar();

            return $usuarios;
        }
        
        public static function chequearLogin($email, $password, &$usuario) {
            $conexion = conexionBD::conectar();
            
            $stmt = $conexion->prepare("SELECT * FROM jugadores WHERE email = ? AND password = ?");
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $password);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jugador');
            $usuario = $stmt->fetch();

            $filas = $stmt->rowCount();

            //Si no me devuelve ninguna fila el password es incorrecto
            if ($filas == 0) {
                return 0;
            } else {
                //Usuario existe y password correcto 
                conexionBD::cerrar();
                return 1;
            }
        }

    }
    ?>