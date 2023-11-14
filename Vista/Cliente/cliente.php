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
        include "../../modelo/conexion.php";
        include "../../controlador/Cliente/eliminarCliente.php";
        ?>

        <div class="row mt-4">

            <form class="col-md-3" method="POST" style="background-color: #E6E6E6; color: #343a40;">

                <h2 class="text-center mt-5 mb-10" style="color: #007bff;">Cliente</h2>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Apellido</label>
                    <input type="text" class="form-control" name="apellido">
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Cedula</label>
                    <input type="text" class="form-control" name="cedula">
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
                    <input type="text" class="form-control" name="correo">
                </div>

                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="direccion">
                </div>

                <div class="mb-1">
                    <label for="precio" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="Telefono_numero">
                </div>

                <div class="container">
                    <div class="boton text-center mt-5 mb-3">
                        <button type="submit" class="btn btn-primary" name="btnRegistroCliente" value="ok">Ingresar Cliente</button>
                    </div>
                </div>

                <?php
                include "../../controlador/Cliente/registroCliente.php";
                ?>

            </form>


            <div class="col-md-9 bg-light p-3">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Telefono</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        // Mostrar los daros en la tabla
                        include "../../modelo/conexion.php";

                        // Realizo una consulta para mostrar todo los clientes
                        $sql = $conexion->query("SELECT persona.nombre, persona.apellido, persona.cedula, ciudad.nombre AS ciudad, persona.correo, persona.direccion, persona.Telefono_numero
                        FROM cliente
                        JOIN persona ON cliente.Persona_cedula = persona.cedula
                        JOIN ciudad ON persona.Ciudad_idCiudad = ciudad.idCiudad");

                        if (!$sql) {
                            die("Error en la consulta SQL: " . $conexion->error);
                        }
                        while ($datos = $sql->fetch_object()) { ?>

                            <tr>
                                <td><?= $datos->nombre ?></td>
                                <td><?= $datos->apellido ?></td>
                                <td><?= $datos->cedula ?></td>
                                <td><?= $datos->ciudad ?></td>
                                <td><?= $datos->correo ?></td>
                                <td><?= $datos->direccion ?></td>
                                <td><?= $datos->Telefono_numero ?></td>

                                <td>
                                    <a href="modificar.php?cedula=<?= $datos->cedula ?>" class="btn btn-small btn-warning"><i class="fas fa-newspaper"></i></a>
                                    <?php
                                    //<a href="producto.php?codigo=<?= $datos->idProducto  " class="btn btn-small btn-danger"><i class="fas fa-delete-left"></i></a>
                                    ?>
                                    <a href="#" class="btn btn-small btn-danger" onclick="confirmarEliminar(<?= $datos->cedula ?>)"><i class="fas fa-delete-left"></i></a>
                                </td>
                            </tr>

                        <?php }
                        ?>

                    </tbody>
                </table>
            </div>
            <a class="btn btn-warning btn-menu" href="clientePdf.php"><i class="fa-regular fa-file-pdf"></i> Generar</a>
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