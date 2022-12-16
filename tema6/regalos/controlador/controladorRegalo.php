<?php

    class controladorRegalo {


        public static function mostrarRegalos() {
            //LLamar al modelo para obtener todas las películas en un array de Pelicula
            $regalos = regaloBD::getRegalo();

            //Llamar a una vista para pintar esas películas
            VistaRegalo::render($regalos);
        }


        public static function borrarRegalo($id) {
            //LLamar al modelo para obtener todas las películas en un array de Pelicula
            regaloBD::borrarRegalo($id);  
            echo "<script>window.location='enrutador.php?accion=regaloU'</script>";       

        }

       

        public static function insertarRegalos($regalo) {
            $regalo = new Regalo($regalo["nombre"], $regalo["destinatario"], $regalo["precio"],
            $regalo["estado"], $regalo["anio"], $regalo["usuario"]);
            regaloBD::insertarREGALO($regalo);
            echo "<script>window.location='enrutador.php?accion=regaloU'</script>";
      
        }

        public static function editarRegalo($id,$nombre,$destinatario, $precio, $estado, $anio, $idUsuario) {
            
            regaloBD::editarRegalo($id,$nombre,$destinatario, $precio, $estado, $anio, $idUsuario);
            echo "<script>window.location='enrutador.php?accion=regaloU'</script>";
            
            
        }

        public static function buscarAnio($anio) {
            
            $anioB = regaloBD::buscarAnios($anio);
            RegaloAnio::renderAnio($anioB);

            
        }

        public static function mostrarLogin(){

            VistaLogin::mostrarLogin();
        }

        public static function login($email, $password){
            $usuario = null;
            $codigo = usuarioBD::checkLogin($email,$password, $usuario);

            if ($codigo == 1) {
                echo "<script>window.location='enrutador.php?accion=error&codigo=1'</script>";
            } else {
                //Usuario correcto 
                $_SESSION['usuario'] = serialize($usuario);
                echo "<script>window.location='enrutador.php?accion=regaloU'</script>";

            }
        }

        public static function mostrarRegalosU($id) {
            
            $regalos = regaloBD::getRegaloUsuario($id);        
            VistaRegalo::render($regalos);
        }

        public static function mostrarEnlace($id) {
            
            $enlaces = enlaceBD::getEnlace($id);           
            VistaEnlace::render($enlaces);
        }

        public static function GenerarPdf($id) {
            
            GenerarPdf::GenerarPdf($id);

        }

        
    }

?>