<?php
require('../../fpdf186/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(55);
        $this->Cell(90, 10, 'Lista de Clientes - Meats Master', 0, 0, 'C');
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

$pdf->Cell(25, 10, 'Nombre', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Apellido', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Cedula', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Ciudad', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Correo', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Direccion', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Telefono', 1, 1, 'C', true);

$pdf->SetFont('Arial', '', 10);
include "../../modelo/conexion.php";

$sql = $conexion->query("SELECT persona.nombre, persona.apellido, persona.cedula, ciudad.nombre AS ciudad, persona.correo, persona.direccion, persona.Telefono_numero
                        FROM cliente
                        JOIN persona ON cliente.Persona_cedula = persona.cedula
                        JOIN ciudad ON persona.Ciudad_idCiudad = ciudad.idCiudad");

if (!$sql) {
    die("Error en la consulta SQL: " . $conexion->error);
}

while ($datos = $sql->fetch_object()) {
    $pdf->Cell(25, 10, utf8_decode($datos->nombre), 1);
    $pdf->Cell(25, 10, utf8_decode($datos->apellido), 1);
    $pdf->Cell(20, 10, $datos->cedula, 1);
    $pdf->Cell(25, 10, utf8_decode($datos->ciudad), 1);
    $pdf->Cell(30, 10, utf8_decode($datos->correo), 1);
    $pdf->Cell(30, 10, utf8_decode($datos->direccion), 1);
    $pdf->Cell(25, 10, $datos->Telefono_numero, 1);
    $pdf->Ln();
}

$pdf->Output();
?>
