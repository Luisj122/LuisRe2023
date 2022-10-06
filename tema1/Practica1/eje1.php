<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<?php
    
	//Inicializamos las variable y usamos rand para poder generar numeros aleatorios
	$pimera = rand();
	$segunda = rand();

	$resta = $pimera - $segunda;
	$division = $pimera / $segunda;

	echo "La resta = $resta <br>";
	echo "La division = $division ";

	
?>
