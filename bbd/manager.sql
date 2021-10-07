CREATE TABLE `admin` (
  `matricula` varchar(10) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`matricula`, `nombre`, `apellido`, `password`, `email`) VALUES
('0000001', 'Admin', 'root', 'Pa5W0Rd123', ''),
('1754821', 'Jonathan Alexander', 'Costilla', 'password', 'lawolfgangl@gmail.com');

CREATE TABLE `clavemateria` (
  `id_clavemateria` int(11) NOT NULL,
  `nombre_clave` varchar(25) NOT NULL,
  `descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `clavemateria` (`id_clavemateria`, `nombre_clave`, `descripcion`) VALUES
(32, '100', 'definida'),
(33, '102', 'por definir'),
(34, '103', 'sinn definir'),
(35, '104', 'pronto a definir'),
(36, '500', '2do Semestre'),
(37, '154', 'por definir');

CREATE TABLE `dia` (
  `id_dia` int(11) NOT NULL,
  `clave_dia` varchar(25) NOT NULL,
  `descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `dia` (`id_dia`, `clave_dia`, `descripcion`) VALUES
(6, 'Martes y Jueves', 'Clase de 3 horas'),
(7, 'Lunes, Miércoles, Viernes', 'Clase de 1 hora'),
(8, 'Lunes, Miércoles, Viernes', 'Clase de 2 horas'),
(9, 'Sábado', 'Clase de 3 horas'),
(10, 'Lunes, Miércoles, Viernes', '1er Semestre'),
(11, 'Lunes', 'Clase de 1 hora'),
(12, 'Martes', 'Clase de 1 hora'),
(13, 'Miércoles', '1 hora'),
(14, 'Jueves', 'Clase de 1 hora'),
(15, 'Viernes', 'Clase de 1 hora'),
(17, 'Lunes', '2 horas');

CREATE TABLE `distribucion` (
  `id_distribucion` int(11) NOT NULL,
  `plan` int(25) NOT NULL,
  `clavemateria` int(25) NOT NULL,
  `materia` int(25) NOT NULL,
  `grupo` int(25) NOT NULL,
  `hora` int(25) NOT NULL,
  `dia` int(25) NOT NULL,
  `salon` int(25) NOT NULL,
  `semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `distribucion` (`id_distribucion`, `plan`, `clavemateria`, `materia`, `grupo`, `hora`, `dia`, `salon`, `semestre`) VALUES
(4, 2, 33, 4, 5, 4, 9, 2, 3),
(16, 2, 35, 1, 6, 1, 6, 1, 1),
(17, 3, 36, 5, 8, 5, 9, 4, 4),
(26, 2, 33, 1, 2, 1, 6, 1, 1);

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `numero_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `grupo` (`id_grupo`, `numero_grupo`) VALUES
(2, 101),
(4, 100),
(5, 203),
(6, 204),
(7, 0),
(8, 102),
(9, 504),
(10, 100),
(11, 2003);

CREATE TABLE `hora` (
  `id_hora` int(11) NOT NULL,
  `nombre_hora` varchar(25) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `hora` (`id_hora`, `nombre_hora`, `hora_inicio`, `hora_fin`) VALUES
(1, 'M2, 1', '07:50:00', '08:40:00'),
(2, 'M1, 1', '07:00:00', '07:50:00'),
(3, 'M3, 1', '08:40:00', '09:30:00'),
(4, 'M4, 1', '09:30:00', '10:20:00'),
(5, 'V1, 1', '12:00:00', '12:50:00'),
(6, 'N1, 5', '17:00:00', '17:50:00');

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(25) NOT NULL,
  `descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `materia` (`id_materia`, `nombre_materia`, `descripcion`) VALUES
(1, 'Optimización', '4to Semestre'),
(2, 'Lenguajes de Programacion', '4to Semestre'),
(3, 'Matemáticas I', '1er Semestre'),
(4, 'Matemáticas II', '2do Semestre'),
(5, 'Matemáticas III', '3er Semestre');

CREATE TABLE `plan` (
  `id_plan` int(11) NOT NULL,
  `clave_plan` varchar(11) NOT NULL,
  `descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `plan` (`id_plan`, `clave_plan`, `descripcion`) VALUES
(2, '401', 'Plan Actual'),
(3, '402', 'Próximo plan'),
(6, '100', 'Plan fantasma');

CREATE TABLE `salon` (
  `id_salon` int(11) NOT NULL,
  `nombre_salon` varchar(25) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `ubicacion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `salon` (`id_salon`, `nombre_salon`, `capacidad`, `ubicacion`) VALUES
(1, '4200', 25, '2do piso edificio 4'),
(2, '4100', 22, '1er Piso edificio 4'),
(3, '4102', 20, '1er piso edificio 4'),
(4, '4103', 35, '1er Piso edificio 4'),
(5, '4103', 24, 'En un lado del 4102');

CREATE TABLE `semestre` (
  `id_semestre` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `semestre` (`id_semestre`, `semestre`, `descripcion`) VALUES
(1, 3, '3er semestre'),
(2, 1, '1er Semestre'),
(3, 2, '2do Semestre'),
(4, 4, '4to');

ALTER TABLE `admin`
  ADD PRIMARY KEY (`matricula`);

ALTER TABLE `clavemateria`
  ADD PRIMARY KEY (`id_clavemateria`);

ALTER TABLE `dia`
  ADD PRIMARY KEY (`id_dia`);

ALTER TABLE `distribucion`
  ADD PRIMARY KEY (`id_distribucion`),
  ADD KEY `semestre` (`semestre`),
  ADD KEY `plan` (`plan`,`clavemateria`,`materia`,`grupo`,`hora`,`dia`,`salon`),
  ADD KEY `hora` (`hora`),
  ADD KEY `dia` (`dia`),
  ADD KEY `salon` (`salon`),
  ADD KEY `grupo` (`grupo`),
  ADD KEY `materia` (`materia`),
  ADD KEY `clavemateria` (`clavemateria`);

ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`);

ALTER TABLE `hora`
  ADD PRIMARY KEY (`id_hora`);

ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`);

ALTER TABLE `plan`
  ADD PRIMARY KEY (`id_plan`);

ALTER TABLE `salon`
  ADD PRIMARY KEY (`id_salon`);

ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id_semestre`);

ALTER TABLE `clavemateria`
  MODIFY `id_clavemateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

ALTER TABLE `dia`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

ALTER TABLE `distribucion`
  MODIFY `id_distribucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `hora`
  MODIFY `id_hora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `plan`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `salon`
  MODIFY `id_salon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `semestre`
  MODIFY `id_semestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `distribucion`
  ADD CONSTRAINT `distribucion_ibfk_1` FOREIGN KEY (`hora`) REFERENCES `hora` (`id_hora`),
  ADD CONSTRAINT `distribucion_ibfk_3` FOREIGN KEY (`dia`) REFERENCES `dia` (`id_dia`),
  ADD CONSTRAINT `distribucion_ibfk_4` FOREIGN KEY (`salon`) REFERENCES `salon` (`id_salon`),
  ADD CONSTRAINT `distribucion_ibfk_5` FOREIGN KEY (`grupo`) REFERENCES `grupo` (`id_grupo`),
  ADD CONSTRAINT `distribucion_ibfk_6` FOREIGN KEY (`materia`) REFERENCES `materia` (`id_materia`),
  ADD CONSTRAINT `distribucion_ibfk_7` FOREIGN KEY (`clavemateria`) REFERENCES `clavemateria` (`id_clavemateria`),
  ADD CONSTRAINT `distribucion_ibfk_8` FOREIGN KEY (`plan`) REFERENCES `plan` (`id_plan`),
  ADD CONSTRAINT `distribucion_ibfk_9` FOREIGN KEY (`semestre`) REFERENCES `semestre` (`id_semestre`);
COMMIT;