<?php
require('../../fpdf186/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(55);
        $this->Cell(90, 10, 'Detalle de Venta - Meats Master', 0, 0, 'C');
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(15, 10, 'ID', 1, 0, 'C', true);
$pdf->Cell(15, 10, 'ID Venta', 1, 0, 'C', true);
$pdf->Cell(15, 10, 'ID Producto', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Producto', 1, 0, 'C', true);
$pdf->Cell(15, 10, 'Tipo', 1, 0, 'C', true);
$pdf->Cell(15, 10, 'Cantidad', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Descripcion', 1, 0, 'C', true);
$pdf->Cell(15, 10, 'Cedula Cliente', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Cliente', 1, 0, 'C', true);
$pdf->Cell(15, 10, 'Apellido', 1, 1, 'C', true);

$pdf->SetFont('Arial', '', 10);
include "../../modelo/conexion.php";

$sql = $conexion->query("SELECT 
                        dv.codigoDetalle, 
                        v.idVenta, 
                        p.idProducto, 
                        p.nombre AS nombreProducto, 
                        p.tipoProducto,
                        dv.cantidad, 
                        dv.descripcionProducto,
                        c.Persona_cedula,
                        per.nombre AS nombreCliente,
                        per.apellido AS apellidoCliente
                    FROM detalleVenta dv
                    JOIN venta v ON dv.codigoVenta = v.idVenta
                    JOIN producto p ON dv.codigoProducto = p.idProducto
                    JOIN cliente c ON v.Cliente_Persona_cedula = c.Persona_cedula
                    JOIN persona per ON c.Persona_cedula = per.cedula;");

if (!$sql) {
    die("Error en la consulta SQL: " . $conexion->error);
}

while ($datos = $sql->fetch_object()) {
    $pdf->Cell(15, 10, $datos->codigoDetalle, 1);
    $pdf->Cell(15, 10, $datos->idVenta, 1);
    $pdf->Cell(15, 10, $datos->idProducto, 1);
    $pdf->Cell(30, 10, utf8_decode($datos->nombreProducto), 1);
    $pdf->Cell(15, 10, utf8_decode($datos->tipoProducto), 1);
    $pdf->Cell(15, 10, $datos->cantidad, 1);
    $pdf->Cell(25, 10, utf8_decode($datos->descripcionProducto), 1);
    $pdf->Cell(15, 10, $datos->Persona_cedula, 1);
    $pdf->Cell(25, 10, utf8_decode($datos->nombreCliente), 1);
    $pdf->Cell(15, 10, utf8_decode($datos->apellidoCliente), 1);
    $pdf->Ln();
}

$pdf->Output();
?>

