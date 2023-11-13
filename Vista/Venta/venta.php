<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario - Meats Master</title>
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

        <div class="row mt-4">
            <form class="col-md-3" method="POST" style="background-color: #E6E6E6; color: #343a40;">

                <h2 class="text-center mt-5 mb-10" style="color: #007bff;">Venta</h2>

                <div class="mb-3">
                    <label for="idVenta" class="form-label">Codigo</label>
                    <input type="text" class="form-control" name="idVenta" required>
                </div>

                <div class="mb-3">
                    <label for="total" class="form-label">Total venta</label>
                    <input type="number" step="0.01" class="form-control" name="total" required>
                </div>

                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha" required>
                </div>

                <div class="mb-3">
                    <label for="cedula" class="form-label">Cedula del cliente</label>
                    <input type="text" class="form-control" name="cedula" required>
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary" name="btnRegistroVenta" value="ok">Ingresar Venta</button>
                </div>

                <?php
                include "../../controlador/Venta/registroVenta.php";
                ?>

            </form>

            <div class="col-md-9 bg-light p-3">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Total del venta</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Cedula cliente</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        // Mostrar los datos en la tabla
                        include "../../modelo/conexion.php";

                        // Realizar una consulta para mostrar todas las ventas
                        $sql = $conexion->query("SELECT * FROM venta");

                        if (!$sql) {
                            die("Error en la consulta SQL: " . $conexion->error);
                        }
                        while ($datos = $sql->fetch_object()) { ?>

                            <tr>
                                <td><?= $datos->idVenta ?></td>
                                <td><?= $datos->total ?></td>
                                <td><?= $datos->fecha ?></td>
                                <td><?= $datos->Cliente_Persona_cedula ?></td>
                                <td>
                                    <a href="../DetalleVenta/detVenta.php?idVenta=<?= $datos->idVenta ?>" class="btn btn-info me-2"><i class="fas fa-info-circle"></i> Detalle</a>
                                    <a href="modificar.php?idVenta=<?= $datos->idVenta ?>" class="btn btn-warning me-2"><i class="fas fa-edit"></i> </a>
                                    <a href="#" class="btn btn-danger" onclick="confirmarEliminar(<?= $datos->idVenta ?>)"><i class="fas fa-trash"></i> </a>
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