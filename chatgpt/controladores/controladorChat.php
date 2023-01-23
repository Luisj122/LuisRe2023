<?php

    class controladorChat {


        public static function mostrarLogin(){

            VistaLogin::mostrarLogin();
        }

        public static function login($email, $password){
            $usuario = null;
            $codigo = UsuarioBD::chequearLogin($email,$password, $usuario);

            if ($codigo == 1) {
                $_SESSION['usuario'] = serialize($usuario);
                echo "<script>window.location='enrutador.php?accion=Chatgpt'</script>";
            } else {
                //Usuario correcto 
                VistaLoginError::mostrarLoginError();
                
            }
        }

        public static function texto(){
            Textart::texto();
        }

        public static function renderArticulo($articulo){
            ApiChatgpt::render($articulo);
        }
        
    }
