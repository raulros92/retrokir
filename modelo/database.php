<!-- Conexion y funciones con la base de datos -->

<?php
require_once("datos_conexion.php"); // Incluir el archivo de datos de conexión

//FUNCIONES DE CONEXION//

// Función para establecer la conexión a la base de datos
function conectar() 
{
    $conexion = mysqli_connect(HOST, USER, PASSWORD, DATABASE); // Conectar a la base de datos
    if (!$conexion) { // Si la conexión falla
        die("Error de conexión: " . mysqli_connect_error()); // Mostrar mensaje de error
    } else { // Si la conexión es exitosa
        return $conexion; // Retornar la conexión
    }
}

// Función para cerrar la conexión a la base de datos
function cerrarConexion($conexion) 
{
    mysqli_close($conexion); // Cerrar la conexión
}

//FUNCIONES DE CONSULTA//

// Función para ejecutar consultas SELECT
function consultar($sql) 
{
    $conexion = conectar(); // Establecer la conexión
    $resultado = mysqli_query($conexion, $sql); // Ejecutar la consulta
    if (!$resultado) { // Si la consulta falla
        die("Error al ejecutar la consulta: " . mysqli_error($conexion)); // Mostrar mensaje de error
    } else { // Si la consulta es exitosa
        cerrarConexion($conexion); // Cerrar la conexión
        return $resultado; // Retornar el resultado
    }
}

// Función para ejecutar consultas INSERT, UPDATE, DELETE
function ejecutar($sql) 
{
    $conexion = conectar(); // Establecer la conexión
    if (mysqli_query($conexion, $sql)) { // Ejecutar la consulta
        // Consulta ejecutada con éxito
    } else {
        // La consulta falló
        die("Error al ejecutar la consulta: " . mysqli_error($conexion)); // Mostrar mensaje de error
    }
    cerrarConexion($conexion); // Cerrar la conexión
}

//FUNCIONES DE GESTION DE PRODUCTOS//

// Función para obtener un producto por su nombre y color
function obtenerProductoPorNombreYColor($nombre, $color) 
{
    $sql = "SELECT * FROM producto WHERE nombre = '$nombre' AND color = '$color'"; // Consulta SQL
    $resultado = consultar($sql); // Ejecutar la consulta
    return mysqli_fetch_assoc($resultado); // Retornar el resultado
}

// Función para actualizar la cantidad de un producto
function actualizarCantidadProducto($id, $nuevaCantidad)
{
    $sql = "UPDATE producto SET cantidad = $nuevaCantidad WHERE id_producto = $id"; // Consulta SQL
    ejecutar($sql); // Ejecutar la consulta
} 

// Función para crear un nuevo producto
function crearProducto($nombre, $precio, $cantidad, $color) 
{
    $sql = "INSERT INTO producto (nombre, precio, cantidad, color) VALUES ('$nombre', $precio, $cantidad, '$color')"; // Consulta SQL
    ejecutar($sql); // Ejecutar la consulta
}

// Función para actualizar un producto
function actualizarProducto($id, $nombre, $precio, $cantidad, $color)
{
    $sql = "UPDATE producto SET nombre = '$nombre', precio = $precio, cantidad = $cantidad, color = '$color' WHERE id_producto = $id"; 
    ejecutar($sql);
}

// Función para eliminar un producto
function eliminarProducto($id)
{
    $sql = "DELETE FROM producto WHERE id_producto = $id";
    ejecutar($sql);
}

//GESTION DE PEDIDOS//

// Función para crear un nuevo pedido
function crearPedido($fechaPedido, $estadoPedido)
{
    $sql = "INSERT INTO pedido (fecha_pedido, estado_pedido) VALUES ('$fechaPedido', '$estadoPedido')";
    ejecutar($sql);
}

// Función para obtener un pedido por su ID
function obtenerPedidoPorId($id)
{
    $sql = "SELECT * FROM pedido WHERE id_pedido = $id";
    $resultado = consultar($sql);
    return mysqli_fetch_assoc($resultado);
}

// Función para actualizar un pedido
function actualizarPedido($id, $fechaPedido, $estadoPedido)
{
    $sql = "UPDATE pedido SET fecha_pedido = '$fechaPedido', estado_pedido = '$estadoPedido' WHERE id_pedido = $id";
    ejecutar($sql);
}

// Función para eliminar un pedido
function eliminarPedido($id)
{
    $sql = "DELETE FROM pedido WHERE id_pedido = $id";
    ejecutar($sql);
}

//GESTION DE USUARIOS//

// Función para verificar si un correo electrónico ya está registrado
function correoRegistrado($email)
{
    $sql = "SELECT * FROM usuario WHERE email='$email'";
    $resultado = consultar($sql);
    return mysqli_num_rows($resultado) > 0; // Si el correo está registrado, retornar true
}

// Función para verificar las credenciales del usuario al iniciar sesión
function verificarCredencialesInicioSesion($email, $contrasena)
{
    $sql = "SELECT id_usuario, contrasena FROM usuario WHERE email='$email'"; 
    $resultado = consultar($sql);
    if (mysqli_num_rows($resultado) == 1) { // Si se encontró un usuario con el correo electrónico
        $fila = mysqli_fetch_assoc($resultado); // Obtener la fila del resultado
        return password_verify($contrasena, $fila['contrasena']) ? $fila['id_usuario'] : null; // Verificar la contraseña
    }
    return null; // Si no se encontró un usuario con el correo electrónico
}

// Función para obtener el ID del usuario por su correo electrónico
function obtenerIdUsuarioPorEmail($email)
{
    $sql = "SELECT id_usuario FROM usuario WHERE email = '$email'";
    $resultado = consultar($sql);
    $fila = mysqli_fetch_assoc($resultado); // Obtener la fila del resultado
    return $fila['id_usuario'];  // Retornar el ID del usuario
}

// Función para insertar un nuevo usuario en la base de datos
function insertarUsuario($nombre, $email, $contrasena)
{
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT); // Encriptar la contraseña
    $sql = "INSERT INTO usuario (nombre, email, contrasena) VALUES ('$nombre', '$email', '$contrasena_hash')"; // Consulta SQL
    ejecutar($sql); // Ejecutar la consulta
}

?>