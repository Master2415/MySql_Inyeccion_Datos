<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página Web</title>
    <link rel="stylesheet" href="Estilo/inicio.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,200&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/06d08e46aa.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <header class="text-center mt-4">
            <h1 class="text-center p-3" style="color: #C20000;">Meats Master</h1>
            <h1><i class="fas fa-cubes"></i> Gestion de Inventario</h1>
        </header>

        <h2 id="Fecha"></h2>

        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <a class="btn btn-primary btn-block mb-3" href="Vista/Producto/producto.php"><i class="fas fa-box"></i> Productos</a>
                <a class="btn btn-success btn-block mb-3" href="Vista/Cliente/cliente.php"><i class="fas fa-users"></i> Clientes</a>
                <a class="btn btn-info btn-block mb-3" href="Vista/Venta/venta.php"><i class="fas fa-cash-register"></i> Ventas</a>

            </div>
        </div>


    </div>

    <footer class="text-center mt-5">
        <p>Douglas Tabarquino &copy; 2023</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>