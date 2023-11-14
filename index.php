<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Carnicería XYZ - Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/06d08e46aa.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container mt-5">
        <header class="text-center">
            <h1>Carnicería Meats Master</h1>
        </header>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <!-- Formulario de inicio de sesión -->
                <form action="controlador/Login/login.php" method="POST">
                    <h2 class="mb-4">Iniciar sesión</h2>
                    <!-- Campo de entrada para el nombre de usuario -->
                    <div class="form-group">
                        <input type="text" class="form-control" name="usuario" placeholder="Nombre de usuario" required>
                    </div>
                    <!-- Campo de entrada para la contraseña -->
                    <div class="form-group">
                        <input type="password" class="form-control" name="contrasena" placeholder="Contraseña" required>
                    </div>
                    <!-- Botón para enviar el formulario -->
                    <button type="submit" class="btn btn-primary mt-2" name="login">
                        <i class="fas fa-sign-in-alt"></i> Iniciar sesión
                    </button>
                </form>
                <!-- Enlace para redirigir al formulario de registro -->
                <p class="mt-3">¿No tienes una cuenta? <a href="Vista/Login/registro.html">Regístrate aquí</a></p>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
