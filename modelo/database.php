<!-- Conexion y funciones con la base de datos -->

<?php
require_once("datos_conexion.php");

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

// Función para crear un nuevo producto
function crearProducto($nombre, $descripcion, $precio, $cantidad, $color)
{
    $sql = "INSERT INTO producto (nombre, descripcion, precio, cantidad, color) VALUES ('$nombre', '$descripcion', $precio, $cantidad, '$color')";
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
function actualizarProducto($id, $nombre, $descripcion, $precio, $cantidad, $color)
{
    $sql = "UPDATE producto SET nombre = '$nombre', descripcion = '$descripcion', precio = $precio, cantidad = $cantidad, color = '$color' WHERE id_producto = $id";
    ejecutar($sql);
}

// Función para eliminar un producto
function eliminarProducto($id)
{
    $sql = "DELETE FROM producto WHERE id_producto = $id";
    ejecutar($sql);
}

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

// Función para obtener el ID del usuario por su correo electrónico
function obtenerIdUsuarioPorEmail($email)
{
    $sql = "SELECT id_usuario FROM usuario WHERE email = '$email'";
    $resultado = consultar($sql);
    $fila = mysqli_fetch_assoc($resultado);
    return $fila['id_usuario'];
}

?>