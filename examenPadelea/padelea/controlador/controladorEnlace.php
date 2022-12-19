<?php

class controladorEnlace{


    public static function eliminarEnlace($id, $idR){
        //LLamar al modelo para obtener todas las películas en un array de Pelicula
        enlaceBD::borrarEnlace($id);
        echo "<script>window.location='enrutador.php?accion=enlace&id=".$idR."'</script>";  
    }

    public static function insertarEnlace($enlace) {
            $enlaces = new  enlace($enlace["nombre"], $enlace["enlace"], $enlace["precio"],
            $enlace["imagen"], $enlace["prioridad"], $enlace["regalo"]);
             enlaceBD::insertarEnlace($enlaces);
            
             echo "<script>window.location='enrutador.php?accion=enlace&id=".$enlace["regalo"]."'</script>";  
    }

    public static function ordenarAscendente($id){
        $enlaces = enlaceBD::ordenarAscendente($id);
        VistaEnlace::render($enlaces);
       
    }

    public static function ordenarDescendente($id){
        $enlaces = enlaceBD::ordenarDescendente($id);
        VistaEnlace::render($enlaces);
        
    }
}
?>