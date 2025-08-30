<?php
include 'conexion.php';

$id = $_POST['ID'];
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$gmail = $_POST['gmail'];

$sql = "UPDATE Usuarios SET usuario=?, nombre=?, apellido=?, telefono=?, gmail=? WHERE ID=?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sssssi", $usuario, $nombre, $apellido, $telefono, $gmail, $id);

if ($stmt->execute()) {
    echo "Usuario actualizado correctamente.";
} else {
    echo "Error: " . $stmt->error;
}

$conexion->close();
?>
