<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/06d08e46aa.js" crossorigin="anonymous"></script>

</head>

<body>

    <h1 class="text-center p-2">CRUD EXPENDIO</h1>

    <div class="container">
        <div class="row">
            <form class="col-3">

                <h2 class="text-center">Productos</h2>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Codigo</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Nombre del producto</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Tipo de producto</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Cantidad de ingreso</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mb-1">
                    <label for="precio" class="form-label">Precio del producto</label>
                    <input type="number" step="0.01" class="form-control" id="precio" aria-describedby="precioHelp">
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Fecha de ingreso</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="container">
                    <div class="boton text-center mt-5 mb-3">
                        <button type="IngresarProducto" class="btn btn-primary">Ingresar Producto</button>
                    </div>
                </div>
            </form>

            <div class="row col-9 p-3">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Fecha de ingreso</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        include "../../modelo/conexion.php";
                        $sql = $conexion->query("select * from producto");
                        if (!$sql) {
                            die("Error en la consulta SQL: " . $conexion->error);
                        }
                        while ($datos = $sql->fetch_object()) { ?>

                            <tr>
                                <td><?= $datos->idProducto ?></td>
                                <td><?= $datos->tipoProducto ?></td>
                                <td><?= $datos->nombre ?></td>
                                <td><?= $datos->cantidadStock ?></td>
                                <td><?= $datos->precio ?></td>
                                <td><?= $datos->fechaIngreso ?></td>
                                <td>
                                    <a href="" class="btn btn-small btn-warning"><i class="fas fa-newspaper"></i></a>
                                    <a href="" class="btn btn-small btn-danger"><i class="fas fa-delete-left"></i></a>
                                </td>
                            </tr>

                        <?php }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>