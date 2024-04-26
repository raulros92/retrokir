<?php
require_once('../controlador/controlador.php');

// Verificar si se ha enviado el formulario de realizar pedido

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $fecha_pedido = $_POST['fecha_pedido'];
    $estado_pedido = $_POST['estado_pedido'];

    // Insertar el pedido en la base de datos
    crearPedido($fecha_pedido, $estado_pedido);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Pedido</title>
</head>

<body>
    <h1>Realizar Pedido</h1>
    <form action="pruebaPedido.php" method="post">
        <label for="fecha_pedido">Fecha del pedido:</label>
        <input type="date" id="fecha_pedido" name="fecha_pedido" required><br><br>

        <label for="estado_pedido">Estado del pedido:</label>
        <select id="estado_pedido" name="estado_pedido" required>
            <option value="pendiente">Pendiente</option>
            <option value="completado">Completado</option>
            <option value="cancelado">Cancelado</option>
        </select><br><br>

        <button type="submit" name="submit">Realizar Pedido</button>
    </form>
</body>

</html>