<?php

    class prestamoBD {

        public static function getPrestamo() {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT prestamos.id, prestamos.idLibro, prestamos.idUsuario, prestamos.fecha_i, prestamos.fecha_f, prestamos.estado, usuarios.nombre FROM prestamos join usuarios join libros WHERE prestamos.idUsuario = usuarios.id and libros.id = prestamos.idLibro");

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prestamo');
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            
            $prestamo = $stmt->fetchAll();

            
            conexionBD::cerrar();

            return $prestamo;
        }

        public static function borrarPrestamos($id) {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("DELETE FROM prestamos WHERE id =?");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prestamo');
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            
            $prestamo = $stmt->fetch();

            
            conexionBD::cerrar();

            return $prestamo;
        }

        public static function insertarPrestamos($prestamo) {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("INSERT INTO prestamos (idLibro, idUsuario, fecha_i, fecha_f, estado)
            VALUES (?, ?, ?, ?, ?)");
            $stmt->bindValue(1, $prestamo->getIdLibro());
            $stmt->bindValue(2, $prestamo->getIdUsuario());
            $stmt->bindValue(3, $prestamo->getFecha_i());
            $stmt->bindValue(4, $prestamo->getFecha_f());
            $stmt->bindValue(5, $prestamo->getEstado());
            $stmt->execute();
      
            conexionBD::cerrar();

        }

        public static function editarPrestamos($id,$fechaF,$estado) {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("UPDATE prestamos
            SET fecha_f = ?, estado = ?
            WHERE id = ?");
            $stmt->bindValue(1, $fechaF);
            $stmt->bindValue(2, $estado);
            $stmt->bindValue(3, $id);
            $stmt->execute();
      
            conexionBD::cerrar();

        }

        public static function buscarPrestamos($dni) {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT prestamos.id, prestamos.idLibro, prestamos.idUsuario, prestamos.fecha_i, prestamos.fecha_f, prestamos.estado, usuarios.nombre FROM prestamos join usuarios join libros WHERE prestamos.idUsuario = usuarios.id and libros.id = prestamos.idLibro and usuarios.dni =? ");
            $stmt->bindValue(1, $dni);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prestamo');
            
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            
            $prestamo = $stmt->fetchAll();

            
            conexionBD::cerrar();

            return $prestamo;

        }


        public static function buscarEstado($estado) {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT prestamos.id, prestamos.idLibro, prestamos.idUsuario, prestamos.fecha_i, prestamos.fecha_f, prestamos.estado, usuarios.nombre FROM prestamos join usuarios join libros WHERE prestamos.idUsuario = usuarios.id and libros.id = prestamos.idLibro and prestamos.estado =? ");
            $stmt->bindValue(1, $estado);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prestamo');
            
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            
            $prestamo = $stmt->fetchAll();

            
            conexionBD::cerrar();

            return $prestamo;

        }

    }
