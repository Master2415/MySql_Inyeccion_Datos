<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/06d08e46aa.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: #B6B6B6; color: #343a40;">


<div class="container-fluid" style="padding: 10px;">


        <header class="text-center p-3" >
            <h1>Meats Master</h1>
            <h2></h2>
            <h2 id="Fecha"></h2>
        </header>

       

        <?php
        include "../../modelo/conexion.php";
        include "../../controlador/DetalleVenta/eliminarDetalle.php";
        ?>

        <div class="row mt-3">  
        <?php
        // En caso de querer modificar la tabla se quita la documentacion y hay que agragar la linea vacia donde se ubican los botones "<th scope="col"></th>"
        /*

            <form class="col-md-3 bg-light p-3" method="POST">

                <h3 class="text-center mb-4" style="color: #007bff;">Detalle de Venta</h3>

                <div class="mb-3">
                    <label for="codigoVenta" class="form-label">Código de Venta</label>
                    <input type="text" class="form-control" name="codigoVenta">
                </div>

                <div class="mb-3">
                    <label for="codigoProducto" class="form-label">Código del Producto</label>
                    <input type="text" class="form-control" name="codigoProducto">
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" step="0.01" class="form-control" name="cant">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="desc">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="btnRegistrarDetalleVenta" value="ok">Agregar Detalle Venta</button>
                </div>

                <?php
                include "../../controlador/DetalleVenta/registroDetalleVenta.php";
                ?>

            </form>

            */
            ?>

            <div class=" container-fluid col-md-9 bg-light p-3">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ID Venta</th>
                            <th scope="col">ID Producto</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Cédula del Cliente</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Apellido</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        // Mostrar los datos en la tabla
                        include "../../modelo/conexion.php";

                        // Realizar una consulta para mostrar todos los detalles de venta
                        $sql = $conexion->query("SELECT 
                            dv.codigoDetalle, 
                            v.idVenta, 
                            p.idProducto, 
                            p.nombre AS nombreProducto, 
                            P.tipoProducto,
                            dv.cantidad, 
                            dv.descripcionProducto,
                            c.Persona_cedula,
                            per.nombre AS nombreCliente,
                            per.apellido AS apellidoCliente
                        FROM detalleVenta dv
                        JOIN venta v ON dv.codigoVenta = v.idVenta
                        JOIN producto p ON dv.codigoProducto = p.idProducto
                        JOIN cliente c ON v.Cliente_Persona_cedula = c.Persona_cedula
                        JOIN persona per ON c.Persona_cedula = per.cedula;");

                        if (!$sql) {
                            die("Error en la consulta SQL: " . $conexion->error);
                        }
                        while ($datos = $sql->fetch_object()) { ?>

                            <tr>
                                <td><?= $datos->codigoDetalle ?></td>
                                <td><?= $datos->idVenta ?></td>
                                <td><?= $datos->idProducto ?></td>
                                <td><?= $datos->nombreProducto ?></td>
                                <td><?= $datos->tipoProducto ?></td>
                                <td><?= $datos->cantidad ?></td>
                                <td><?= $datos->descripcionProducto ?></td>
                                <td><?= $datos->Persona_cedula ?></td>
                                <td><?= $datos->nombreCliente ?></td>
                                <td><?= $datos->apellidoCliente ?></td>

                                
                                <td>
                                    <a href="modificar.php?codigoDetalle=<?= $datos->codigoDetalle ?>" class="btn btn-small btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger" onclick="confirmarEliminar(<?= $datos->codigoDetalle ?>)"><i class="fas fa-trash"></i></a>
                                </td>
                                

                            </tr>

                        <?php }
                        ?>

                    </tbody>
                </table>
            </div>
            <a class="btn btn-warning btn-menu" href="detalleVentaPdf.php"><i class="fa-regular fa-file-pdf"></i> Generar</a>
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