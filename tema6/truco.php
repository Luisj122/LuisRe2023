<?php
class truco{
    private $nombre;
    private $descripcion;

    function __construct($nombre, $descripcion){
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    

    function pintar(){
        echo "<p>" . $this->nombre . "</p>";
        echo "<p>" . $this->descripcion . "</p>";
    }
}

?>