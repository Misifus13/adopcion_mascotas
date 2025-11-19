<?php
$host = "localhost";  // usualmente localhost
$usuario = "root";    // tu usuario de MySQL
$clave = "";          // tu contraseña
$baseDatos = "adopcionMascotas";

// Crear conexión
$conn = new mysqli($host, $usuario, $clave, $baseDatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
