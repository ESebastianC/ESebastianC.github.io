<?php
include 'conexion.php';
$conn = new Conexion();
$con = $conn->conectar();

$sqlCursos = "SELECT curId, Nombre FROM curso";
$respuesta = $con->query($sqlCursos);

$cursos = array();
if ($respuesta->num_rows > 0) {
    while ($fila = $respuesta->fetch_assoc()) {
        array_push($cursos, $fila);
    }
}

echo json_encode($cursos);
?>

