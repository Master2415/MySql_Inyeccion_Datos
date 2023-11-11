<?php

// Validamos que el formulario y que el botón registro hayan sido presionados
if (!empty($_POST['btnRegistrarDetalleVenta'])) {
    if (
        //!empty($_POST['codigoDetalle']) and
        !empty($_POST['codigoVenta']) and
        !empty($_POST['codigoProducto']) and
        !empty($_POST['cant']) and
        !empty($_POST['desc'])
    ) {
        include "../../modelo/conexion.php";

        $codigoDetalle = $_POST['codigoDetalle'];
        $codigoV = $_POST['codigoVenta'];
        $codigoP = $_POST['codigoProducto'];
        $cant = $_POST['cant'];
        $desc = $_POST['desc'];

        // Verificar si el producto existe
        $sqlProducto = "SELECT * FROM producto WHERE idProducto = '$codigoP'";
        $resultadoProducto = mysqli_query($conexion, $sqlProducto);

        // Verificar si la venta existe
        $sqlVenta = "SELECT * FROM venta WHERE idVenta = '$codigoV'";
        $resultadoVenta = mysqli_query($conexion, $sqlVenta);

        if (mysqli_num_rows($resultadoProducto) > 0 && mysqli_num_rows($resultadoVenta) > 0) {
            // Tanto el producto como la venta existen, actualizar el detalleVenta
            $sqlUpdateDetalleVenta = "UPDATE detalleVenta 
                SET codigoVenta = '$codigoV', 
                    codigoProducto = '$codigoP', 
                    cantidad = '$cant', 
                    descripcionProducto = '$desc'
                WHERE codigoDetalle = '$codigoDetalle'";

            $resultadoUpdateDetalleVenta = mysqli_query($conexion, $sqlUpdateDetalleVenta);

            if ($resultadoUpdateDetalleVenta) {
                // DetalleVenta actualizado correctamente
                echo "<div class='alert alert-success'>DetalleVenta actualizado correctamente</div>";
            } else {
                // Error al actualizar el detalleVenta
                echo "<div class='alert alert-danger'>Error al actualizar el detalleVenta</div>";
                echo "Error: " . $sqlUpdateDetalleVenta . "<br>" . mysqli_error($conexion);
            }
        } else {
            // El producto o la venta no existe, mostrar mensaje de error
            echo "<div class='alert alert-danger'>¡El producto o la venta con el código '$codigoP' o '$codigoV' no existe en los registros correspondientes!</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>¡Debes llenar todos los campos!</div>";
    }
}

?>
