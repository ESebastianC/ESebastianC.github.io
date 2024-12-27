<?php
require('../fpdf186/fpdf.php');
require '../models/conexion.php';

$conn = new Conexion();
$con = $conn->conectar();

$sqlSelect = "SELECT 
    estudiantes.estCedula,
    estudiantes.estNombre,
    estudiantes.estApellido,
    estudiantes.estTelefono,
    estudiantes.estDireccion
    FROM estudiantes;";

$respuesta = $con->query($sqlSelect);

$fpdf = new FPDF();
$fpdf->AddPage();
$fpdf->SetFont('Arial', 'B', 10);

$fpdf->Cell(180, 10, "CUARTO", 1);
$fpdf->Ln();
$fpdf->Cell(30, 10, "Cedula", 1);
$fpdf->Cell(35, 10, "Nombre", 1);
$fpdf->Cell(35, 10, "Apellido", 1);
$fpdf->Cell(30, 10, "Telefono", 1);
$fpdf->Cell(50, 10, "Direccion", 1);
$fpdf->Ln();

$fpdf->SetFont('Arial', '', 10);  
while ($row = $respuesta->fetch_array()) {
    $cedula = $row['estCedula'];
    $nombre = $row['estNombre'];
    $apellido = $row['estApellido'];
    $telefono = $row['estTelefono'];
    $direccion = $row['estDireccion'];

    $fpdf->Cell(30, 10, $cedula, 1);
    $fpdf->Cell(35, 10, $nombre, 1);
    $fpdf->Cell(35, 10, $apellido, 1);
    $fpdf->Cell(30, 10, $telefono, 1);
    $fpdf->Cell(50, 10, $direccion, 1);
    $fpdf->Ln();
}

$fpdf->Output();
?>
