<?php
// Incluir el controlador
require_once('../controlador/controlador.php');

// Definir los productos a actualizar
$productosReducir = [
    ['nombre' => 'Mario Bros', 'color' => 'Gris'],
    ['nombre' => 'Sonic Sega', 'color' => 'Blanco']
];

// Crear pedido y procesar la actualización de la cantidad de productos al hacer clic en el botón realizarPago
if (isset($_GET["compra_con_exito"])) {
    $fecha_pedido = date("Y-m-d");
    $estado_pedido = "pendiente";
    // Insertar el pedido en la base de datos
    crearPedido($fecha_pedido, $estado_pedido);
    foreach ($productosReducir as $producto) {
        $productoDB = obtenerProductoPorNombreYColor($producto['nombre'], $producto['color']);
        if ($productoDB && $productoDB['cantidad'] > 0) {
            actualizarCantidadProducto($productoDB['id_producto'], $productoDB['cantidad'] - 1);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta</title>
    <link rel="stylesheet" href="../assets/css/stylesCesta.css">
    <script src="https://kit.fontawesome.com/d1fc8a4f6d.js" crossorigin="anonymous"></script>
</head>

<body>
    <main>

        <!-- Volver a la pagina de Inicio -->
        <div class="volverInicioContainer">
            <a href="../index.php" id="volverInicioCentro">Volver a la página de inicio</a>
        </div>

        <!-- Formulario para la cesta -->
        <section id="cesta">
            <div class="cestaTitulo">
                <i class="fa-solid fa-star"></i>
                <h2>Tu compra | Here we go!</h2>
                <i class="fa-solid fa-star"></i>
            </div>
            <!-- Incluir el codigo PHP para el carrito -->
            <!-- Aquí presento una prueba para visualizar como sería -->
            <ul>
                <li class="liUno">
                    <img src="../assets/img/MarioBrosStormGrey.png" alt="Imagen de ropa">
                    <div>
                        <h3>Camiseta</h3>
                        <p>Precio: 19.95€</p>
                        <p>Cantidad: 1</p>
                    </div>
                    <div>
                        <button><i class="fa-solid fa-trash" id="basura1"></i></button>
                    </div>
                </li>
                <li class="liDos">
                    <img src="../assets/img/sonicWhite.png" alt="Imagen de ropa">
                    <div>
                        <h3>Camiseta</h3>
                        <p>Precio: 19.95€</p>
                        <p>Cantidad: 1</p>
                    </div>
                    <div>
                        <button><i class="fa-solid fa-trash" id="basura2"></i></button>
                    </div>
                </li>
                <li>
                    <h3 id="precioTotal">Total: 39.90€</h3>
                </li>
            </ul>
            <div class="cestaBotones">
                <!-- Esto borraría todo el codigo PHP del carrito -->
                <button id="vaciarCesta">Vaciar cesta</button>
                <!-- Esto nos lleva a la realización del pago -->
                <button id="comprarCesta">Comprar</button>
            </div>
            <div class="volverInicioContainer">
                <a href="../index.php" id="volverInicio">Volver a la página de inicio</a>
            </div>
        </section>

        <!-- Formulario para el pago -->
        <section>
            <div class="pago">
                <h1 class="pagoTitulo">Información personal</h1>
                <label>Nombre y apellidos</label>
                <input type="text" class="pagoInput">
                <label>Número de teléfono</label>
                <input type="text" class="pagoInput">
                <label>Dirección</label>
                <input type="text" class="pagoInput">
                <h1 class="pagoTitulo">Información de pago</h1>
                <div class="tarjetaIconos">
                    <img src="../assets/img/visa.png" width="40px" alt="Icono tarjeta" class="tarjetaIcono">
                    <img src="../assets/img/master.png" width="40px" alt="Icono tarjeta" class="tarjetaIcono">
                </div>
                <input type="password" class="pagoInput" placeholder="Número de tarjeta">
                <div class="tarjetaInfo">
                    <input type="text" placeholder="mes" class="pagoInput sm">
                    <input type="text" placeholder="año" class="pagoInput sm">
                    <input type="text" placeholder="cvv" class="pagoInput sm">
                </div>
                <button class="botonComprar" id="botonComprar" name="realizarPago">¡COMPRAR AHORA!</button>
                <i class="cerrarPago fa-solid fa-xmark"></i>
            </div>
        </section>

        <!-- Compra realizada con exito -->
        <section>
            <div class="compraExito">
                <h1>¡Compra realizada con éxito!</h1>
                <p>¡Gracias por confiar en RetroKir!</p>
                <img src="../assets/img/Metakirbi aleta.png" alt="imagen del logo">
                <div class="botonComprar">
                    <a href="../index.php" id="volverInicioFinal">Volver a la página de inicio</a>
                </div>
        </section>

    </main>

    <!-- Importar cesta.js -->
    <script src="../assets/js/cesta.js"></script>

</body>

</html>