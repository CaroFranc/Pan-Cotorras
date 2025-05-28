<?php
$host = "localhost";
$usuario = "tu_usuario";
$contrasena = "tu_contrasena";
$base_de_datos = "pan_cotorras"; 
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);
if ($conexion->connect_error) {
    die("Error al conectar a la base de datos: " . $conexion->connect_error);
}
echo "Conexión a la base de datos exitosa.<br>";
$sql = "SELECT * FROM contacto"; 
$resultado = $conexion->query($sql);
if ($resultado) {
    if ($resultado->num_rows > 0) {
        echo "Datos de la tabla 'contacto':<br>";
        while ($fila = $resultado->fetch_assoc()) {
            print_r($fila);
            echo "<br>";
        }
    } else {
        echo "La tabla 'contacto' está vacía.<br>";
    }
    $resultado->free();
} else {
    echo "Error al ejecutar la consulta: " . $conexion->error . "<br>";
}
$conexion->close();
echo "Conexión a la base de datos cerrada.";
?>