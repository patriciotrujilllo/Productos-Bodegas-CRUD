<?php
// Conexion a base de datos por medio de PDO
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$host = $_ENV['host'];
$dbname = $_ENV['dbname'];
$username = $_ENV['username'];
$password = $_ENV['password'];


$dsn = "mysql:host=$host;
dbname=$dbname;
charset=utf8mb4";
$username = $username;
$password = $password;

try {
    $conexion = new PDO($dsn, $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Crea una excepcion que sera mostrado en el catch
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
