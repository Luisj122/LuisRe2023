<?php

    class controladorPrestamo {


        public static function mostrarPrestamos() {
            //LLamar al modelo para obtener todas las películas en un array de Pelicula
            $prestamos = prestamoBD::getPrestamo();

            //Llamar a una vista para pintar esas películas
            vistaPrestamos::render($prestamos);
        }


        public static function borrarPrestamo($id) {
            //LLamar al modelo para obtener todas las películas en un array de Pelicula
            $prestamos = prestamoBD::borrarPrestamos($id);         

        }

        public static function mostrarFormularioNuevaPrestamo() {
            $libros =  libroBD::getLibros();
            $usuarios = usuarioBD::getUsuarios();
            vistaFormularioNuevoPrestamo::render($libros, $usuarios);
        }

        public static function insertarPrestamo($prestamo) {
            $prestamo = new Prestamo($prestamo["idLibro"],$prestamo["idUsuario"],$prestamo["fecha_i"],$prestamo["fecha_f"],$prestamo["estado"]);
            prestamoBD::insertarPrestamos($prestamo);

            echo '<script>window.location="'."index.php".'"</script>';
        }

        public static function editarPrestamo($id,$fechaF,$estado) {
            
            prestamoBD::editarPrestamos($id,$fechaF,$estado);

            echo '<script>window.location="'."index.php".'"</script>';
            
        }

        public static function buscarDni($dni) {
            
            $bdni = prestamoBD::buscarPrestamos($dni);
            vistaPrestamosDni::renderDni($bdni);

            
        }

        public static function buscarEstado($estado) {
            
            $bestado = prestamoBD::buscarEstado($estado);
            vistaPrestamosEstado::renderEstado($bestado);

            
        }
        
    }

?>