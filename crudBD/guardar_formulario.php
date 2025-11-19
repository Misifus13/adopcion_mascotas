<?php
include 'conexion.php';

// Verificar que el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombreCompleto = $_POST['nombreCompleto'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $fechaNac = $_POST['fechaNac'];
    $genero = $_POST['genero'];
    $tipoMascota = $_POST['tipoMascota'];
    $nombreMascota = $_POST['nombreMascota'];
    $vivienda = $_POST['vivienda'];
    $responsabilidad = isset($_POST['responsabilidad']) ? 1 : 0;
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    $terminos = isset($_POST['terminos']) ? 1 : 0;
    $mensaje = $_POST['mensaje'];

    // Preparar consulta
    $stmt = $conn->prepare("INSERT INTO postulaciones 
        (nombreCompleto, email, telefono, fechaNac, genero, tipoMascota, nombreMascota, vivienda, responsabilidad, newsletter, terminos, mensaje)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssssssiiis",
        $nombreCompleto, $email, $telefono, $fechaNac, $genero, $tipoMascota, $nombreMascota, $vivienda, $responsabilidad, $newsletter, $terminos, $mensaje
    );

    if ($stmt->execute()) {
        echo "Formulario enviado correctamente!";
    } else {
        echo "Error al enviar formulario: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Acceso inválido.";
}
?>
