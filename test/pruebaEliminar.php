<?php
require_once('../controlador/controlador.php');

// Definir los productos a actualizar
$productosReducir = [
    ['nombre' => 'Mario Bros', 'color' => 'Gris'],
    ['nombre' => 'Sonic Sega', 'color' => 'Blanco']
];

// Procesar la actualización de la cantidad de productos al hacer clic en el botón
if (isset($_GET['reducir_cantidad'])) {
    foreach ($productosReducir as $producto) {
        $productoDB = obtenerProductoPorNombreYColor($producto['nombre'], $producto['color']);
        if ($productoDB && $productoDB['cantidad'] > 0) {
            actualizarCantidadProducto($productoDB['id_producto'], $productoDB['cantidad'] - 1);
        }
    }
    echo "Cantidad de productos reducida correctamente.";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Reducir Cantidad Productos</title>
</head>

<body>
    <h1>Prueba Reducir Cantidad Productos</h1>
    <button onclick="reducirCantidad()">Reducir Cantidad Productos</button>

    <script>
        function reducirCantidad() {
            window.location.href = 'pruebaEliminar.php?reducir_cantidad=true';
        };
    </script>
</body>

</html>