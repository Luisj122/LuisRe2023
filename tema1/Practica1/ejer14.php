<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<?php


    $alumnos = array(
        array("nombre"=>"alumno2", "materia"=>"materia1", "nota"=>"7"),
        array("nombre"=>"juan", "materia"=>"matematicas", "nota"=>"5"),
        array("nombre"=>"mario", "materia"=>"fisica", "nota"=>"9"),
        array("nombre"=>"david", "materia"=>"lengua", "nota"=>"2"),
        array("nombre"=>"zalumno", "materia"=>"quimica", "nota"=>"1"));

    array_multisort(array_column($alumnos,"nota"),SORT_DESC,array_column($alumnos,"nombre"),$alumnos);


    foreach($alumnos as &$valor){
        echo $valor["nombre"] . " - $valor[nota] " . " <br>";
    }
    
    echo array_sum(array_column($alumnos,"nota"))/count($alumnos);


    echo "<br>";
    $cont = 0;

    foreach($alumnos as &$valor){

        if($valor["nota"]<5){
            
            $cont++;
        }

        
    }
    echo $cont;

?>