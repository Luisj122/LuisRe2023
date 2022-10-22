<?php
session_start();
?>
<?php
  header("Content-Type: text/html; charset=UTF-8");
?>
<?php

$error;
$comprobador = false;

if($_POST){
  if($_POST['accion']=="login"){
    if (isset($_POST["email"])) {
      $_SESSION["useremail"] = $_POST["email"];
      $_SESSION["userpassword"] = $_POST["password"];
  
      //comprobamos si la contraseña tiene mayuscula con el metodo ctype_upper
      for ($i = 0; $i < strlen($_SESSION["userpassword"]); $i++) {
          if (ctype_upper(substr($_SESSION["userpassword"], $i, $i))) {
              $comprobador = true;
          }
      }
  
      if (strlen($_SESSION["userpassword"]) >= 8 && $comprobador == true) {
          header("Location: proyectos.php");
      } else {
          $error = "dato incorrecto";
          header("Location: login.php");
      }
  } else {
      $error = "campo vacio";
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


        if(empty($_SESSION['proyectos'])){
          $id = 0;
        }else{
          $ids = array_column($_SESSION['proyectos'],'id');
          $id = max($ids) + 1;
        }

        array_push($_SESSION['proyectos'], ['id' => $id, 'nombre' => $nombre, 'diasTranscurridos' => $diasTranscurridos, 'fechaInicio' => $fechaInicio, 'fechaFinPrevisto' => $fechaFinPrevisto, 'porcentajeCompletado' => $porcentajeCompletado, 'importancia' => $importancia]);

        header("Location: proyectos.php");
    }

}

//Borrar todos los proyectos
if ($_GET) {

  if ($_GET['accion']== "borrarTodo") {
      $limpioArray = array();
      $_SESSION['proyectos']=$limpioArray;
      header("location: proyectos.php");
    }

}

//Borrar todos proyectos por su id
if ($_GET) {

  if ($_GET['accion']== "borrarProyecto") {
      foreach($_SESSION['proyectos'] as $clave => &$valor){
        if($clave == $_GET['id'])
        unset($_SESSION['proyectos'][$clave]);
      }
    }
    header("location: proyectos.php");
}



?>