<script>
    function confirmarEliminar(idVenta) {
        var confirmacion = confirm("¿Está seguro de eliminar esta venta?");
        
        if (confirmacion) {
            window.location.href = "venta.php?eliminar=" + idVenta;
        }
    }
</script>

<?php
if (!empty($_GET["eliminar"])) {
    $codigo = $_GET["eliminar"];

    $sql = $conexion->query("DELETE FROM venta WHERE idVenta = $codigo");

    if ($sql == 1) {
        //echo "<div class='alert alert-success'>Producto eliminado</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al eliminar el producto</div>";
    }
}
?>