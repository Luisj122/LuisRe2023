<?php

class enlaceBD
{


    public static function getEnlace($id)
    {
        $conexion = ConexionBD::conectar();

        $coleccion = $conexion->enlaces;

        $cursor = $coleccion->find(["idRegalo" => $id]);

        //Crear los objetos para devolverlos (MVC), Mongo me devuelve array asociativo
        $enlaces = array();
        foreach ($cursor as $enlace) {
            $enlaceOBJ = new Enlace($enlace['id'], $enlace['nombre'], $enlace['enlaces'], $enlace['precio'], $enlace['imagen'], $enlace['prioridad'], $enlace['idRegalo']);
            array_push($enlaces, $enlaceOBJ);
        }

        ConexionBD::cerrar();

        return $enlaces;
    }

    public static function borrarEnlace($id)
    {
        $conexion = ConexionBD::conectar();

        $coleccion = $conexion->enlaces;

        $cursor = $coleccion->deleteOne(["id" => intVal($id)]);

        ConexionBD::cerrar();
    }

    public static function insertarEnlace($enlace)
    {

        $conexion = ConexionBD::conectar();

        //Hacer el autoincrement
        //Ordeno por id, y me quedo con el mayor
        $regaloMayor = $conexion->enlaces->findOne(
            [],
            [
                'sort' => ['id' => -1],
            ]
        );
        if (isset($regaloMayor))
            $idValue = $regaloMayor['id'];
        else
            $idValue = 0;

        //Collección 'usuarios'
        $conexion->enlaces->insertOne([
            'id' => intVal($idValue + 1),
            'nombre' => $enlace->getNombre(),
            'enlaces' => $enlace->getEnlaces(),
            'precio' => $enlace->getPrecio(),
            'imagen' => $enlace->getImagen(),
            'prioridad' => $enlace->getPrioridad(),
            'idRegalo' => $enlace->getIdRegalo()


        ]);


        ConexionBD::cerrar();
    }


    public static function ordenarAscendente($id)
    {
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

    public static function ordenarDescendente($id)
    {
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
