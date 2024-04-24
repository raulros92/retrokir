<!-- Conexion y funciones con la base de datos -->

<?php
require_once("datos_conexion.php");

//FUNCIONES DE CONEXION//

// Función para establecer la conexión a la base de datos
function conectar()
{
    $conexion = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    } else {
        return $conexion;
    }
}

// Función para cerrar la conexión a la base de datos
function cerrarConexion($conexion)
{
    mysqli_close($conexion);
}

//FUNCIONES DE CONSULTA//

// Función para ejecutar consultas SELECT
function consultar($sql)
{
    $conexion = conectar();
    $resultado = mysqli_query($conexion, $sql);
    if (!$resultado) {
        die("Error al ejecutar la consulta: " . mysqli_error($conexion));
    } else {
        cerrarConexion($conexion); // Cerrar la conexión
        return $resultado;
    }
}

// Función para ejecutar consultas INSERT, UPDATE, DELETE
function ejecutar($sql)
{
    $conexion = conectar();
    if (mysqli_query($conexion, $sql)) {
        // Consulta ejecutada con éxito
    } else {
        // La consulta falló
        die("Error al ejecutar la consulta: " . mysqli_error($conexion));
    }
    cerrarConexion($conexion); // Cerrar la conexión
}

//FUNCIONES DE GESTION DE PRODUCTOS//

// Función para crear un nuevo producto
function crearProducto($nombre, $precio, $cantidad, $color)
{
    $sql = "INSERT INTO producto (nombre, precio, cantidad, color) VALUES ('$nombre', $precio, $cantidad, '$color')";
    ejecutar($sql);
}

// Función para obtener un producto por su ID
function obtenerProductoPorId($id)
{
    $sql = "SELECT * FROM producto WHERE id_producto = $id";
    $resultado = consultar($sql);
    return mysqli_fetch_assoc($resultado);
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
function crearPedido($fechaPedido, $estadoPedido, $idUsuario)
{
    $sql = "INSERT INTO pedido (fecha_pedido, estado_pedido, id_usuario) VALUES ('$fechaPedido', '$estadoPedido', '$idUsuario')";
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

// Función para obtener el ID del usuario por su correo electrónico
function obtenerIdUsuarioPorEmail($email)
{
    $sql = "SELECT id_usuario FROM usuario WHERE email = '$email'";
    $resultado = consultar($sql);
    $fila = mysqli_fetch_assoc($resultado);
    return $fila['id_usuario'];
}

// Función para verificar si un correo electrónico ya está registrado
function correoRegistrado($email)
{
    $sql = "SELECT * FROM usuario WHERE email='$email'";
    $resultado = consultar($sql);
    return mysqli_num_rows($resultado) > 0;
}

// Función para insertar un nuevo usuario en la base de datos
function insertarUsuario($nombre, $email, $contrasena)
{
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuario (nombre, email, contrasena) VALUES ('$nombre', '$email', '$contrasena_hash')";
    ejecutar($sql);
}

// Función para verificar las credenciales del usuario al iniciar sesión
function verificarCredencialesInicioSesion($email, $contrasena)
{
    $sql = "SELECT id_usuario, contrasena FROM usuario WHERE email='$email'";
    $resultado = consultar($sql);
    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_assoc($resultado);
        return password_verify($contrasena, $fila['contrasena']) ? $fila['id_usuario'] : null;
    }
    return null;
}

?>