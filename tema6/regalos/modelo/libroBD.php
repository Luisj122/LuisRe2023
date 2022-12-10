<?php

    class libroBD {

        public static function getLibros() {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM libros");

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'libro');
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            
            $libros = $stmt->fetchAll();

            
            conexionBD::cerrar();

            return $libros;
        }

    }
?>