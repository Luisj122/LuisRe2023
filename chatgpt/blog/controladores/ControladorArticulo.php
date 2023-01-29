<?php
    class ControladorArticulo{
        
        public static function guardar($articulo){

            $articulos = new Articulo($articulo["id"], $articulo["titulo"] ,$articulo["imagen"], $articulo["texto"], $articulo["fecha"]);

            ChatBD::guardar($articulos);
            echo "<script>window.location='enrutador.php?accion=Chatgpt'</script>";
        }

        public static function verTodo(){
            $articulos = ChatBD::verTodo();
            VistaArticulo::render($articulos);
        }
    }




?>