
<?php

// Validamos que el formulario y que el botón registro hayan sido presionados
if (!empty($_POST['btnRegistrarDetalleVenta'])) {
    if (
        !empty($_POST['codigoVenta']) and
        !empty($_POST['codigoProducto']) and
        !empty($_POST['cant']) and
        !empty($_POST['desc'])
    ) {
        include "../../modelo/conexion.php";

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
            // Tanto el producto como la venta existen, insertar un nuevo detalleVenta
            $sqlInsertDetalleVenta = "INSERT INTO detalleVenta (codigoVenta, codigoProducto, cantidad, descripcionProducto) 
                VALUES ('$codigoV', '$codigoP', '$cant', '$desc')";

            $resultadoInsertDetalleVenta = mysqli_query($conexion, $sqlInsertDetalleVenta);

            if ($resultadoInsertDetalleVenta) {
                // DetalleVenta insertado correctamente
                echo "<div class='alert alert-success'>Detalle de Venta insertado correctamente</div>";
            } else {
                // Error al insertar el detalleVenta
                echo "<div class='alert alert-danger'>Error al insertar el detalleVenta</div>";
                echo "Error: " . $sqlInsertDetalleVenta . "<br>" . mysqli_error($conexion);
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

