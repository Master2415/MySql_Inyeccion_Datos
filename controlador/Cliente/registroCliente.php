<?php

// Validamos que el formulario y que el botón registro haya sido presionado
if (!empty($_POST['btnRegistroCliente'])) {
    if (
        !empty($_POST['cedula']) and
        !empty($_POST['nombre']) and
        !empty($_POST['apellido']) and
        !empty($_POST['ciudad']) and
        !empty($_POST['correo']) and
        !empty($_POST['direccion']) and
        !empty($_POST['Telefono_numero'])
    ) {
        include "../../modelo/conexion.php";

        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $ciudad = $_POST['ciudad'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        $Telefono_numero = $_POST['Telefono_numero'];

        // Insertamos los datos en la base de datos (tabla persona)
        $sqlInsertPersona = "INSERT INTO persona (cedula, nombre, apellido,  direccion, correo, Telefono_numero, Ciudad_idCiudad) 
        VALUES ('$cedula', '$nombre', '$apellido', '$direccion', '$correo', '$Telefono_numero', '$ciudad')";

        $resultadoInsertPersona = mysqli_query($conexion, $sqlInsertPersona);

        if ($resultadoInsertPersona) {
            // Inserta el nuevo cliente asociado a la persona (tabla cliente)
            $sqlInsertCliente = "INSERT INTO cliente (Persona_cedula) VALUES ('$cedula')";
            $resultadoInsertCliente = mysqli_query($conexion, $sqlInsertCliente);

            if ($resultadoInsertCliente) {
                // echo "<div class='alert alert-success'>¡Se insertaron los datos correctamente!";
            } else {
                // Si hay un problema al insertar en la tabla cliente, puedes realizar un rollback en la inserción de persona.
                mysqli_query($conexion, "ROLLBACK");
                echo "¡No se puede insertar la información del cliente!" . "<br>";
                echo "Error: " . $sqlInsertCliente . "<br>" . mysqli_error($conexion);
            }
        } else {
            // Inserción fallida en la tabla persona
            echo "¡No se puede insertar la información de la persona!" . "<br>";
            echo "Error: " . $sqlInsertPersona . "<br>" . mysqli_error($conexion);
        }
    } else {
        echo "<div class='alert alert-warning'>¡Debes llenar todos los campos!</div>";
    }
}

?>

