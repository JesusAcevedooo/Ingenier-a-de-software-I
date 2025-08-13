<?php
include("conexion.php");



// Verificar conexión
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

// Consulta para obtener los comentarios (los más recientes primero)
$sql = "SELECT nombre, correo, puntuacion, comentario, fecha FROM comentarios ORDER BY fecha DESC LIMIT 10";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="comentario">';
        echo '<div class="nombre">' . htmlspecialchars($row["nombre"]) . '</div>';
        echo '<div class="correo">' . htmlspecialchars($row["correo"]) . '</div>';
        echo '<div class="puntuacion">' . str_repeat('★', $row["puntuacion"]) . str_repeat('☆', 5 - $row["puntuacion"]) . '</div>';
        echo '<div class="fecha">' . date("d/m/Y H:i", strtotime($row["fecha"])) . '</div>';
        echo '<div class="texto">' . nl2br(htmlspecialchars($row["comentario"])) . '</div>';
        echo '</div>';
    }
} else {
    echo '<p>Aún no hay comentarios. ¡Sé el primero en opinar!</p>';
}

$conexion->close();
?>