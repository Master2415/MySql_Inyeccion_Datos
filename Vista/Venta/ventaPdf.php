<?php
require('../../fpdf186/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(55);
        // Título
        $this->Cell(90, 10, 'Reporte de Ventas - Meats Master', 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Agregar la tabla
$pdf->SetFillColor(255, 255, 255); // Establecer el color de fondo de las celdas
$pdf->SetFont('Arial', 'B', 12);

// Cabecera de la tabla
$pdf->Cell(20, 10, 'Codigo', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Total venta', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Fecha', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Cedula cliente', 1, 1, 'C', true);

// Contenido de la tabla
$pdf->SetFont('Arial', '', 12);
include "../../modelo/conexion.php";

// Realizar la consulta para mostrar todas las ventas
$sql = $conexion->query("SELECT * FROM venta");

if (!$sql) {
    die("Error en la consulta SQL: " . $conexion->error);
}

while ($datos = $sql->fetch_object()) {
    // Contenido de cada fila
    $pdf->Cell(20, 10, $datos->idVenta, 1);
    $pdf->Cell(30, 10, $datos->total, 1);
    $pdf->Cell(30, 10, $datos->fecha, 1);
    $pdf->Cell(30, 10, $datos->Cliente_Persona_cedula, 1);
    $pdf->Ln(); // Nueva línea para la siguiente fila
}

$pdf->Output();
?>
