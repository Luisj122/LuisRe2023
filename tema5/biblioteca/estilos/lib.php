<?php

//Función para limpiar los input de los formularios
function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

/*
function pintarPrestamo()
{
    $prestamos = getPrestamo();
    echo "<table class='table table-success table-striped'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>id</th>";
    echo "<th>idLibro</th>";
    echo "<th>idUsuario</th>";
    echo "<th>fechaIncio</th>";
    echo "<th>fechaFin</th>";
    echo "<th>fechaFin</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";


    foreach ($prestamos as  $value) {
       
            echo "<tr>";
                   echo "<td>" . $value["id"] . "</td>";
                   echo "<td>" . $value["idLibro"] . "</td>";
                   echo "<td>" . $value["idUsuario"] . "</td>";
                   echo "<td>" . $value["fecha_i"] . "</td>";
                   echo "<td>" . $value["fecha_f"] . "</td>";
                   echo "<td>" . $value["estado"] . "</td>";

                   foreach(selectUsuario($value["idUsuario"]) as $valor){
                        echo $valor['nombre'];
                   }
                    
        
       /* echo "<td align='center'><a href='controlador.php?accion=borrar&id=" . $value['id'] . "' class='btn btn-outline-danger'><span class='material-symbols-outlined'>
        delete
        </span></a>
        <a href='controlador.php?accion=info&id=" . $value['id'] . "' class='btn btn-outline-info'><span class='material-symbols-outlined'>
        info
        </span></a>
        </a>
        <a href='formLoca.php?accion=insertar&id=".$value['id']."' class='btn btn-outline-success'><span class='material-symbols-outlined'>
        add
        </span></a>*/
       
       echo "</td></tr>";
        //pintarModal($value['id']);
        // <a href='#' type='button' data-bs-toggle='modal' data-bs-target='#nuevaLocalizacion" . $value['id'] . "' class='btn btn-outline-success'><span class='material-symbols-outlined'>
       //add
       //</span></a>





function pintarLocalizaciones($localizaciones)
{
    echo"<h1 class='text-center'>LOCALIZACIONES</h1>";
    echo "<table class='table table-success table-striped'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Importancia</th>
                    <th>Acciones</th>";
            echo "</tr>";
        echo "</thead>";
    echo "<tbody>";

    foreach ($localizaciones as $key => $value) {
        if ($key != "id" && $key != "id_juego") {
            echo "<tr>
                    <td align='center'>" . $value["nombre"] . "</td>
                    <td>" . $value["descripcion"] . "</td>
                    <td align='center'>" . $value["importancia"] . "</td>";
        }
        echo "<td align='center'><a class='btn btn-outline-danger' href='controlador.php?accion=borrarL&id=" . $value['id'] . "'><span class='material-symbols-outlined'>
        delete
        </span</a></td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
}

?>