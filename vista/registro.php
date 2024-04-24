<?php
// Incluir el controlador
require_once('../controlador/controlador.php');

// Mensaje de éxito
$mensaje_exito = "";

// Verificar si el formulario de registro ha sido enviado
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit_registro"])) {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];

    // Registrar al usuario
    $registro_exitoso = registrarUsuario($nombre, $email, $contrasena);

    // Si el registro fue exitoso, mostrar mensaje de éxito
    if ($registro_exitoso) {
        $mensaje_exito = "¡Misión cumplida! Usuario registrado con éxito :)";
    } else {
        $mensaje_exito = "Hubo un error al registrar el usuario. Por favor, inténtelo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="../assets/css/stylesRegistro.css">
    <script src="https://kit.fontawesome.com/d1fc8a4f6d.js" crossorigin="anonymous"></script>
</head>

<body>
    <main>
        <section id="registroUsuario">
            <div class="nuevoUsuarioTitulo">
                <i class="fa-solid fa-star"></i>
                <h2>Nuevo Usuario | Here we go!</h2>
                <i class="fa-solid fa-star"></i>
            </div>
            <form action="registro.php" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombreRegistro" name="nombre" required>
                <label for="email">Email:</label>
                <input type="email" id="emailRegistro" name="email" required>
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
                <button id="botonRegistrar" type="submit" name="submit_registro">Registrar</button>
                <div class="volverInicioContainer">
                    <a href="../index.php" id="volverInicio">Volver a la página de inicio</a>
                </div>
            </form>
            <div class="mensajeExito"><?php echo $mensaje_exito; ?></div>

        </section>
    </main>

</body>

</html>