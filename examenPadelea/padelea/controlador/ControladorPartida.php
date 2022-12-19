<?php
    class ControladorPartida{

        public static function mostrarPartida() {
            
            $partida = PartidoBD::mostrarPartidas();        
            VistaPartido::render($partida);
        }  

        public static function borrarPartida($id) {
            //LLamar al modelo para obtener todas las películas en un array de Pelicula
            PartidoBD::borrarPartido($id);  
            echo "<script>window.location='enrutador.php?accion=partida'</script>";       

        }
        public static function buscarFecha($fecha) {
            $fechaP = PartidoBD::buscarFecha($fecha);
            VistaPartido::render($fechaP);
     
        }

        public static function buscarCiudad($ciudad) {
            $ciudadP = PartidoBD::buscarCiudad($ciudad);
            VistaPartido::render($ciudadP);
     
        }

        public static function insertarPartida($partida) {
            $partidaN = new Partida($partida["fecha"], $partida["hora"], $partida["ciudad"], $partida["lugar"], $partida["cubierta"],
            $partida["estado"]);
            PartidoBD::insertarPartida($partidaN);
            echo "<script>window.location='enrutador.php?accion=partida'</script>"; 
      
        }

        public static function mostrarJugadores($id){
            $jugador1 = JugadorBD::jugador1();
            $partida = PartidoBD::mostrarPartida($id);

            VistaPartidaJugador::partidaJugador($partida);

        }
    }
?>