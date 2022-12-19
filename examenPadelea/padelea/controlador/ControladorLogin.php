<?php
    class ControladorLogin{
        public static function mostrarLogin(){

            VistaLogin::mostrarLogin();
        }

        public static function login($email, $password){
            $usuario = null;
            $codigo = JugadorBD::chequearLogin($email,$password, $usuario);

            if ($codigo == 1) {
                $_SESSION['usuario'] = serialize($usuario);
                echo "<script>window.location='enrutador.php?accion=partida'</script>";
            } else {
                //Usuario correcto 
                VistaLoginError::mostrarLoginError();
                
            }
        }   
    }
?>