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
    $personas = $_POST['personas'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $zonaRestaurante = $_POST['zonaRestaurante'];


    // Consulta con 6 columnas (sin el ID porque se autogenera)
    $sql = "INSERT INTO citasMesa (nombre, correo, telefono, personas, fecha, hora, zonaRestaurante) VALUES (?, ?, ?, ?, ?, ?,?)";

    $stmt = $conexion->prepare($sql);

    if ($stmt === false) {
        die("Error en la preparación: " . $conexion->error);
    }

    // Enlazamos 6 variables tipo string ("ssssss")
    $stmt->bind_param("sssssss", $nombre, $correo, $telefono, $personas, $fecha, $hora, $zonaRestaurante);

    if ($stmt->execute()) {
<<<<<<< HEAD
        header('Location: ..\negocios.html');
=======
        echo "✅ Cita agendada.";
>>>>>>> c6546dedbbb5f5b8debcbb3b00550dceb412e8bd
    } else {
        echo "❌ Error al agendar: " . $stmt->error;
    }

    $stmt->close();
}

$conexion->close();
?>
