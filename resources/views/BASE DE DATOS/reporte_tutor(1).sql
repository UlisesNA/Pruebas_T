-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2020 a las 00:38:03
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistematutorias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_tutor`
--

CREATE TABLE `reporte_tutor` (
  `id_reporte_tutor` int(11) NOT NULL,
  `id_asigna_tutor` int(11) DEFAULT NULL,
  `alumno` varchar(50) DEFAULT NULL,
  `appaterno` varchar(30) DEFAULT NULL,
  `apmaterno` varchar(30) DEFAULT NULL,
  `n_cuenta` int(15) DEFAULT NULL,
  `tutoria_grupal` varchar(5) DEFAULT NULL,
  `tutoria_individual` varchar(5) DEFAULT NULL,
  `beca` varchar(5) DEFAULT NULL,
  `repeticion` varchar(5) DEFAULT NULL,
  `especial` varchar(5) DEFAULT NULL,
  `academico` varchar(5) DEFAULT NULL,
  `medico` varchar(5) DEFAULT NULL,
  `psicologico` varchar(5) DEFAULT NULL,
  `baja` varchar(5) DEFAULT NULL,
  `observaciones` text,
  `generacion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reporte_tutor`
--

INSERT INTO `reporte_tutor` (`id_reporte_tutor`, `id_asigna_tutor`, `alumno`, `appaterno`, `apmaterno`, `n_cuenta`, `tutoria_grupal`, `tutoria_individual`, `beca`, `repeticion`, `especial`, `academico`, `medico`, `psicologico`, `baja`, `observaciones`, `generacion`) VALUES
(1, 8, 'JOSE ALBERTO', 'ARIAS', 'ROBLES', 201607002, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(2, 8, 'GLORIA MARIA', 'ARIAS', 'TELLEZ', 201607003, 'Si', 'Si', 'No', 'No', 'No', 'No', 'Si', 'No', 'No', NULL, '2016'),
(3, 8, 'ARMANDO', 'AVILA', 'CRUZ', 201607004, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(4, 8, 'JOSE URIEL', 'AYBAR', 'HERNANDEZ', 201607005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(5, 8, 'EMMANUEL', 'CARRANZA', 'BENITEZ', 201607007, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(6, 8, 'LIZBET', 'CATARINO', 'GALICA', 201607008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(7, 8, 'ELIZABETH', 'CRUZ', 'ROJAS', 201607009, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(8, 8, 'CARLOS EMMANUEL', 'DOMINGUEZ', 'REYES', 201607010, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(9, 8, 'ISAIAS', 'ESPAÑA', 'FUENTES', 201607011, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(10, 8, 'LUIS ANGEL', 'ESQUIVEL', 'BENITO', 201607012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(11, 8, 'SERGIO ERNESTO', 'ESQUIVEL', 'DE LA CRUZ', 201607013, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(12, 8, 'ARAEL', 'ESTRADA', 'CARDOSO', 201607014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(13, 8, 'VICTOR MANUEL ', 'GARCIA ', 'ENRIQUEZ', 201607015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(14, 8, 'ARTURO', 'GARCIA', 'GONZALEZ', 201607016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(15, 8, 'JUAN PABLO', 'GARDUÑO', 'MARTINEZ', 201607018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(16, 8, 'JOSE JONATHAN ', 'GARDUÑO', 'DE LA CRUZ', 201607017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(17, 8, 'EDUARDO', 'GUADARRAMA', 'CARRANZA', 201607020, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(18, 8, 'ERIK ADONIS', 'HERNANDEZ ', 'SOLIS', 201607021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(19, 8, 'ANA LUISA', 'JAIMES', 'BELTRÁN', 201607022, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(20, 8, 'LUIS ENRIQUE ', 'LONGINO', 'NICOLAS', 201607023, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(21, 8, 'JULIET', 'LOPEZ', 'RODRIGUEZ', 201607024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(22, 8, 'ISRAEL', 'LOZA ', 'ALVARADO', 201607025, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(23, 8, 'DANIELA GUADALUPE', 'MARCOS', 'PIZAR', 201607026, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(24, 8, 'MIRIAM', 'MARTINEZ', 'SOLIS', 201607027, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(25, 8, 'MARIA DE LOS ANGELES', 'MAURO', 'ESPARZA', 201607028, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(26, 8, 'CESAR', 'MENDIETA', 'GONZALEZ', 201607029, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(27, 8, 'BRYANT', 'ORTEGA', 'RAMIREZ', 201607031, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(28, 8, 'ABNER EMIGDIO', 'PALMA', 'CARBAJAL', 201607032, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(29, 8, 'JONATHAN', 'PLATA', 'BLANCO', 201607033, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(30, 8, 'AGUSTIN', 'RAMIREZ', 'GARCIA', 201607034, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(31, 8, 'MITZI MAGDALENA', 'SALGADO', 'GOMEZ', 201607046, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(32, 8, 'LUIS DANIEL', 'SOLORZANO', 'MARTINEZ', 201607035, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(33, 8, 'JAVIER', 'TENORIO', 'LOPEZ', 201607036, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(34, 8, 'KAERY ISMAEL', 'TERAN', 'CASTILLO', 201607037, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(35, 8, 'NESTOR', 'TRINIDAD', 'AYBAR', 201607038, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(36, 8, 'MIRIAM', 'VARGAS', 'REYES', 201607039, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(37, 8, 'OMAR', 'VENTURA', 'SANTIAGO', 201607041, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(38, 8, 'YOSELIN', 'VERA', 'SOTERO', 201607042, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(39, 8, 'DANIELA MICHELLE', 'VILCHIS', 'MARTINEZ', 201607043, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(40, 8, 'ALEXIS', 'VILLALPANDO', 'HINOJOSA', 201607044, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(41, 8, 'DULCE MARIA', 'YAÑEZ', 'VILCHIS', 201607045, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016'),
(42, 10, 'Fernando José', 'Acevedo', 'Maldonado', 201907051, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019'),
(43, 10, 'MARCO  ANTONIO', 'ALBARRÀN', 'PEÑALOZA', 201907013, 'Si', 'No', 'Si', 'Si', 'No', 'No', 'No', 'No', 'No', NULL, '2019'),
(44, 10, 'Hortencia Alejandra', 'Bastida', 'Gonzalez', 201907047, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019'),
(45, 10, 'emiliano', 'caballero', 'garduño', 201907021, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019'),
(46, 10, 'Jesús Evodio', 'Campos ', 'Silva', 201907003, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019'),
(47, 10, 'Adrian', 'Castillo', 'Valencia', 201907016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019'),
(48, 10, 'Miguel Axel', 'Cejudo', 'Hernandez', 201907007, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019'),
(49, 10, 'Francisco Javier', 'Chávez ', 'Martínez', 201907050, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019'),
(50, 10, 'Viviana', 'Cisneros', 'Avilez', 201907001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019'),
(51, 10, 'esaud antonio ', 'coranguez', 'osorio', 201907040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019'),
(64, 2, 'EDUARDO', 'AGAPITO', 'BOBADILLA', 201707001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017'),
(65, 2, 'OSVALDO', 'ARRIAGA', 'GARDUÑO', 201707002, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reporte_tutor`
--
ALTER TABLE `reporte_tutor`
  ADD PRIMARY KEY (`id_reporte_tutor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reporte_tutor`
--
ALTER TABLE `reporte_tutor`
  MODIFY `id_reporte_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;