<?php

include "../../modelo/conexion.php";

$cedula = $_GET["cedula"];

// combino ambas tablas con el fin de mostrar los datos ya registrados en el campo de texto
$sql = $conexion->query("SELECT cliente.*, persona.* FROM cliente
JOIN persona ON cliente.Persona_cedula = persona.cedula
WHERE cliente.Persona_cedula = $cedula")

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        /* Estilo para el contenedor con color de fondo */
        .formulario-container {
            background-color: #e0e0e0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="formulario-container">

        <form class="col-5 p-3 m-auto" method="POST">

            <h2 class="text-center">Modificar Cliente</h2>

            <input type="hidden" name="cedula" value="<?= $_GET["cedula"] ?>">

            <?php

            while ($datos = $sql->fetch_object()) { ?>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre ?>">
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Apellido</label>
                    <input type="text" class="form-control" name="apellido" value="<?= $datos->apellido ?>">
                </div>

                <div class="mb-1">
                    <label for="ciudad" class="form-label">Ciudad</label>
                    <select class="form-select" name="ciudad" id="ciudad" required>
                        <option value="" disabled selected>Selecciona una ciudad</option>
                        <option value="1">Medellin</option>
                        <option value="2">Bogotá</option>
                        <option value="3">Cali</option>
                        <option value="4">Barranquila</option>
                        <option value="5">Bucaramanga</option>
                        <option value="6">Cartagena</option>
                        <option value="7">Pereira</option>
                        <option value="8">Cúcuta</option>
                        <option value="9">Manizales</option>
                        <option value="10">Villavicencio</option>
                    </select>
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
                    <input type="text" class="form-control" name="correo" value="<?= $datos->correo ?>">
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="direccion" value="<?= $datos->direccion ?>">
                </div>

                <div class="mb-1">
                    <label for="precio" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="Telefono_numero" value="<?= $datos->Telefono_numero ?>">
                </div>

            <?php }
            // Modifico el cliente
            include "../../controlador/Cliente/modificarCliente.php";
            ?>

            <div class="container">
                <div class="boton text-center mt-5 mb-3">
                    <button type="submit" class="btn btn-primary" name="btnModificarCliente" value="ok">Modificar Cliente</button>
                </div>
            </div>
        </form>

    </div>

</body>

</html>

