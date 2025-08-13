<?php


$servidor = "193.203.175.237"; // Dirección del servidor MySQL (puede ser una IP o un nombre de dominio)

$usuario = "u992749838_dwaa_viajes25"; // Usuario de la base de datos

$contrasena = "DWviajes25#"; // Contraseña de la base de datos

$base_datos = "u992749838_dwaa_viajes25"; // Nombre de la base de datos a la que queremos conectarnos

// Crear la conexión

$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

// Comprobar la conexión

if ($conexion->connect_error) {

    die("Error de conexión: " . $conexion->connect_error);

} else {


}

// Cerrar la conexión (buena práctica para liberar recursos)


?>