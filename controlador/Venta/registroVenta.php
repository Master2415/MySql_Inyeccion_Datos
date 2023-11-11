<?php

// Validamos que el formulario y que el botón registro hayan sido presionados
if (!empty($_POST['btnRegistroVenta'])) {
    if (
        !empty($_POST['idVenta']) and
        !empty($_POST['total']) and
        !empty($_POST['fecha']) and
        !empty($_POST['cedula'])
    ) {
        include "../../modelo/conexion.php";

        $codigo = $_POST['idVenta'];
        $total = $_POST['total'];
        $fecha = $_POST['fecha'];
        $cedula = $_POST['cedula'];

        // Verificar si el cliente existe
        $sqlCliente = "SELECT * FROM cliente WHERE Persona_cedula = '$cedula'";
        $resultadoCliente = mysqli_query($conexion, $sqlCliente);

        if (mysqli_num_rows($resultadoCliente) > 0) {
            // El cliente existe, insertar la venta
            $sqlInsertVenta = "INSERT INTO venta (idVenta, total, fecha, Cliente_Persona_cedula) 
            VALUES ('$codigo', '$total', '$fecha', '$cedula')";

            $resultadoInsertVenta = mysqli_query($conexion, $sqlInsertVenta);

            if ($resultadoInsertVenta) {
                // Venta registrada correctamente
                echo "<div class='alert alert-success'>Venta registrada correctamente</div>";
            } else {
                // Error al insertar la venta
                echo "<div class='alert alert-danger'>Error al registrar la venta</div>";
                echo "Error: " . $sqlInsertVenta . "<br>" . mysqli_error($conexion);
            }
        } else {
            // El cliente no existe, mostrar mensaje de error
            echo "<div class='alert alert-danger'>¡El cliente con la cédula '$cedula' no existe en los clientes registrados !</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>¡Debes llenar todos los campos!</div>";
    }
}

?>


