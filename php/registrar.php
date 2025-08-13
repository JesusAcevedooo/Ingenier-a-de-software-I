<?php
include("conexion.php");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // No necesitas capturar el ID si es AUTO_INCREMENT
    $usuario = $_POST['usuario'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);   
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $gmail = $_POST['gmail'];
    $rol = $_POST['rol'];


    // Consulta con 6 columnas (sin el ID porque se autogenera)
    $sql = "INSERT INTO Usuarios (usuario, contraseña, nombre, apellido, telefono, gmail, rol) VALUES (?, ?, ?, ?, ?, ?,?)";

    $stmt = $conexion->prepare($sql);

    if ($stmt === false) {
        die("Error en la preparación: " . $conexion->error);
    }

    // Enlazamos 6 variables tipo string ("ssssss")
    $stmt->bind_param("sssssss", $usuario, $contraseña, $nombre, $apellido, $telefono, $gmail, $rol);

    if ($stmt->execute()) {
        echo "✅ Registro exitoso.";
    } else {
        echo "❌ Error al registrar: " . $stmt->error;
    }

    $stmt->close();
}

$conexion->close();
?>
