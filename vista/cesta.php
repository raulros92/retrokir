<?php
// Incluir el controlador
require_once('../controlador/controlador.php');

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
                    <h3>Total: 39.90€</h3>
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

    </main>

    <!-- Importar productos.js -->
    <script src="../assets/js/productos.js"></script>
    <!-- Importar main.js -->
    <script src="../assets/js/cesta.js"></script>

</body>

</html>