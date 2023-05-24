create database proxecto;

use proxecto;

CREATE TABLE `roles_usuario` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(50) NOT NULL,
  `pedidos` char(3) NOT NULL DEFAULT 'r',
  `usuarios` varchar(100) NOT NULL DEFAULT 'r',
  `menus` varchar(100) NOT NULL DEFAULT 'r',
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `usuarios` (
  `apellidos` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `telefono` varchar(19) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `baja_usuario` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles_usuario` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `menus` (
  `segundo` varchar(100) NOT NULL,
  `postre` varchar(100) NOT NULL,
  `informacion` varchar(100) NOT NULL,
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_menu` varchar(100) NOT NULL,
  `primero` varchar(100) NOT NULL,
  `precio_menu` decimal(10,2) NOT NULL,
  `estado_menu` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
	
CREATE TABLE pedidos (
	id_pedido INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_usuario INT NOT NULL,
	fecha_hora_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	fecha_hora_recogida_pedido DATETIME NOT NULL,
	estado_pedido INT NOT NULL DEFAULT 0,
	total_pagar DECIMAL(10,2) NOT NULL
);
	
CREATE TABLE detalle_pedido (
	id_detalle_pedido INT NOT NULL,
	id_pedido INT NOT NULL,
	id_menu INT NOT NULL,
	cantidad INT NOT NULL,
	precio DECIMAL(10,2) NOT NULL,
	FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido),
	FOREIGN KEY (id_menu) REFERENCES menus(id_menu)
);