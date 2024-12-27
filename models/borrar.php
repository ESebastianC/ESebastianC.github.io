<?php
include_once 'conexion.php';
$conn = new Conexion();
$con = $conn->conectar();
$cedula=$_POST['cedula'];
$sqlBorrar="delete from estudiantes where estCedula='$cedula'";
if ($con->query($sqlBorrar)==TRUE) {
    echo  json_encode ("Se borro");
}else{
    echo json_encode("Fallo".$sqlBorrar.$mysql->error);
}
?>