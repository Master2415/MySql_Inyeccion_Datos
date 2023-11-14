<?php

// Validamos que el formulario y que el boton registro haya sido presionado
if (!empty($_POST['btnRegistroProducto'])) {
    if (
        //!empty($_POST['codigo']) and
        !empty($_POST['nombreProducto']) and
        !empty($_POST['tipoProducto']) and
        !empty($_POST['cantProducto']) and
        !empty($_POST['precioProducto']) and
        !empty($_POST['fechaIngreso'])
    ) {

        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombreProducto'];
        $tipo = $_POST['tipoProducto'];
        $cant = $_POST['cantProducto'];
        $precio = $_POST['precioProducto'];
        $fecha = $_POST['fechaIngreso'];

        // Insertamos los datos en la base de datos
        $sql = "INSERT INTO producto (idProducto, tipoProducto, nombre, cantidadStock, precio, fechaIngreso) 
        values ('$codigo', '$tipo', '$nombre','$cant', '$precio', '$fecha')";

        $resultado = mysqli_query($conexion, $sql);
        if ($resultado) {
            // Iserción correcta
           //  echo "<div class = 'alert alert-success'>¡Se insertaron los datos correctamente!";
        } else {
            // Iserción fallida
            echo "¡No se puede insertar la informacion!" . "<br>";
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    } else {
        echo "<div class = 'alert alert-warning'>¡Debes llenas todos los campos!</div> ";
    }
}
?>