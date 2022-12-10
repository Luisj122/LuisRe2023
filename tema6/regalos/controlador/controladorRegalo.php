<?php

    class controladorRegalo {


        public static function mostrarRegalos() {
            //LLamar al modelo para obtener todas las películas en un array de Pelicula
            $regalos = regaloBD::getRegalo();

            //Llamar a una vista para pintar esas películas
            VistaRegalo::render($regalos);
        }


        public static function borrarPrestamo($id) {
            //LLamar al modelo para obtener todas las películas en un array de Pelicula
            regaloBD::borrarRegalo($id);  
            echo '<script>window.location="'."index.php".'"</script>';       

        }

        public static function mostrarFormularioNuevaPrestamo() {
            $usuarios = usuarioBD::getUsuarios();
            NuevoRegalo::render($usuarios);
        }

        public static function insertarRegalos($regalo) {
            $regalo = new Regalo($regalo["nombre"], $regalo["destinatario"], $regalo["precio"],
            $regalo["estado"], $regalo["anio"], $regalo["usuario"]);
            regaloBD::insertarREGALO($regalo);
            echo '<script>window.location="'."index.php".'"</script>';
      
        }

        public static function editarPrestamo($id,$nombre,$destinatario, $precio, $estado, $anio, $idUsuario) {
            
            regaloBD::editarRegalo($id,$nombre,$destinatario, $precio, $estado, $anio, $idUsuario);
            echo '<script>window.location="'."index.php".'"</script>';
            
            
        }

        public static function buscarAnio($anio) {
            
            $anioB = regaloBD::buscarAnios($anio);
            RegaloAnio::renderAnio($anioB);

            
        }

        public static function mostrarLogin(){

            VistaLogin::mostrarLogin();
        }
        
    }

?>