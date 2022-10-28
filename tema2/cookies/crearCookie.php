<?php

function encriptar($mensaje,$clave){

    $encriptado = "";
    for($i=0; $i < strlen($mensaje); $i++){
        $encriptado = $encriptado.chr(ord($mensaje[$i])+$clave);
    }

    return $encriptado;
   
}

function desencriptar($mensaje,$clave){

    $desencriptado = "";
    for($i=0; $i < strlen($mensaje); $i++){
        $desencriptado = $desencriptado.chr(ord($mensaje[$i])-$clave);
    }

    return $desencriptado;
   
}

//Si he pinchado en un link
if ($_GET) {

    if (isset($_COOKIE["servidor"])) {
        //Leemos lo que ya te gusta
        $gustos = $_COOKIE['servidor'];

        //Aquí desencriptas los datos
        //-----
        $gustos = desencriptar($gustos,5);

        //Separar los gustos y meterlos en un array
        $gustosArray = explode("#",$gustos);

        //CreacionCookie # moda-2 # deportes-2  # juegos-0

        for($i=1; $i<count($gustosArray); $i++) {
            //Separa moda de 1
            
            $gustoContadorArray = explode("-",$gustosArray[$i]);
            //Separamos por un lado moda (posición 0) y por otro el contador (posición 1)

            if ($_GET['interes'] == $gustoContadorArray[0]) {
                $gustoContadorArray[1]++;
            }

            $gustosArray[$i] = implode("-", $gustoContadorArray);
        }

        //Volvemos a convertir a string ya quitados los duplicados
        $gustosString = implode("#", $gustosArray);
        
        
        //Aquí encriptas los datos 
        //-----
        $gustosString = encriptar($gustosString,5);
        

        //Creación de la cookie
        setcookie('servidor',$gustosString , time()+60000, "/tema3", "ejerphp.herokuapp.com", true, false);
        //echo "Cookie creada";
    } else {
        //Primera vez que entra
        setcookie('servidor',encriptar("CreacionCookie#moda-0#deporte-0#juegos-0",5), time()+60000, "/tema3", "ejerphp.herokuapp.com", false, true);
    }


    header("Location: index.php");
}


?>