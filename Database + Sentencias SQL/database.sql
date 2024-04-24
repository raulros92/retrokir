-- Creación de la tabla Usuario
CREATE TABLE usuario (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  contrasena VARCHAR(255) NOT NULL,
  dirección VARCHAR(255) NOT NULL
);

-- Creación de la tabla Producto
CREATE TABLE producto (
  id_producto INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  descripcion TEXT NOT NULL,
  precio FLOAT NOT NULL,
  cantidad INT NOT NULL,
  color VARCHAR(50) NOT NULL
);

-- Creación de la tabla Pedido
CREATE TABLE pedido (
  id_pedido INT AUTO_INCREMENT PRIMARY KEY,
  fecha_pedido DATE NOT NULL,
  estado_pedido VARCHAR(50) NOT NULL
);
