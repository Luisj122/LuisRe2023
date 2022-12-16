<?php

    class regaloBD {

        public static function getRegalo() {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT id, nombre, destinatario, estado, anio, precio, idUsuario FROM regalos ");

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'regalo');
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            
            $regalo = $stmt->fetchAll();

            
            conexionBD::cerrar();

            return $regalo;
        }

        public static function getRegaloUsuario($id) {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT id, nombre, destinatario, estado, anio, precio, idUsuario FROM regalos Where idUsuario = ? ");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'regalo');
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            
            $regalo = $stmt->fetchAll();

            
            conexionBD::cerrar();

            return $regalo;
        }

        public static function borrarRegalo($id) {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("DELETE FROM regalos WHERE id =?");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'regalo');
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            
            $regalo = $stmt->fetch();

            
            conexionBD::cerrar();

            return $regalo;
        }

        public static function insertarRegalo($regalo) {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("INSERT INTO regalos (nombre, destinatario, precio, estado, anio, idUsuario)
            VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bindValue(1, $regalo->getNombre());
            $stmt->bindValue(2, $regalo->getDestinatario());
            $stmt->bindValue(3, $regalo->getPrecio());
            $stmt->bindValue(4, $regalo->getEstado());
            $stmt->bindValue(5, $regalo->getAnio());
            $stmt->bindValue(6, $regalo->getIdUsuario());
            $stmt->execute();
      
            conexionBD::cerrar();

        }

        public static function editarRegalo($id,$nombre,$destinatario, $precio, $estado, $anio, $idUsuario) {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("UPDATE regalos
            SET nombre = ?, destinatario = ?, precio = ?, estado = ?, anio = ?, idUsuario = ?
            WHERE id = ?");
            $stmt->bindValue(1, $nombre);
            $stmt->bindValue(2, $destinatario);
            $stmt->bindValue(3, $precio);
            $stmt->bindValue(4, $estado);
            $stmt->bindValue(5, $anio);
            $stmt->bindValue(6, $idUsuario);
            $stmt->bindValue(7, $id);
            $stmt->execute();
      
            conexionBD::cerrar();

        }

        public static function buscarAnios($anio) {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT nombre, destinatario, precio, estado, anio FROM regalos WHERE anio = ? ");
            $stmt->bindValue(1, $anio);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'regalo');
            
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            
            $prestamo = $stmt->fetchAll();

            
            conexionBD::cerrar();

            return $prestamo;

        }

        

    }
