<?php

    class ChatBD{
       public static function guardar($articulo) {
                $conexion = ConexionBD::conectar();
    
                //Hacer el autoincrement
                //Ordeno por id, y me quedo con el mayor
                $articuloMayor = $conexion->articulos->findOne(
                    [],
                    [
                        'sort' => ['id' => -1],
                    ]);
                if (isset($articuloMayor))
                    $idValue = $articuloMayor['id'];
                else
                    $idValue = 0;
    
    
                //Collección 'articulos'
                $insertOneResult = $conexion->articulos->insertOne([
                    'id' => intVal($idValue + 1),
                    'titulo' => $articulo->getTitulo(),
                    'texto' => $articulo->getTexto(),
                    'imagen' => $articulo->getImagen(),
                    'fecha' => $articulo->getFecha()
                   
                ]);
    
                ConexionBD::cerrar();
        }

        public static function verTodo() {
            $conexion = ConexionBD::conectar();
        
            $coleccion = $conexion->articulos;

            $cursor = $coleccion->find();

           
            $arrayArticulos = array();
            foreach($cursor as $articulo) {
                $articulo_Obj = new Articulo($articulo['id'],$articulo['titulo'],$articulo['imagen'],$articulo['texto'],$articulo['fecha']) ;        
               array_push($arrayArticulos, $articulo_Obj);
            }

            ConexionBD::cerrar();

            return $arrayArticulos;
        }
    }

?>