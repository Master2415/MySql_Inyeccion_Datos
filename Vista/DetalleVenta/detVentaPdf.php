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
        $this->Cell(90, 10, 'Detalle de Venta - Meats Master', 0, 0, 'C');
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
$pdf->Cell(20, 10, 'ID', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'ID Venta', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'ID Producto', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Producto', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Tipo', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Cantidad', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Precio', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Nombre Cliente', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Apellido', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Fecha Venta', 1, 1, 'C', true);

// Contenido de la tabla
$pdf->SetFont('Arial', '', 12);
include "../../modelo/conexion.php";

// Obtén el ID de la venta, asegúrate de validar y escapar la entrada del usuario
$idVenta = isset($_GET["idVenta"]) ? $_GET["idVenta"] : null;

if ($idVenta !== null) {
    // Realizar una consulta para mostrar todos los detalles de venta
    $sql = $conexion->query("SELECT 
                            dv.codigoDetalle, 
                            p.idProducto, 
                            p.nombre AS nombreProducto, 
                            p.tipoProducto,
                            dv.cantidad, 
                            p.precio,
                            per.nombre AS nombreCliente,
                            per.apellido,
                            v.fecha
                        FROM detalleVenta dv
                        JOIN venta v ON dv.codigoVenta = v.idVenta
                        JOIN producto p ON dv.codigoProducto = p.idProducto
                        JOIN cliente c ON v.Cliente_Persona_cedula = c.Persona_cedula
                        JOIN persona per ON c.Persona_cedula = per.cedula
                        WHERE v.idVenta = $idVenta");

} else {
    // Manejar el caso en que idVenta no está presente en la URL
    echo "ID de venta no proporcionado.";
}

if (!$sql) {
    die("Error en la consulta SQL: " . $conexion->error);
}
while ($datos = $sql->fetch_object()) {
    // Contenido de cada fila
    $pdf->Cell(20, 10, $datos->codigoDetalle, 1);
    $pdf->Cell(20, 10, $idVenta, 1);
    $pdf->Cell(20, 10, $datos->idProducto, 1);
    $pdf->Cell(40, 10, utf8_decode($datos->nombreProducto), 1);
    $pdf->Cell(20, 10, utf8_decode($datos->tipoProducto), 1);
    $pdf->Cell(20, 10, $datos->cantidad, 1);
    $pdf->Cell(20, 10, $datos->precio, 1);
    $pdf->Cell(30, 10, utf8_decode($datos->nombreCliente), 1);
    $pdf->Cell(30, 10, utf8_decode($datos->apellido), 1);
    $pdf->Cell(25, 10, $datos->fecha, 1);
    $pdf->Ln(); // Nueva línea para la siguiente fila
}

$pdf->Output();
?>
