<!-- Controlador -->

<?php

require_once(__DIR__ . '/../modelo/database.php'); // Incluir el archivo de la base de datos

// Función para registrar un nuevo usuario
function registrarUsuario($nombre, $email, $contrasena)
{
    // Verificar si el correo electrónico ya está registrado
    if (correoRegistrado($email)) { // Si el correo está registrado
        $_SESSION['mensaje_error'] = "El correo electrónico ya está registrado."; // Mostrar mensaje de error
        return false; // Retornar falso
    } else { // Si el correo no está registrad
        insertarUsuario($nombre, $email, $contrasena); // Insertar usuario
        return true; // Retornar verdadero
    }
}

// Función para iniciar sesión
function iniciarSesion($email, $contrasena)
{
    // Verificar las credenciales del usuario
    $id_usuario = verificarCredencialesInicioSesion($email, $contrasena); // Verificar credenciales
    if ($id_usuario) { // Si las credenciales son correctas
        $_SESSION['id_usuario'] = $id_usuario; // Establecer la sesión del ID del usuario
        $_SESSION['email'] = $email; // Establecer la sesión del correo electrónico
        return true; // Retornar verdadero
    }
    $_SESSION['mensaje_error'] = "Credenciales incorrectas. Inténtelo de nuevo."; // Mostrar mensaje de error
    return false; // Retornar falso
}

// Función para cerrar sesión
function cerrarSesion()
{
    session_unset(); // Eliminar todas las variables de sesión
    session_destroy(); // Destruir la sesión
    header('Location: index.php'); // Redirigir a la página de inicio
    exit(); // Finalizar la ejecución del script
}

//GESTION DEL CARRITO//


// Función para agregar un producto al carrito
function agregarAlCarrito($id_producto)
{
    // Comprobar si el carrito ya existe en la sesión
    if (!isset($_SESSION['carrito'])) { // Si el carrito no existe
        $_SESSION['carrito'] = []; // Crear un carrito vacío
    }
    // Agregar el producto al carrito
    if (!isset($_SESSION['carrito'][$id_producto])) { // Si el producto no está en el carrito
        $_SESSION['carrito'][$id_producto] = 1; // Agregar el producto con cantidad 1
    } else {
        $_SESSION['carrito'][$id_producto]++; // Incrementar la cantidad del producto
    }
}

// Función para eliminar un producto del carrito
function eliminarDelCarrito($id_producto)
{
    // Comprobar si el producto está en el carrito
    if (isset($_SESSION['carrito'][$id_producto])) { // Si el producto está en el carrito
        unset($_SESSION['carrito'][$id_producto]); // Eliminar el producto del carrito
    }
}

// Función para obtener productos del carrito
function vaciarCarrito()
{
    unset($_SESSION['carrito']); // Eliminar el carrito de la sesión
}

?>