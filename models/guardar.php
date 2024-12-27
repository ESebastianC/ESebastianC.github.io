<?php
include_once 'conexion.php';
$conn = new Conexion();
$con = $conn->conectar();

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$curId = $_POST['curId'];

$sqlInsert = "INSERT INTO estudiantes (estCedula, estNombre, estApellido, estTelefono, estDireccion, curId) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $con->prepare($sqlInsert);

if ($stmt) {
    $stmt->bind_param("ssssss", $cedula, $nombre, $apellido, $telefono, $direccion, $curId);
    if ($stmt->execute()) {
        echo json_encode("Se guardó correctamente");
    } else {
        echo json_encode("Fallo: " . $stmt->error);
    }
    $stmt->close();
} else {
    echo json_encode("Fallo en la preparación de la consulta: " . $con->error);
}

$con->close();
?>
