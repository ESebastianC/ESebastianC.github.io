<?php
include 'conexion.php';
$conn = new conexion();
$con = $conn->conectar();
$sqlSelect = "SELECT 
        estCedula,
        estNombre,
        estApellido,
        estTelefono,
        estDireccion
    FROM estudiantes;";

$respuesta = $con->query($sqlSelect);
$resultado = array();

if ($respuesta->num_rows > 0) {
    while ($fila = $respuesta->fetch_assoc()) {  
        array_push($resultado, $fila);
    }
} else {
    $resultado = "No hay estudiantes";
}

header('Content-Type: application/json');
echo json_encode($resultado);
?>
