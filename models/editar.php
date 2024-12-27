<?php
include_once 'conexion.php';
$conn = new Conexion();
$con = $conn->conectar();

$cedula = $_GET['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$sqlEditar = "UPDATE estudiantes SET estNombre = ?, estApellido = ?, estDireccion = ?, estTelefono = ? WHERE estCedula = ?";

$stmt = $con->prepare($sqlEditar);

if ($stmt) {
    $stmt->bind_param("sssss", $nombre, $apellido, $direccion, $telefono, $cedula);
    if ($stmt->execute()) {
        echo json_encode("Se editó correctamente");
    } else {
        echo json_encode("Fallo al ejecutar la consulta: " . $stmt->error);
    }
    $stmt->close();
} else {
    echo json_encode("Fallo en la preparación de la consulta: " . $con->error);
}

$con->close();
?>