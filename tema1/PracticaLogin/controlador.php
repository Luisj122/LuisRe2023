<?php
session_start();
?>
<?php
header("Content-Type: text/html; charset=UTF-8");
?>
<?php

$error;
$esMayus = 0;
if (isset($_POST['accion'])) {
    if ($_POST["accion"] == "login") {

        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $_SESSION['email'] = $_POST["email"];
            $_SESSION['password'] = $_POST["password"];

            for ($i = 0; $i < strlen($_SESSION['password']); $i++) {
                if (ctype_upper(substr($_SESSION['password'], $i, $i) )) {
                    $esMayus++;
                }
            }

            if (strlen($_SESSION['password']) > 8 && $esMayus >= 1) {
                header("Location: proyectos.php");
            } else {
                $error = "Contraseña demasido corta o no contiene ninguna mayuscula";
                header("Location: login.php?error=".$error);
            }
        } else {
            header("Location: login.php");
        }
    }
}


//Crear nuevos proyectos
if ($_POST) {

  if (isset($_POST['crearProyecto'])) {
    $nombre = $_POST['nombre'];
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFinPrevisto = $_POST['fechaFinPrevisto'];
    $diasTranscurridos = $_POST['diasTranscurridos'];
    $porcentajeCompletado = $_POST['porcentajeCompletado'];
    $importancia = $_POST['importancia'];


    if (empty($_SESSION['proyectos'])) {
      $id = 0;
    } else {
      $ids = array_column($_SESSION['proyectos'], 'id');
      $id = max($ids) + 1;
    }

    array_push($_SESSION['proyectos'], ['id' => $id, 'nombre' => $nombre, 'diasTranscurridos' => $diasTranscurridos, 'fechaInicio' => $fechaInicio, 'fechaFinPrevisto' => $fechaFinPrevisto, 'porcentajeCompletado' => $porcentajeCompletado, 'importancia' => $importancia]);

    header("Location: proyectos.php");
  }
}



//Borrar todos los proyectos
if ($_GET) {

  if ($_GET['accion'] == "borrarTodo") {
    $limpioArray = array();
    $_SESSION['proyectos'] = $limpioArray;
    header("location: proyectos.php");
    //echo '<script>window.location="' . "proyectos.php" . '"</script>';
  }
}




//Borrar todos proyectos por su id
if ($_GET) {

  if ($_GET['accion'] == "borrarProyecto") {
    foreach ($_SESSION['proyectos'] as $clave => $valor) {
      if ($clave == $_GET['id'])
        unset($_SESSION['proyectos'][$clave]);
    }
    //echo '<script>window.location="' . "proyectos.php" . '"</script>';
    header("location: proyectos.php");
  }
  
 
}


//Ver informacion de una variable
if ($_GET) {

  if ($_GET['accion'] == "verInfo") {
    foreach ($_SESSION['proyectos'] as $clave => $valor) {
      if ($clave == $_GET['id']){
        $_SESSION['info'] = $_SESSION['proyectos'][$clave];   
      }
     
    }
    //echo '<script>window.location="' . "verProyectos.php" . '"</script>'; 
    header("location: verProyectos.php");
  }
  
  
}

?>