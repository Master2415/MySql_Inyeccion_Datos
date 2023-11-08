<?php

include "../../modelo/conexion.php";

$codigo = $_GET["codigo"];

$sql = $conexion->query("select * from producto where idProducto=$codigo")

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

            <h2 class="text-center">Modificar producto</h2>

            <input type="hidden" name="codigo" value="<?= $_GET["codigo"]?>">

            <?php

            while ($datos = $sql->fetch_object()) { ?>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Codigo</label>
                    <input type="text" class="form-control" name="codigo" value="<?= $datos->idProducto ?>">
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Nombre del producto</label>
                    <input type="text" class="form-control" name="nombreProducto" value="<?= $datos->nombre ?>">
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Tipo de producto</label>
                    <input type="text" class="form-control" name="tipoProducto" value="<?= $datos->tipoProducto ?>">
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Cantidad de ingreso *Kg</label>
                    <input type="number" step="0.01" class="form-control" name="cantProducto" value="<?= $datos->cantidadStock ?>">
                </div>

                <div class="mb-1">
                    <label for="precio" class="form-label">Precio del producto *Kg</label>
                    <input type="number" step="0.01" class="form-control" name="precioProducto" value="<?= $datos->precio ?>">
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Fecha de ingreso</label>
                    <input type="date" class="form-control" name="fechaIngreso" value="<?= $datos->fechaIngreso ?>">
                </div>

            <?php }

                include "../../controlador/Producto/modificarProducto.php";

            ?>

            <div class="container">
                <div class="boton text-center mt-5 mb-3">
                    <button type="IngresarProducto" class="btn btn-primary" name="btnModificarProducto" value="ok">Modificar Producto</button>
                </div>
            </div>

        </form>

    </div>

</body>

</html>