<?php
$dbh = null;
try {
    $dsn = "mysql:host=mariadb;dbname=ejemplo";
    $dbh = new PDO($dsn, "usuario", "usuario");
} catch (PDOException $e){
    echo $e->getMessage();
}

/*
// Prepare
$stmt = $dbh->prepare("INSERT INTO clientes (nombre, apellidos, direccion, localidad, movil) VALUES (?, ?, ?, ?, ?)");
// Bind
$stmt->bindValue(1, "Javi");
$stmt->bindValue(2, "Guillén");
$stmt->bindValue(3, "Su casa");
$stmt->bindValue(4, "Mojácar");
$stmt->bindValue(5, "6312251");
// Excecute
$stmt->execute();


*/

//Metodo prepare sobre la conexion
$stmt = $dbh->prepare("SELECT * FROM clientes");
//$stmt es un objeto PDOStatement
$stmt->execute();
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($clientes as $cliente){
    echo $cliente['nombre'] . "<br>";
}

//Metodo prepare sobre la conexion
$stmt = $dbh->prepare("SELECT * FROM clientes");
//$stmt es un objeto PDOStatement
$stmt->execute();
$clientes = $stmt->fetchAll(PDO::FETCH_OBJ);
foreach ($clientes as $cliente){
    echo $cliente->nombre . "<br>";
}

//Metodo prepare sobre la conexion
$stmt = $dbh->prepare("DELETE FROM clientes where id = ?");
$stmt-> bindValue(1,5);
$stmt-> execute();


?>