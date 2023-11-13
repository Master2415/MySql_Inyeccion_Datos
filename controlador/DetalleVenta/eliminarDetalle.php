<script>
    function confirmarEliminar(codigoDetalle) {
        var confirmacion = confirm("¿Está seguro de eliminar este detalle venta?");
        
        if (confirmacion) {
            window.location.href = "detalleVenta.php?eliminar=" + codigoDetalle;
        }
    }
</script>

<?php
if (!empty($_GET["eliminar"])) {
    $codigo = $_GET["eliminar"];

    $sql = $conexion->query("DELETE FROM detalleVenta WHERE codigoDetalle = $codigo");

    if ($sql == 1) {
        //echo "<div class='alert alert-success'>Producto eliminado</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al eliminar el producto</div>";
    }
}
?>