<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: iniciosesion.html");
    exit();
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../css/style7.css">
</head>
<body>
    <div class="form-container">
        <h2>Editar Usuario</h2>
        <form action="editar_usuario.php" method="POST">
            <input type="hidden" name="ID" value="<?php echo htmlspecialchars($usuario['ID']); ?>">

            <label>Usuario:</label>
            <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario['usuario']); ?>" required>

            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>

            <label>Apellido:</label>
            <input type="text" name="apellido" value="<?php echo htmlspecialchars($usuario['apellido']); ?>" required>

            <label>Teléfono:</label>
            <input type="text" name="telefono" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" required>

            <label>Gmail:</label>
            <input type="email" name="gmail" value="<?php echo htmlspecialchars($usuario['gmail']); ?>" required>

            <input type="submit" value="Guardar cambios">
        </form>
    </div>
</body>
</html>
