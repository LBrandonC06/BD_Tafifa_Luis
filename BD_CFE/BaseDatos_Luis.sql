
create database cfe;
CREATE TABLE `usuarios` (
  `id` int(9) NOT NULL auto_increment,
	nombre varchar(50),
	correo varchar(50),
	usuario varchar(50),
	contra varchar(50), 
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;

CREATE TABLE `tarifa` (
  `Id_Medidor` int(11) NOT NULL auto_increment,
  `Dueno` varchar(50) NOT NULL,
  `Energia` float(10,2) NOT NULL,
  `Iva` float(10,2) NOT NULL,
  `Fac_Periodo` float(10,2) NOT NULL,
  `DAP` float(10,2) NOT NULL,
  `Adeudo` float(10,2) NOT NULL,
  `Total` float(10,2) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`Id_Medidor`),
  CONSTRAINT FK_products_1
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;