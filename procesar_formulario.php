<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
$servidor = "localhost";
$usuario_bd = "root"; 
$contrasena_bd = ""; 
$nombre_bd = "pan_cotorras"; 
$conexion = new mysqli($servidor, $usuario_bd, $contrasena_bd, $nombre_bd);
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");
$nombre = $_POST['nombre'] ?? '';   
$email = $_POST['email'] ?? '';
$mensaje = $_POST['mensaje'] ?? '';
if (empty($nombre) || empty($email) || empty($mensaje)) {
    die("Por favor, completa todos los campos del formulario.");
}
$sql = "INSERT INTO mensajes_contacto (nombre, email, mensaje, fecha_envio) VALUES (?, ?, ?, NOW())";
$stmt = $conexion->prepare($sql);
if ($stmt === false) {
    die("Error al preparar la consulta: " . $conexion->error);
}
$stmt->bind_param("sss", $nombre, $email, $mensaje);
if ($stmt->execute()) {
    header("Location: exito.html"); 
    exit(); 
} else {
    echo "Error al guardar el mensaje: " . $stmt->error;
}
$stmt->close();
$conexion->close();
?>