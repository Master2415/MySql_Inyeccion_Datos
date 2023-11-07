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
    </head>

    <body>  
            <h1>Bienvenido</h1>
            <h2 id=Fecha></h2>

            <div class= "container" >
            <a class ="labelAcceso" href="Vista/Login/Login.php">Ingresar</a>
            </div>

            <div class= "container" >              
                <form action="">
                    <input type="text" placeholder="Datos del usuario" name= "txtdate"> 
                </form>
            </div>

            <div class= "container" >
                <div class= "botones">
                <a class ="entrar" href="">Entrar</a>
                <a class ="salir" href="">Salir</a>
                </div>
            </div>
            

            <script>
                // Muestra la fecha en pantalla
                setInterval(() =>{
                let fecha = new Date();
                let fechaHora = fecha.toLocaleString();
                document.getElementById("Fecha").textContent=fechaHora;
                },1000);
            </script>


        <footer>
            <p>Douglas Tabarquino &copy; 2023</p>
        </footer>
    </body>
</html>
