<?php
include_once "conexion.php";
//crear en sus bases una tabla usuario con id, usuario y clave
$conexion = Conexion::conectar();

$usuario = $_POST["usuario"];
$clave = $_POST["password"];

$sql = "SELECT * FROM usuario WHERE usuario = ? AND clave = ?";
$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die("Error en la consulta: " . $conexion->error);
}
$stmt->bind_param("ss", $usuario, $clave);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "El usuario existe en la base de datos.";
} else {
    echo "Usuario o contraseña incorrectos.";
}


?>
