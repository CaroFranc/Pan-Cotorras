<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servidor = "localhost";
$usuario_bd = "root";
$contrasena_bd = ""; // Asegúrate de que esta sea la contraseña correcta, o vacía si lo es.
$nombre_bd = "pan_cotorras";

echo "Intentando conectar a la base de datos...<br>";

$conexion = new mysqli($servidor, $usuario_bd, $contrasena_bd, $nombre_bd);

if ($conexion->connect_error) {
    die("ERROR: No se pudo conectar a la base de datos. Mensaje: " . $conexion->connect_error);
} else {
    echo "¡Conexión exitosa a la base de datos '" . $nombre_bd . "'!<br>";
    $conexion->close();
}

echo "Fin del script de prueba.";
?>