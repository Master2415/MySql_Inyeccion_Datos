<?php
// clase controlador para el boton de registrar

include "../../modelo/conexion.php";

// Validamos que el formulario y que el botón registro hayan sido presionados
if (!empty($_POST['btnModificarDetalleVenta'])) {
    if (
        //!empty($_POST['codigoDetalle']) &&
        !empty($_POST['codigoVenta']) &&
        !empty($_POST['codigoProducto']) &&
        !empty($_POST['cant']) &&
        !empty($_POST['desc'])
    ) {
        $codigoDetalle = $_POST['codigoDetalle'];
        $codigoV = $_POST['codigoVenta'];
        $codigoP = $_POST['codigoProducto'];
        $cant = $_POST['cant'];
        $desc = $_POST['desc'];

        // Actualizar detalleVenta mediante query
        $sql = $conexion->query("UPDATE detalleVenta SET 
            codigoVenta = '$codigoV',
            codigoProducto = '$codigoP', 
            cantidad = $cant, 
            descripcionProducto = '$desc'
            WHERE codigoDetalle = $codigoDetalle");

        if ($sql==1) {
            header("location: detalleVenta.php");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar el detalle de venta</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>¡Debes llenar todos los campos!</div>";
    }
}
?>
