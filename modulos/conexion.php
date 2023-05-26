<?php
// Conexion a base de datos por medio de PDO

$dsn = 'mysql:host=localhost;dbname=crud_bodegas_productos;charset=utf8mb4';
$username = 'root';
$password = '';

try {
    $conexion = new PDO($dsn, $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Crea una excepcion que sera mostrado en el catch
} catch(PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

?>
