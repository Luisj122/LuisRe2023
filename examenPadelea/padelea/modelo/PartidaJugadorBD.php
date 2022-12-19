<?php

    class PartidaJugadorBD {

        public static function mostrarPartidas() {
            $conexion = conexionBD::conectar();

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT partidas.fecha, hora, ciudad, lugar, cubierta, estado FROM partidas join jugadores join partidaJugador where partidaJugador.idJugador = jugador.id and partidaJugador.idPartida = partidas.id'");

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partida');
            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            
            $partida = $stmt->fetchAll();

            
            conexionBD::cerrar();

            return $partida;
        }

        

    }
