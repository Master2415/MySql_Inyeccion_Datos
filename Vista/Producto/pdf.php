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
        $this->Cell(90, 10, 'Reporte de productos', 0, 0, 'C');
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
$pdf->Cell(15, 10, 'Codigo', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Tipo', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Nombre', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Cantidad Kg', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Precio Kg', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Fecha de ingreso', 1, 1, 'C', true);

// Contenido de la tabla
$pdf->SetFont('Arial', '', 12);
include "../../modelo/conexion.php";

// Realizar la consulta para mostrar todos los productos
$sql = $conexion->query("select * from producto");
if (!$sql) {
    die("Error en la consulta SQL: " . $conexion->error);
}

while ($datos = $sql->fetch_object()) {
    // Contenido de cada fila
    $pdf->Cell(15, 10, $datos->idProducto, 1);
    $pdf->Cell(20, 10, $datos->tipoProducto, 1);
    $pdf->Cell(30, 10, $datos->nombre, 1);
    $pdf->Cell(30, 10, $datos->cantidadStock, 1);
    $pdf->Cell(25, 10, $datos->precio, 1);
    $pdf->Cell(40, 10, $datos->fechaIngreso, 1);
    $pdf->Ln(); // Nueva línea para la siguiente fila
}

$pdf->Output();
?>
