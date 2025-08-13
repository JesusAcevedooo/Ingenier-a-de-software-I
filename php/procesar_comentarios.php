<?php
include("conexion.php");

// Verificar conexión
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $puntuacion = $_POST['puntuacion'];
    $comentario = $_POST['comentario'];
    $fecha = date('Y-m-d H:i:s'); 

    // Consulta SQL para insertar el comentario
    $sql = "INSERT INTO comentarios (nombre, correo, puntuacion, comentario, fecha) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);

    if ($stmt === false) {
        die("Error en la preparación: " . $conexion->error);
    }

    $stmt->bind_param("sssss", $nombre, $correo, $puntuacion, $comentario, $fecha);

    if ($stmt->execute()) {
        echo "✅ Comentario enviado correctamente.";
    } else {
        echo "❌ Error al enviar el comentario: " . $stmt->error;
    }

    $stmt->close();
}

$conexion->close();


exit();
?>