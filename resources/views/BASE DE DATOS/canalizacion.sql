-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2021 a las 22:56:15
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
-- Base de datos: `tec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canalizacion`
--

CREATE TABLE `canalizacion` (
  `id_canalizacion` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `fecha_canalizacion` date NOT NULL,
  `hora` time NOT NULL,
  `aspectos_sociologicos1` varchar(3) DEFAULT NULL,
  `aspectos_sociologicos2` varchar(3) DEFAULT NULL,
  `aspectos_sociologicos3` varchar(3) DEFAULT NULL,
  `aspectos_academicos1` varchar(3) DEFAULT NULL,
  `aspectos_academicos2` varchar(3) DEFAULT NULL,
  `aspectos_academicos3` varchar(3) DEFAULT NULL,
  `observaciones` text,
  `otros` text,
  `desc_area` text NOT NULL,
  `desc_subarea` text,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `canalizacion`
--

INSERT INTO `canalizacion` (`id_canalizacion`, `id_alumno`, `id_personal`, `fecha_canalizacion`, `hora`, `aspectos_sociologicos1`, `aspectos_sociologicos2`, `aspectos_sociologicos3`, `aspectos_academicos1`, `aspectos_academicos2`, `aspectos_academicos3`, `observaciones`, `otros`, `desc_area`, `desc_subarea`, `status`) VALUES
(24, 866, 111, '2021-02-15', '09:45:00', 'Si', 'No', 'No', 'No', 'No', 'No', 'prueba 1 ut', 'prueba 1 update ttttt', 'Área de Salud', '.', 'En Proceso'),
(25, 865, 111, '2021-02-10', '03:00:00', 'No', 'No', 'No', 'No', 'Si', 'No', 'prueba 2', 'prueba 2 actualiza', 'Área Académica', 'Departamento de Residencia', 'En Proceso');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canalizacion`
--
ALTER TABLE `canalizacion`
  ADD PRIMARY KEY (`id_canalizacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canalizacion`
--
ALTER TABLE `canalizacion`
  MODIFY `id_canalizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
