<?php
// Datos de conexión a MySQL
$host = "localhost";  // servidor MySQL
$usuario = "root";    // usuario MySQL
$clave = "";          // contraseña MySQL

// Crear conexión
$conn = new mysqli($host, $usuario, $clave);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear base de datos
$sqlDB = "CREATE DATABASE IF NOT EXISTS adopcionMascotas";
if ($conn->query($sqlDB) === TRUE) {
    echo "Base de datos creada correctamente.<br>";
} else {
    echo "Error al crear la base de datos: " . $conn->error . "<br>";
}

// Seleccionar la base de datos
$conn->select_db("adopcionMascotas");

// Crear tabla
$sqlTabla = "CREATE TABLE IF NOT EXISTS postulaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombreCompleto VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    fechaNac DATE NOT NULL,
    genero ENUM('F','M','Otro') NOT NULL,
    tipoMascota ENUM('perro','gato') NOT NULL,
    nombreMascota VARCHAR(50) NOT NULL,
    vivienda ENUM('casa','departamento') NOT NULL,
    responsabilidad TINYINT(1) NOT NULL,
    newsletter TINYINT(1) NOT NULL,
    terminos TINYINT(1) NOT NULL,
    mensaje VARCHAR(250),
    fechaRegistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sqlTabla) === TRUE) {
    echo "Tabla 'postulaciones' creada correctamente.<br>";
} else {
    echo "Error al crear la tabla: " . $conn->error . "<br>";
}

// Cerrar conexión
$conn->close();
?>
