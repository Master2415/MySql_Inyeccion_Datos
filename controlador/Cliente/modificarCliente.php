<?php

if (!empty($_POST["btnModificarCliente"])) {
    if (    
        !empty($_POST['nombre']) &&
        !empty($_POST['apellido']) &&
        !empty($_POST['cedula']) &&
        !empty($_POST['ciudad']) &&
        !empty($_POST['correo']) &&
        !empty($_POST['direccion']) &&
        !empty($_POST['Telefono_numero'])
    ) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $ciudad = $_POST['ciudad'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['Telefono_numero'];

        // Hago uso de JOIN para combinar la tabla cliente y persona en funcion de la siguiente relacion
        // c.Persona_cedula = p.cedula
        // con el fin de actualizar las columnas de la tabla persona desde el cliente, se modifica como tal el cliente 
        $sql = $conexion->query("UPDATE cliente c
        JOIN persona p ON c.Persona_cedula = p.cedula
        SET 
            p.nombre = '$nombre',
            p.apellido = '$apellido',
            p.Ciudad_idCiudad = '$ciudad', 
            p.correo = '$correo', 
            p.direccion = '$direccion', 
            p.Telefono_numero = '$telefono'
        WHERE c.Persona_cedula = $cedula");

        if ($sql == 1) {
            header("location: cliente.php");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar el cliente</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>¡Debes llenar todos los campos!</div>";
    }
}

?>
