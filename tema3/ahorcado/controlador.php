<?php session_start(); ?>
<?php
if($_GET){
    if(isset($_GET['letra'])){
        $letraPulsada = $_GET['letra'];

        $error = false;
        $cont = 0;
        
            if (in_array($letraPulsada, $_SESSION['palabra'])) {
        
                for ($i = 0; $i < count($_SESSION['palabra']); $i++) {
                    if ($_SESSION['palabra'][$i] == $letraPulsada) {
                        //echo "Acierto, está en la palabra";
                        $_SESSION['palabraActual'][$i] = $letraPulsada;
                    }
                }
            } else {
                if($_SESSION['cont']!=6){
                    $_SESSION['cont']++;
                array_push($_SESSION['letras'], $letraPulsada);
                }
                
            }      
        
        
        header("Location: index.php");
    }
}

if($_GET){
    if($_GET['accion'] == "jugarN"){
        session_destroy();
        header("Location: index.php");
    }
}
    

?>