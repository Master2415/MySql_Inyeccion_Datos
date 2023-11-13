<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/06d08e46aa.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: #B6B6B6; color: #343a40;">

        <div class="container">
        <header class="text-center p-3" style="color: #C20000;">
            <h1>Meats Master</h1>
            <h2></h2>
        </header>

        <h2 id="Fecha"></h2>
    
        <?php                       
        include "../../controlador/Producto/eliminarProducto.php";
        ?>
    

    <div class="row mt-4">

            <form class="col-md-3" method="POST" style="background-color: #E6E6E6; color: #343a40;">

                <h2 class="text-center mt-5 mb-10" style="color: #007bff;">Producto</h2>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Codigo</label>
                    <input type="text" class="form-control" name="codigo">
                </div>

                <div class="mb-1">
                    <label for="tipoProducto" class="form-label">Tipo de producto</label>
                    <select class="form-select" name="tipoProducto" id="tipoProducto" required>
                        <option value="" disabled selected>Selecciona un tipo</option>
                        <option value="Res">Res</option>
                        <option value="Cerdo">Cerdo</option>
                        <option value="Pollo">Pollo</option>
                        <option value="Embutido">Embutido</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Nombre del producto</label>
                    <input type="text" class="form-control" name="nombreProducto">
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Cantidad de ingreso *Kg</label>
                    <input type="number" step="0.01" class="form-control" name="cantProducto">
                </div>

                <div class="mb-1">
                    <label for="precio" class="form-label">Precio del producto *Kg</label>
                    <input type="number" step="0.01" class="form-control" name="precioProducto">
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Fecha de ingreso</label>
                    <input type="date" class="form-control" name="fechaIngreso">
                </div>

                <div class="container">
                    <div class="boton text-center mt-5 mb-3">
                        <button type="IngresarProducto" class="btn btn-primary" name="btnRegistroProducto" value="ok">Ingresar Producto</button>
                    </div>
                </div>

                <?php
                include "../../controlador/Producto/registroProducto.php";
                ?>

            </form>

            <div class="col-md-9 bg-light p-3">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad Kg</th>
                            <th scope="col">Precio Kg</th>
                            <th scope="col">Fecha de ingreso</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        // Mostrar los daros en la tabla
                        include "../../modelo/conexion.php";

                        // Realizo una consulta para mostrar todo los productos
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
                                    <a href="modificar.php?codigo=<?= $datos->idProducto ?>" class="btn btn-small btn-warning"><i class="fas fa-newspaper"></i></a>
                                    <?php
                                    //<a href="producto.php?codigo=<?= $datos->idProducto  " class="btn btn-small btn-danger"><i class="fas fa-delete-left"></i></a>
                                    ?>
                                    <a href="#" class="btn btn-small btn-danger" onclick="confirmarEliminar(<?= $datos->idProducto ?>)"><i class="fas fa-delete-left"></i></a>
                                </td>
                            </tr>

                        <?php }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5">
        <p>Douglas Tabarquino &copy; 2023</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        // Muestra la fecha en pantalla
        setInterval(() => {
            let fecha = new Date();
            let fechaHora = fecha.toLocaleString();
            document.getElementById("Fecha").textContent = fechaHora;
        }, 1000);
    </script>
</body>

</html>