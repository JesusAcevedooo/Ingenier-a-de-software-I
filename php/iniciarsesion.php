<?php
session_start();
include 'conexion.php';

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

// Consulta solo por el usuario
$sql = "SELECT * FROM Usuarios WHERE usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $datos = $resultado->fetch_assoc();

    // Verificar la contraseña cifrada
    if (password_verify($contraseña, $datos['contraseña'])) {
        $_SESSION['usuario'] = $datos;
        header("Location: editar_formulario.php");
        exit();
    } else {
        echo "Credenciales incorrectas.";
    }
} else {
    echo "Credenciales incorrectas.";
}
?>
