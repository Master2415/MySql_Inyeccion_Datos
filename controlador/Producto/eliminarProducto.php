<script>
    function confirmarEliminar(codigo) {
        var confirmacion = confirm("¿Está seguro de eliminar este producto?");
        
        if (confirmacion) {
            window.location.href = "producto.php?eliminar=" + codigo;
        }
    }
</script>

<?php
if (!empty($_GET["eliminar"])) {
    $codigo = $_GET["eliminar"];

    $sql = $conexion->query("DELETE FROM producto WHERE idProducto = $codigo");

    if ($sql == 1) {
        //echo "<div class='alert alert-success'>Producto eliminado</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al eliminar el producto</div>";
    }
}
?>
