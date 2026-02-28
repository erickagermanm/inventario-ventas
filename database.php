<?php

$host = "localhost";
$db   = "inventario_ventas";
$user = "root";
$pass = "";

try {
    
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
    
    die("Error de conexión: " . $e->getMessage());
}
?>