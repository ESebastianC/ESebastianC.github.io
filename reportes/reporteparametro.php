<?php
require('../fpdf186/fpdf.php');
require '../models/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['cedula'])) {
    $cedula = $_GET['cedula']; 

    $conn = new Conexion();
    $con = $conn->conectar();

    $sqlSelect = "SELECT 
        estudiantes.estCedula,
        estudiantes.estNombre,
        estudiantes.estApellido,
        estudiantes.estTelefono,
        estudiantes.estDireccion
        FROM estudiantes
        WHERE estudiantes.estCedula = ?";

    $stmt = $con->prepare($sqlSelect);
    $stmt->bind_param('s', $cedula);
    $stmt->execute();
    $respuesta = $stmt->get_result();

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
    if ($row = $respuesta->fetch_array()) {
        $fpdf->Cell(30, 10, $row['estCedula'], 1);
        $fpdf->Cell(35, 10, $row['estNombre'], 1);
        $fpdf->Cell(35, 10, $row['estApellido'], 1);
        $fpdf->Cell(30, 10, $row['estTelefono'], 1);
        $fpdf->Cell(50, 10, $row['estDireccion'], 1);
        $fpdf->Ln();
    } else {
        $fpdf->Cell(0, 10, "No se encontraron resultados", 1, 1, 'C');
    }

    $fpdf->Output();
}

?>
