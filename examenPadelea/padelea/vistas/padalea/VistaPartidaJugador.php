<?php
    class VistaPartidaJugador{
        public static function partidaJugador($partida){
            include_once("./cabecera.php");

            foreach($partida as $value){
                echo '<div class="card border border-warning " style="width: 18rem;">
                <div class="card-header">
                    <p class="text-primary font-weight-bold">Partida '.$value->getId().'</p>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="font-weight-bold text-dark">Fecha: </span> '.$value->getFecha().'</li>
                <li class="list-group-item"><span class="font-weight-bold text-dark">Hora: </span> '.$value->getHora().'</li>
                <li class="list-group-item"><span class="font-weight-bold text-dark">Ciudad: </span> '.$value->getCiudad().'</li>
                <li class="list-group-item"><span class="font-weight-bold text-dark">Lugar: </span> '.$value->getLugar().'</li>
                <li class="list-group-item"><span class="font-weight-bold text-dark">Cubierta: </span> '.$value->getCubierta().'</li>
                <li class="list-group-item"><span class="font-weight-bold text-dark">Estado: </span> '.$value->getEstado().'</li>
                </ul>
            </div>';
            }
            


        }
    }

?>
