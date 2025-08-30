<?php
include("conexion.php");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // No necesitas capturar el ID si es AUTO_INCREMENT
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $npersonas = $_POST['npersonas'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $viajes = $_POST['viajes'];


    // Consulta con 6 columnas (sin el ID porque se autogenera)
    $sql = "INSERT INTO citas (nombre, correo, telefono, npersonas, fecha, hora, viajes) VALUES (?, ?, ?, ?, ?, ?,?)";

    $stmt = $conexion->prepare($sql);

    if ($stmt === false) {
        die("Error en la preparación: " . $conexion->error);
    }

    // Enlazamos 6 variables tipo string ("ssssss")
    $stmt->bind_param("sssssss", $nombre, $correo, $telefono, $npersonas, $fecha, $hora, $viajes);

    if ($stmt->execute()) {
        header('Location: ..\turismo.html');
    } else {
        echo "❌ Error al agendar: " . $stmt->error;
    }

    $stmt->close();
}

$conexion->close();
?>
