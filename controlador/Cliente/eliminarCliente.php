<script>
    function confirmarEliminar(cedula) {
        var confirmacion = confirm("¿Está seguro de eliminar este cliente?");
        
        if (confirmacion) {
            window.location.href = "cliente.php?eliminar=" + cedula;
        }
    }
</script>

<?php
if (!empty($_GET["eliminar"])) {
    $cedula = $_GET["eliminar"];

    //Solo lo elimino de la tabla cliente mas no de la tabla persona
    $sql = $conexion->query("DELETE FROM cliente WHERE Persona_cedula = $cedula");

    // elimina de la tabla 'persona'
    // $sqlPersona = $conexion->query("DELETE FROM persona WHERE cedula = $cedula");


    if ($sql == 1) {
        //echo "<div class='alert alert-success'>Producto eliminado</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al eliminar el cliente </div>";
    }
}
?>
