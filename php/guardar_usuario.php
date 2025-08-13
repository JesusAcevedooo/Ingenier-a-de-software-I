<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['ID'];
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $gmail = $_POST['gmail'];

    $stmt = $conexion->prepare("UPDATE Usuarios SET usuario=?, nombre=?, apellido=?, telefono=?, gmail=? WHERE id=?");
    $stmt->bind_param("sssssi", $usuario, $nombre, $apellido, $telefono, $gmail, $id);

    if ($stmt->execute()) {
        echo "Usuario actualizado correctamente. <a href='panel.php'>Volver</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>
