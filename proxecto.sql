create database proxecto;

use proxecto;

CREATE TABLE `roles_usuario` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(50) NOT NULL,
  `pedidos` char(3) NOT NULL DEFAULT 'r',
  `usuarios` varchar(100) NOT NULL DEFAULT 'r',
  `menus` varchar(100) NOT NULL DEFAULT 'r',
  `perfil` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `telefono` varchar(19) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `baja_usuario` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `SECONDARY` (`correo_electronico`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles_usuario` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `menus` (
  `segundo` varchar(100) NOT NULL,
  `postre` varchar(100) NOT NULL,
  `informacion` varchar(100) NOT NULL,
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_menu` varchar(100) NOT NULL,
  `primero` varchar(100) NOT NULL,
  `precio_menu` decimal(10,2) NOT NULL,
  `estado_menu` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_menu`),
  UNIQUE KEY `SECONDARY` (`nombre_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `nombre_menu` varchar(100) NOT NULL,
  `hora_recogida` time NOT NULL,
  `fecha_recogida` date NOT NULL,
  `estado_pedido` int(11) NOT NULL DEFAULT 0,
  `total_pagar` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `comentario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_menu` (`id_menu`),
  KEY `pedidos_FK` (`correo_electronico`),
  KEY `pedidos_FK_1` (`nombre_menu`),
  CONSTRAINT `pedidos_FK` FOREIGN KEY (`correo_electronico`) REFERENCES `usuarios` (`correo_electronico`),
  CONSTRAINT `pedidos_FK_1` FOREIGN KEY (`nombre_menu`) REFERENCES `menus` (`nombre_menu`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;