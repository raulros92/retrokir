<?php
// Incluir el controlador
session_start();
require_once('controlador/controlador.php');

// Verificar si se ha enviado un formulario de inicio de sesión
if (isset($_POST['submit_login'])) {
    // Obtener los datos del formulario
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Llamar a la función iniciarSesion del controlador
    iniciarSesion($email, $password);
}

// Verificar si se ha enviado una solicitud para cerrar sesión
if (isset($_GET['cerrarSesion'])) {
    // Llamar a la función cerrarSesion del controlador
    cerrarSesion();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Enlaces a fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=VT323&display=swap" rel="stylesheet">
    <!-- Enlaces a iconos -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <script src="https://kit.fontawesome.com/d1fc8a4f6d.js" crossorigin="anonymous"></script>
    <!-- Enlaces a estilos CSS -->
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- Enlaces a Bulma -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
    <title>Retrokir</title>
</head>

<body>

    <nav id="nav">
        <div class="navLogo">
            <div class="navObjeto" id="navLogoImg">
                <img src="assets/img/Metakirbi aleta.png" alt="logo-retrokir" class="logoRetrokir">
                <a id="logoLink" href="index.php">
                    <p id="logoTexto">RetroKir</p>
                </a>
            </div>
        </div>
        <!-- Sección de contacto -->
        <div class="Contactar">
            <a href="https://www.tiktok.com/@retrokir" target="_blank" class="tiktokIcon"><i class="fab fa-tiktok"></i></a>
            <a href="#formulario" class="contactanos">¡Contacta con nosotros!</a>
        </div>
        <!-- Botones de navegación -->
        <div class="navBotones">
            <?php
            // Mostrar nombre de usuario y botón de cerrar sesión si hay una sesión iniciada
            if (isset($_SESSION['email'])) {
                echo "<p class='navBienvenido'>Bienvenido, " . $_SESSION['email'] . "</p>";
                echo "<a href='index.php?cerrarSesion=true' class='navBoton'>Cerrar Sesión</a>";
                echo "<a href='vista/cesta.php' class='navBoton cesta'><i class='fas fa-shopping-cart'></i></a>";
            } else {
                // Mostrar mensaje de error si las credenciales son incorrectas
                if (isset($_SESSION['mensaje_error'])) {
                    echo "<p>{$_SESSION['mensaje_error']}</p>";
                    unset($_SESSION['mensaje_error']);
                }
                // Mostrar los botones "Crear una cuenta" e "Iniciar Sesión"
                echo '<a href="#" id="iniciarSesion" class="navBoton">Iniciar Sesión</a>';
                echo '<a href="vista/registro.php" class="navBoton">Crear una cuenta</a>';
            }
            ?>
        </div>
    </nav>

    <?php
    $menuItems = ['Mario Bros', 'Sonic', 'Solid Snake', 'Link', 'Kirby'];
    ?>

    <nav class="navInferior">
        <?php foreach ($menuItems as $item) : ?>
            <h3 class="menuObjeto"><?= $item ?></h3>
        <?php endforeach; ?>
    </nav>

    <!-- Formulario de inicio de sesión -->
    <div id="iniciarSesionForm" class="iniciarSesionForm">
        <form id="inicioSesionForm" class="inicioSesionForm" method="post">
            <div class="loginCampo">
                <i class="cerrarInicioSesion fa-solid fa-xmark"></i>
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="loginCampo">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="submit_login">Iniciar Sesión</button>
            <div class="loginOp">
                <a href="#" id="olvidasteContraseña">¿Olvidaste tu contraseña?</a>
            </div>
        </form>
    </div>

    <section class="slider">
        <div class="sliderContainer">
            <div class="sliderObject">
                <img src="assets/img/MarioBros.png" alt="Camiseta de Mario" class="sliderImg">
                <h1 class="sliderTitulo">Mario<br>Bros</h1>
                <h2 class="sliderPrecio">€19.95</h2>
                <h4 class="sliderEco">Todos nuestros<br>productos son <br> <span>100% ecologicos</span></h4>
                <img src="assets/img/EcoLogo.png" alt="Logo Eco" class="sliderImgEco">
                <img src="assets/img/Metakirbi NewPrototype.png" alt="Kirby Green" class="kirbiGreen">
                <a href="#producto">
                    <button class="botonCompra button is-primary is-responsive">¡COMPRAR AHORA!</button>
                </a>
            </div>
            <div class="sliderObject">
                <img src="assets/img/SonicCristalBlue.png" alt="Camiseta de Sonic" class="sliderImg">
                <h1 class="sliderTitulo">Sonic<br>Sega</h1>
                <h2 class="sliderPrecio">€19.95</h2>
                <h4 class="sliderEco">Todos nuestros<br>productos son <br> <span>100% ecologicos</span></h4>
                <img src="assets/img/EcoLogo.png" alt="Logo Eco" class="sliderImgEco">
                <img src="assets/img/Metakirbi NewPrototype.png" alt="Kirby Green" class="kirbiGreen">
                <a href="#producto">
                    <button class="botonCompra button is-info is-responsive">¡COMPRAR AHORA!</button>
                </a>

            </div>
            <div class="sliderObject">
                <img src="assets/img/SolidSnake.png" alt="Camiseta de Solid Snake" class="sliderImg">
                <h1 class="sliderTitulo">Solid<br>Snake</h1>
                <h2 class="sliderPrecio">€19.95</h2>
                <h4 class="sliderEco">Todos nuestros<br>productos son <br> <span>100% ecologicos</span></h4>
                <img src="assets/img/EcoLogo.png" alt="Logo Eco" class="sliderImgEco">
                <img src="assets/img/Metakirbi NewPrototype.png" alt="Kirby Green" class="kirbiGreen">
                <a href="#producto">
                    <button class="botonCompra button is-success is-responsive">¡COMPRAR AHORA!</button>
                </a>
            </div>
            <div class="sliderObject">
                <img src="assets/img/LinkZelda.png" alt="Camiseta de Link" class="sliderImg">
                <h1 class="sliderTitulo">Link<br>Zelda</h1>
                <h2 class="sliderPrecio">€19.95</h2>
                <h4 class="sliderEco">Todos nuestros<br>productos son <br> <span>100% ecologicos</span></h4>
                <img src="assets/img/EcoLogo.png" alt="Logo Eco" class="sliderImgEco">
                <img src="assets/img/Metakirbi NewPrototype.png" alt="Kirby Green" class="kirbiGreen">
                <a href="#producto">
                    <button class="botonCompra button is-warning is-responsive">¡COMPRAR AHORA!</button>
                </a>
            </div>
            <div class="sliderObject">
                <img src="assets/img/KirbyAdventure.png" alt="Camiseta de Kirby" class="sliderImg">
                <h1 class="sliderTitulo">Kirby<br>glotón</h1>
                <h2 class="sliderPrecio">€19.95</h2>
                <h4 class="sliderEco">Todos nuestros<br>productos son <br> <span>100% ecologicos</span></h4>
                <img src="assets/img/EcoLogo.png" alt="Logo Eco" class="sliderImgEco">
                <img src="assets/img/Metakirbi NewPrototype.png" alt="Kirby Green" class="kirbiGreen">
                <a href="#producto">
                    <button class="botonCompra button is-danger is-responsive">¡COMPRAR AHORA!</button>
                </a>
            </div>
        </div>
    </section>

    <section class="caracteristicas">
        <div class="caracteristica">
            <img src="assets/img/shipping.png" alt="Icono de Envio" class="caracteristicaIcono">
            <span class="caracteristicaTitulo">Envio Gratuito</span>
            <span class="caracteristicaDesc">Envio gratuito a toda españa en compras superiores a 50€</span>
        </div>
        <div class="caracteristica">
            <img src="assets/img/return.png" alt="Icono de devolucion" class="caracteristicaIcono">
            <span class="caracteristicaTitulo">30 días de garantía</span>
            <span class="caracteristicaDesc">Devolución sin complicaciones y reembolso rápido en menos de 14
                días</span>
        </div>
        <div class="caracteristica">
            <img src="assets/img/gift.png" alt="Icono de tarjeta regalo" class="caracteristicaIcono">
            <span class="caracteristicaTitulo">Tarjetas regalo</span>
            <span class="caracteristicaDesc">Tarjetas regalo válidas en todos nuestros productos. Código de uso rápido y
                fácil</span>
        </div>
        <div class="caracteristica">
            <img src="assets/img/contact.png" alt="Icono de contacto" class="caracteristicaIcono">
            <span class="caracteristicaTitulo">¡Conectate con nosotros!</span>
            <span class="caracteristicaDesc">Contactanos facilmente para cualquier consulta por teléfono o email</span>
        </div>
    </section>

    <section class="producto" id="producto">
        <img src="assets/img/MarioBros.png" alt="Camiseta de Mario" class="productoImg">

        <div class="productoDetalles">
            <h1 class="productoTitulo">Mario Bros</h1>
            <div class="precioYBoton">
                <h2 class="productoPrecio">€19.95</h2>
                <button class="botonProducto is-responsive" id="AnadirCesta">Añadir a la cesta</button>
            </div>
            <p class="productoDesc">Esta camiseta, hecha al 100% de algodón orgánico de alta calidad, ofrece comodidad
                excepcional y ajuste regular. Certificada por estándares ecológicos y éticos, es la elección ideal para
                los amantes de los videojuegos que tienen conciencia ecológica.</p>
            <div class="colores">
                <div class="color"></div>
                <div class="color"></div>
            </div>
            <div class="sizes">
                <div class="size">S</div>
                <div class="size">M</div>
                <div class="size">L</div>
                <div class="size">XL</div>
                <div class="size">2XL</div>
                <div class="size">3XL</div>
                <div class="size">4XL</div>
                <div class="size">5XL</div>
            </div>
        </div>
    </section>

    <?php
    // Verificar si hay una sesión iniciada
    if (isset($_SESSION['email'])) {
        // Mostrar la sección "productoSeleccionado" para usuarios con sesión iniciada
    ?>
        <div class="productoSeleccionado" id="productoSeleccionado">
            <div class="productoSeleccionadoContenido">
                <div class="productoAgregado">
                    <img src="assets/img/Metakirbi aleta.png" alt="productoAgregado" class="productoAgregadoImagen">
                    <h1>¡Misión completada con éxito!</h1>
                </div>
                <button class="bottonContinuarComprando" id="botonContinuarComprando">Continuar Comprando</button>
                <a href="/vista/cesta.php" class="botonRealizarPago" id="realizarPago">Realizar pedido</a>
            </div>
        </div>
    <?php
    } else {
        // Mostrar la sección "productoSeleccionado" para usuarios sin sesión iniciada
    ?>
        <div class="productoSeleccionado" id="productoSeleccionado">
            <div class="productoSeleccionadoContenido">
                <div class="productoAgregado">
                    <img src="assets/img/Metakirbi aleta.png" alt="productoAgregado" class="productoAgregadoImagen">
                    <h1>Para poder comprar debes iniciar sesión antes :)</h1>
                </div>
                <button class="bottonContinuarComprando" id="botonContinuarComprando">Cerrar</button>
                <a href="#" class="botonRealizarPago" id="realizarPago">Iniciar sesión</a>
            </div>
        </div>
    <?php
    }
    ?>

    <section id="formulario" class="section">
        <div class="container">
            <h3 class="title">¡Contacta con nosotros!</h3>
            <form action="index.php" method="POST">
                <div class="field">
                    <label class="label">Nombre:</label>
                    <div class="control">
                        <input class="input" type="text" name="nombre" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Email:</label>
                    <div class="control">
                        <input class="input" type="email" name="email" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Mensaje:</label>
                    <div class="control">
                        <textarea class="textarea" name="mensaje" required></textarea>
                    </div>
                </div>
                <div class="field campoBoton">
                    <div class="control">
                        <button type="submit" class="button is-link">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="content has-text-centered">
            <p>&copy; <?php echo date("Y"); ?> RetroKir. Todos los derechos reservados.</p>
            <a href="https://www.tiktok.com/@retrokir" target="_blank" class="tiktokIcon">
                <i class="fab fa-tiktok"></i> Síguenos en TikTok
            </a>
        </div>
    </footer>

    <!-- Importar productos.js -->
    <script src="assets/js/productos.js"></script>
    <!-- Importar main.js -->
    <script src="assets/js/main.js"></script>

</body>

</html>