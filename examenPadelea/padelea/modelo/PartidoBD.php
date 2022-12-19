<?php

    class PartidoBD {

        public static function mostrarPartidas() {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT id, fecha, hora, ciudad, lugar, cubierta, estado FROM partidas WHERE fecha > '2022/12/19' order by fecha");

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partida');
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            
            $partida = $stmt->fetchAll();

            
            conexionBD::cerrar();

            return $partida;
        }


        public static function borrarPartido($id) {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("DELETE FROM partidas WHERE id =?");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partida');
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            
            $partida = $stmt->fetch();

            
            conexionBD::cerrar();

            return $partida;
        }

        public static function buscarFecha($fecha) {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT id, fecha, hora, ciudad, lugar, cubierta, estado FROM partidas WHERE fecha = ? ");
            $stmt->bindValue(1, $fecha);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partida');
            
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            
            $partida = $stmt->fetchAll();

            
            conexionBD::cerrar();

            return $partida;

        }

        public static function buscarCiudad($ciudad) {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT id, fecha, hora, ciudad, lugar, cubierta, estado FROM partidas WHERE ciudad = ? ");
            $stmt->bindValue(1, $ciudad);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partida');
            
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            
            $partida = $stmt->fetchAll();

            
            conexionBD::cerrar();

            return $partida;

        }

        public static function insertarPartida($partida) {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("INSERT INTO partidas (fecha, hora, ciudad, lugar, cubierta, estado)
            VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bindValue(1, $partida->getFecha());
            $stmt->bindValue(2, $partida->getHora());
            $stmt->bindValue(3, $partida->getCiudad());
            $stmt->bindValue(4, $partida->getLugar());
            $stmt->bindValue(5, $partida->getCubierta());
            $stmt->bindValue(6, $partida->getEstado());
            $stmt->execute();
      
            conexionBD::cerrar();

        }

        public static function mostrarPartida($id) {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT id, fecha, hora, ciudad, lugar, cubierta, estado FROM partidas WHERE id = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partida');
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            
            $partida = $stmt->fetchAll();

            
            conexionBD::cerrar();

            return $partida;
        }

    }
