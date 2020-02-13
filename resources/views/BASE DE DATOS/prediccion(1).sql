-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2020 a las 00:03:23
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
-- Estructura de tabla para la tabla `prediccion`
--

CREATE TABLE `prediccion` (
  `id_prediccion` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `no_cuenta` int(11) DEFAULT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `id_carrera_v` double DEFAULT NULL,
  `sexo` varchar(30) DEFAULT NULL,
  `sexo_v` double DEFAULT NULL,
  `id_estado_civil` int(11) DEFAULT NULL,
  `id_estado_civil_v` double DEFAULT NULL,
  `no_hijos` int(11) DEFAULT NULL,
  `no_hijos_v` double DEFAULT NULL,
  `no_hermanos` int(11) DEFAULT NULL,
  `no_hermanos_v` double DEFAULT NULL,
  `enfermedad_cronica` int(11) DEFAULT NULL,
  `enfermedad_cronica_v` double DEFAULT NULL,
  `trabaja` int(11) DEFAULT NULL,
  `trabaja_v` double DEFAULT NULL,
  `practica_deporte` int(11) DEFAULT NULL,
  `practica_deporte_v` double DEFAULT NULL,
  `actividades_culturales` int(11) DEFAULT NULL,
  `actividades_culturales_v` double DEFAULT NULL,
  `etnia_indigena` int(11) DEFAULT NULL,
  `etnia_indigena_v` double DEFAULT NULL,
  `lugar_nacimientos` varchar(50) DEFAULT NULL,
  `lugar_nacimientos_v` double DEFAULT NULL,
  `nivel_economico` varchar(11) DEFAULT NULL,
  `nivel_economico_v` double DEFAULT NULL,
  `sostiene_economia_hogar` varchar(30) DEFAULT NULL,
  `sostiene_economia_hogar_v` double DEFAULT NULL,
  `tegusta_carrera_elegida` int(11) DEFAULT NULL,
  `tegusta_carrera_elegida_v` double DEFAULT NULL,
  `beca` int(11) DEFAULT NULL,
  `beca_v` double DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `estado_v` double DEFAULT NULL,
  `id_expbebidas` int(11) DEFAULT NULL,
  `id_expbebidas_v` double DEFAULT NULL,
  `poblacion` varchar(11) DEFAULT NULL,
  `poblacion_v` double DEFAULT NULL,
  `ant_inst` varchar(50) DEFAULT NULL,
  `ant_inst_v` double DEFAULT NULL,
  `satisfaccion_c` varchar(50) DEFAULT NULL,
  `satisfaccion_c_v` double DEFAULT NULL,
  `materias_repeticion` int(11) DEFAULT NULL,
  `materias_repeticion_v` double DEFAULT NULL,
  `tot_repe` int(11) DEFAULT NULL,
  `tot_repe_v` double DEFAULT NULL,
  `materias_especial` int(11) DEFAULT NULL,
  `materias_especial_v` double DEFAULT NULL,
  `tot_espe` int(11) DEFAULT NULL,
  `tot_espe_v` double DEFAULT NULL,
  `gen_espe` int(11) DEFAULT NULL,
  `gen_espe_v` double DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prediccion`
--

INSERT INTO `prediccion` (`id_prediccion`, `nombre`, `no_cuenta`, `id_carrera`, `id_carrera_v`, `sexo`, `sexo_v`, `id_estado_civil`, `id_estado_civil_v`, `no_hijos`, `no_hijos_v`, `no_hermanos`, `no_hermanos_v`, `enfermedad_cronica`, `enfermedad_cronica_v`, `trabaja`, `trabaja_v`, `practica_deporte`, `practica_deporte_v`, `actividades_culturales`, `actividades_culturales_v`, `etnia_indigena`, `etnia_indigena_v`, `lugar_nacimientos`, `lugar_nacimientos_v`, `nivel_economico`, `nivel_economico_v`, `sostiene_economia_hogar`, `sostiene_economia_hogar_v`, `tegusta_carrera_elegida`, `tegusta_carrera_elegida_v`, `beca`, `beca_v`, `estado`, `estado_v`, `id_expbebidas`, `id_expbebidas_v`, `poblacion`, `poblacion_v`, `ant_inst`, `ant_inst_v`, `satisfaccion_c`, `satisfaccion_c_v`, `materias_repeticion`, `materias_repeticion_v`, `tot_repe`, `tot_repe_v`, `materias_especial`, `materias_especial_v`, `tot_espe`, `tot_espe_v`, `gen_espe`, `gen_espe_v`, `total`) VALUES
(1, 'JESUS EMERITH RAMIREZ OCAMPO', 201507030, 2, 3.5, 'M', 3.5, 1, 0.8, 1, 1.5, 1, 1.5, 1, 3.5, 2, 1.5, 1, 1.5, 1, 1.5, 2, 1.5, 'Amanalco', 3.5, 'C-', 2.5, 'Madre', 3.5, 2, 3.5, 1, 1.5, 4, 0, 3, 2.5, 'Urbana', 2, 'Continuación de estudios', 1.5, 'Regular', 2.5, 1, 3.5, 3, 2.5, 1, 3.5, 2, 1.5, 3, 2.5, NULL),
(2, 'JABNEEL FRANCISCO HERNANDEZ', 201507009, 2, 3.5, 'F', 3, 1, 0.8, 1, 1.5, 1, 1.5, 1, 3.5, 2, 1.5, 2, 3.5, 2, 3.5, 1, 3.5, 'Colorines', 3.5, 'C-', 2.5, 'Madre', 3.5, 1, 1.5, 2, 3.5, 1, 1.5, 4, 3.5, 'Urbana', 2, 'Continuación de estudios', 1.5, 'Satisfecho', 1.5, 1, 3.5, 2, 1.5, 2, 0.5, NULL, 0.1, 2, 1.5, NULL),
(3, 'ISAIAS ESPAÑA FUENTES', 201607011, 2, 3.5, 'M', 3.5, 2, 3.5, 2, 2.5, 3, 2.8, 2, 1.5, 2, 1.5, 2, 3.5, 2, 3.5, 2, 1.5, 'Donato Guerra', 3.5, 'D+', 3, 'Padre', 3.5, 2, 3.5, 2, 3.5, 2, 3.5, 3, 2.5, 'Rural', 3.5, 'Continuación de estudios', 1.5, 'Regular', 2.5, 2, 0.5, NULL, 0.1, 1, 3.5, 2, 1.5, 3, 2.5, NULL),
(5, 'esaud antonio  coranguez osorio', 201907040, 2, 3.5, 'M', 3.5, 2, 3.5, 3, 2.8, 3, 2.8, 2, 1.5, 2, 1.5, 2, 3.5, 2, 3.5, 2, 1.5, 'Amanalco', 3.5, 'C-', 2.5, 'padre', 3.5, 2, 3.5, 2, 3.5, 3, 0, 2, 1.5, 'Rural', 3.5, 'Continuación de estudios', 1.5, 'Regular', 2.5, 1, 3.5, 2, 1.5, 2, 0.5, NULL, 0.1, 1, 0.1, NULL),
(6, 'JOSE URIEL AYBAR HERNANDEZ', 201607005, 2, 3.5, 'M', 3.5, 1, 0.8, 1, 1.5, 3, 2.8, 1, 3.5, 2, 1.5, 2, 3.5, 1, 1.5, 2, 1.5, 'Colorines', 3.5, 'C', 2.5, 'Padre', 3.5, 1, 1.5, 1, 1.5, 2, 3.5, 2, 1.5, 'Urbana', 2, 'Continuación de estudios', 1.5, 'Muy satisfecho', 0.8, 1, 3.5, 2, 1.5, 2, 0.5, NULL, 0.1, 1, 0.1, NULL),
(7, 'Francisco Javier Chávez  Martínez', 201907050, 2, 3.5, 'M', 3.5, 3, 2, 4, 3.5, 2, 2, 2, 1.5, 1, 3.5, 2, 3.5, 2, 3.5, 2, 1.5, 'Villa Vuctoria', 3.5, 'C', 2.5, 'Padre', 3.5, 2, 3.5, 1, 1.5, 1, 1.5, 3, 2.5, 'Urbana', 2, 'Continuación de estudios', 1.5, NULL, 0, 1, 3.5, 3, 2.5, 2, 0.5, NULL, 0.1, 1, 0.1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `prediccion`
--
ALTER TABLE `prediccion`
  ADD PRIMARY KEY (`id_prediccion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `prediccion`
--
ALTER TABLE `prediccion`
  MODIFY `id_prediccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
