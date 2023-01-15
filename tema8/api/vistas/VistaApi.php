<?php
    class VistaApi{
        public static function mostrarSeriesAPI($pagina) {

            include "cabecera.php";            

            echo "<div class='row'>";

  
            //$uri = "https://api.themoviedb.org/3/genre/tv/list?language=es&".$key;       
            $uri = "https://rickandmortyapi.com/api/character/?page=".$pagina."";   
            
            $reqPrefs['https']['method'] = 'GET';
            $reqPrefs['https']['header'] = 'x-Auth-Token';
            $stream_context = stream_context_create($reqPrefs);
            $resultado = file_get_contents($uri, false, $stream_context);

            //Pasar de json a objeto php y recorrer los resultados
            if ($resultado != false) {
                $respPHP = json_decode($resultado);
          
                foreach($respPHP->results as $episode) {

                  echo "
                    <div class='card bg-secondary me-3 mb-3' style='width: 19rem;'>
                    <img src='". $episode->image."' class='card-img-top pt-3' alt='...'>
                    <div class='card-body'>
                      <h3 class='card-title fw-bold text-white'>{$episode->name}</h3>
                      <p class='fw-bold'>Especie:</p>
                      <a href='#'>".$episode->status."-{$episode->species}</a> 
                      <p class='fw-bold'>Última ubicación conocida:</p>
                      <a href='#'>{$episode->location->name}</a>        
                      <p class='fw-bold'>Localizacion:</p>
                      <a href='#'>{$episode->origin->name}</a>            
                    </div>
                  </div>
                  ";
                }
            }

            echo "</div>";

            echo "<a href='enrutador.php?accion=mostrarSeriesPagina&pagina=".(1)."' class='float-start border border-1 border border-secondary rounded-start p-2'><i class='fas fa-angle-double-left' style='font-size:36px; color:white'></i></a>";

            echo "&nbsp;";

            if ($pagina > 1) {
                echo "<a href='enrutador.php?accion=mostrarSeriesPagina&pagina=".($pagina-1)."' class='float-start border border-1 rounded-0 border-secondary rounded p-2 ps-3 pe-3 '><i class='fas fa-angle-left' style='font-size:36px; color:white'></i></a>";
            } else {
                echo "<a class='btn disabled float-start border border-1 border border-secondary rounded-0 p-2 ps-3 pe-3' href='enrutador.php?accion=mostrarSeriesPagina&pagina=".($pagina-1)."'><i class='fas fa-angle-left' style='font-size:36px;'></i></a>";
            }

            echo "&nbsp;";
            
            if ($pagina < 42) {
                echo "<a href='enrutador.php?accion=mostrarSeriesPagina&pagina=".($pagina+1)."' class='float-start border border-1 border border-secondary rounded-0 p-2 ps-3 pe-3'><i class='fas fa-angle-right' style='font-size:36px; color:white'></i></a>";
            } else {
                echo "<a class='btn disabled float-start border border-1 border border-secondary rounded-0 p-2 ps-3 pe-3' href='enrutador.php?accion=mostrarSeriesPagina&pagina=".($pagina+1)."'><i class='fas fa-angle-right' style='font-size:36px'></i></a>";
            }

            echo "&nbsp;";

            echo "<a href='enrutador.php?accion=mostrarSeriesPagina&pagina=".(42)."' class='float-start border border-1 border border-secondary rounded-end p-2'><i class='fas fa-angle-double-right' style='font-size:36px; color:white'></i></a>";

            echo "<div class='row mt-5'></div>";
            echo "</div>";
            
        }

  
    }


?>