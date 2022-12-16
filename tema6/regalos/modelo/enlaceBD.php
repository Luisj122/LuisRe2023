<?php

class enlaceBD
{


    public static function getEnlace($id)
    {
        $conexion = conexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT id, nombre, enlaces, precio, imagen, prioridad, idRegalo FROM enlaces Where idRegalo = ? ");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'enlace');
        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD

        $enlace = $stmt->fetchAll();


        conexionBD::cerrar();

        return $enlace;
    }

    public static function borrarEnlace($id)
    {
        $conexion = conexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("DELETE FROM enlaces WHERE id =?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'enlace');
        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD

        $regalo = $stmt->fetch();


        conexionBD::cerrar();

        return $regalo;
    }

    public static function insertarEnlace($enlace)
    {
        $conexion = conexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("INSERT INTO enlaces (nombre, enlaces, precio, imagen, prioridad, idRegalo)
            VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bindValue(1, $enlace->getNombre());
        $stmt->bindValue(2, $enlace->getEnlaces());
        $stmt->bindValue(3, $enlace->getPrecio());
        $stmt->bindValue(4, $enlace->getImagen());
        $stmt->bindValue(5, $enlace->getPrioridad());
        $stmt->bindValue(6, $enlace->getIdRegalo());
        $stmt->execute();

        conexionBD::cerrar();
    }


    public static function ordenarAscendente($id){
        $conexion = conexionBD::conectar();

        $stmt = $conexion->prepare("SELECT id, nombre, enlaces, precio, imagen, prioridad, idRegalo
            from enlaces where idRegalo = ? order by precio asc");

        $stmt->bindValue(1, $id);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'enlace');
        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD

        $enlace = $stmt->fetchAll();


        conexionBD::cerrar();

        return $enlace;
    }

    public static function ordenarDescendente($id){
        $conexion = conexionBD::conectar();

        $stmt = $conexion->prepare("SELECT id, nombre, enlaces, precio, imagen, prioridad, idRegalo
            from enlaces where idRegalo = ? order by precio desc");

        $stmt->bindValue(1, $id);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'enlace');
        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD

        $enlace = $stmt->fetchAll();


        conexionBD::cerrar();

        return $enlace;
    }
}
