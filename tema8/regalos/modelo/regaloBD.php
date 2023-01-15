<?php


    class regaloBD {


        public static function getRegaloUsuario($id) {
            $conexion = ConexionBD::conectar();

            $coleccion = $conexion->regalos;

            $regalos = $coleccion->find(["idUsuario"=>$id]);

            //Crear los objetos para devolverlos (MVC), Mongo me devuelve array asociativo
            $arrRegalo = array();
            foreach($regalos as $regalo) {
               $regalo_OBJ = new Regalo($regalo['id'], $regalo['nombre'],$regalo['destinatario'],$regalo['precio'],$regalo['estado'],$regalo['anio'],$regalo['idUsuario']);
               array_push($arrRegalo, $regalo_OBJ);
            }

            ConexionBD::cerrar();
            return $arrRegalo;
        }

        public static function borrarRegalo($id) {
            $conexion = ConexionBD::conectar();

            $coleccion = $conexion->regalos;

            $cursor = $coleccion->deleteOne(["id"=>$id]);           
            

            ConexionBD::cerrar();
          
        }


        public static function insertarRegalo($regalo) {
            $conexion = ConexionBD::conectar();

            //Hacer el autoincrement
            //Ordeno por id, y me quedo con el mayor
            $regaloMayor = $conexion->regalos->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]);
            if (isset($regaloMayor))
                $idValue = $regaloMayor['id'];
            else
                $idValue = 0;

                 //Collección 'usuarios'
            $conexion->regalos->insertOne([
                'id' => intval($idValue + 1),
                'nombre' => $regalo->getNombre(),
                'destinatario' => $regalo->getDestinatario(),
                'precio' => $regalo->getPrecio(),
                'estado' => $regalo->getEstado(),
                'anio' => $regalo->getAnio(),
                'idUsuario' => $regalo->getIdUsuario()

                
            ]);

            

            ConexionBD::cerrar();
        }

        public static function editarRegalo($id,$nombre,$destinatario, $precio, $estado, $anio, $idUsuario) {
            $conexion = ConexionBD::conectar();

            $coleccion = $conexion->regalos;

            $coleccion->replaceOne(["id"=>intVal($id)], ["id"=>intVal($id), "nombre"=>$nombre, "destinatario"=>$destinatario, "precio"=>$precio, "estado"=>$estado, "anio"=>$anio, "idUsuario"=>$idUsuario]);           
            

            ConexionBD::cerrar();

        }

        public static function buscarAnios($anio) {

            $conexion = ConexionBD::conectar();

            $coleccion = $conexion->regalos;

            $regalos = $coleccion->find(["anio"=>$anio]);  

            
            $arrRegalo = array();
            foreach($regalos as $regalo) {
               $regalo_OBJ = new Regalo($regalo['id'], $regalo['nombre'],$regalo['destinatario'],$regalo['precio'],$regalo['estado'],$regalo['anio'],$regalo['idUsuario']);
               array_push($arrRegalo, $regalo_OBJ);
            }

            ConexionBD::cerrar();
            return $arrRegalo;

        

        }

        

    }
