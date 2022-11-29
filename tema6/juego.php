<?php
include_once("truco.php");

class juego{
    private $nombre;
    private $genero;
    private $plataforma;
    private $trucos;


    function __construct($nombre = "nombre", $genero="genero", $plataforma="plataforma")
    {
        $this->nombre = $nombre;
        $this->genero = $genero;
        $this->plataforma = $plataforma;
        $this->trucos = array();
    }


    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setGenero($genero){
        $this->genero = $genero;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function setPlataforma($plataforma){
        $this->plataforma = $plataforma;
    }

    public function getPlataforma(){
        return $this->plataforma;
    }

    public function addTruco($aTrucos){
        array_push($this->trucos, $aTrucos) ;
    }

    public function delTruco(truco $dTruco){
        foreach($this->trucos as $clave => $truco){
            if($truco == $dTruco){
                unset($this->trucos,$clave);
            }
        }
    }

    public function pintar(){
        echo "<p>". $this->nombre ."</php>";
        echo "<p>". $this->genero ."</php>";
        echo "<p>". $this->plataforma ."</php>";

        
    }


}


?>