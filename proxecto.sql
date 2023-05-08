create database proxecto;

use proxecto;

CREATE TABLE roles_usuario(
	id_rol INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre_rol VARCHAR(50) NOT NULL,
	permisos CHAR(3) NOT NULL DEFAULT 'r'
);


CREATE TABLE usuarios (
	id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_rol INT NOT NULL,
	nombre_usuario VARCHAR(50) NOT NULL,
	correo_electronico VARCHAR(100) NOT NULL,
	contraseña VARCHAR(50) NOT NULL,
	baja_usuario INT NOT NULL DEFAULT 0,
	FOREIGN KEY (id_rol) REFERENCES roles_usuario(id_rol)
);

	
CREATE TABLE menus (
	id_menu INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre_menu VARCHAR(100) NOT NULL,
	decripcion VARCHAR(500) NOT NULL,
	precio_menu DECIMAL(10,2) NOT NULL,
	estado_menu INT NOT NULL DEFAULT 0
);
	
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