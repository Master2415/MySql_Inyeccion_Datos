<?php

if (!empty($_POST["btnModificarProducto"])) {
    if (
 
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

        $sql=$conexion->query("update producto set 
        nombre= '$nombre', 
        tipoProducto='$tipo', 
        cantidadStock= '$cant', 
        precio='$precio', 
        fechaIngreso='$fecha' 
        
        where idProducto=$codigo ");

        if($sql == 1){
            header(("location: producto.php"));
        }else{
            echo "<div class = 'alert alert-danger'>Error al modificar el producto </div> ";
        }


    } else {
        echo "<div class = 'alert alert-warning'>¡Debes llenas todos los campos!</div> ";
    }
}
