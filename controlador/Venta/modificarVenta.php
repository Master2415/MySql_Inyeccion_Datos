<?php

if (!empty($_POST["btnModificarVenta"])) {
    if (    
        !empty($_POST['total']) &&
        !empty($_POST['fecha']) &&
        !empty($_POST['cedula']) 
    ) {
        $idVenta = $_POST['idVenta'];
        $total = $_POST['total'];
        $fecha = $_POST['fecha'];
        $cedula = $_POST['cedula'];

        // Actualizo la venta mediante si identificacion
        $sql = $conexion->query("UPDATE venta set 
        total = '$total', 
        fecha = '$fecha', 
        Cliente_Persona_cedula = '$cedula' 
        WHERE idVenta = $idVenta");

        if ($sql == 1) {
            header("location: venta.php");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar la venta</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>¡Debes llenar todos los campos!</div>";
    }
}

?>
