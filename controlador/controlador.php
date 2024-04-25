<!-- Controlador -->

<?php
session_start();
require_once(__DIR__ . '/../modelo/database.php');

// Función para registrar un nuevo usuario
function registrarUsuario($nombre, $email, $contrasena)
{
    // Verificar si el correo electrónico ya está registrado
    if (correoRegistrado($email)) {
        $_SESSION['mensaje_error'] = "El correo electrónico ya está registrado.";
        return false;
    } else {
        // Insertar el nuevo usuario en la base de datos
        insertarUsuario($nombre, $email, $contrasena);
        return true;
    }
}

// Función para iniciar sesión
function iniciarSesion($email, $contrasena)
{
    // Verificar las credenciales del usuario
    $id_usuario = verificarCredencialesInicioSesion($email, $contrasena);
    if ($id_usuario) {
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['email'] = $email;
        return true;
    }
    $_SESSION['mensaje_error'] = "Credenciales incorrectas. Inténtelo de nuevo.";
    return false;
}

// Función para cerrar sesión
function cerrarSesion()
{
    session_unset();
    session_destroy();
    // Redirigir a la página de inicio
    header('Location: index.php');
    exit();
}

// Función para agregar un producto al carrito
function agregarAlCarrito($id_producto)
{
    // Comprobar si el carrito ya existe en la sesión
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
    // Agregar el producto al carrito
    if (!isset($_SESSION['carrito'][$id_producto])) {
        $_SESSION['carrito'][$id_producto] = 1;
    } else {
        $_SESSION['carrito'][$id_producto]++;
    }
}

// Función para eliminar un producto del carrito
function eliminarDelCarrito($id_producto)
{
    // Comprobar si el producto está en el carrito
    if (isset($_SESSION['carrito'][$id_producto])) {
        unset($_SESSION['carrito'][$id_producto]);
    }
}

// Función para obtener productos del carrito
function vaciarCarrito()
{
    unset($_SESSION['carrito']);
}

// Función para finalizar la compra y generar un pedido
function finalizarCompra()
{
    if (isset($_SESSION['carrito']) && isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];
        $fecha_pedido = date('Y-m-d');
        $estado_pedido = "pendiente";

        // Crear un nuevo pedido
        crearPedido($fecha_pedido, $estado_pedido, $id_usuario);

        // Vaciar el carrito después de completar la compra
        vaciarCarrito();

        return true;
    }
    return false;
}

?>