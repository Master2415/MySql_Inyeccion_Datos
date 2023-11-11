<?php

include "../../modelo/conexion.php";

$codigo = $_GET["idVenta"];

// Consulta basica para mostrar la informacion de un codigo de venta en especifico
$sql = $conexion->query("SELECT * FROM Venta  WHERE idVenta= $codigo")

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

            <h2 class="text-center">Modificar Venta</h2>

            <input type="hidden" name="idVenta" value="<?= $_GET["idVenta"] ?>">

            <?php

            while ($datos = $sql->fetch_object()) { ?>

                <div class="mb-1">
                    <label for="precio" class="form-label">Total</label>
                    <input type="number" step="0.01" class="form-control" name="total" value="<?= $datos->total ?>">
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha" value="<?= $datos->fecha ?>">
                </div>
                
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Cedula del cliente</label>
                    <input type="text" class="form-control" name="cedula" value="<?= $datos->Cliente_Persona_cedula ?>">
                </div>

            <?php }
            // Modifico la venta del cliente
            include "../../controlador/Venta/modificarVenta.php";
            ?>

            <div class="container">
                <div class="boton text-center mt-5 mb-3">
                    <button type="submit" class="btn btn-primary" name="btnModificarVenta" value="ok">Modificar Venta</button>
                </div>
            </div>
        </form>

    </div>

</body>

</html>

