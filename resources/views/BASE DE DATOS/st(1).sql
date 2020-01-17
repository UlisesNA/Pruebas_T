-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-01-2020 a las 01:54:40
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `st`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_antecedentes_academicos`
--

CREATE TABLE `exp_antecedentes_academicos` (
  `id_exp_antecedentes_academicos` int(11) NOT NULL,
  `id_bachillerato` int(11) DEFAULT NULL,
  `otros_estudios` varchar(100) DEFAULT NULL,
  `anos_curso_bachillerato` int(11) DEFAULT NULL,
  `ano_terminacion` varchar(10) DEFAULT NULL,
  `escuela_procedente` varchar(100) DEFAULT NULL,
  `promedio` float DEFAULT NULL,
  `materias_reprobadas` varchar(255) DEFAULT NULL,
  `otra_carrera_ini` varchar(255) DEFAULT NULL,
  `institucion` varchar(45) DEFAULT NULL,
  `semestres_cursados` int(11) DEFAULT NULL,
  `interrupciones_estudios` int(11) DEFAULT NULL,
  `razones_interrupcion` varchar(100) DEFAULT NULL,
  `razon_descide_estudiar_tesvb` varchar(255) DEFAULT NULL,
  `sabedel_perfil_profesional` varchar(100) DEFAULT NULL,
  `otras_opciones_vocales` int(11) DEFAULT NULL,
  `cuales_otras_opciones_vocales` varchar(255) DEFAULT NULL,
  `tegusta_carrera_elegida` int(11) DEFAULT NULL,
  `porque_carrera_elegida` varchar(255) DEFAULT NULL,
  `suspension_estudios_bachillerato` int(11) DEFAULT NULL,
  `razones_suspension_estudios` varchar(255) DEFAULT NULL,
  `teestimula_familia` varchar(255) DEFAULT NULL,
  `id_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_antecedentes_academicos`
--

INSERT INTO `exp_antecedentes_academicos` (`id_exp_antecedentes_academicos`, `id_bachillerato`, `otros_estudios`, `anos_curso_bachillerato`, `ano_terminacion`, `escuela_procedente`, `promedio`, `materias_reprobadas`, `otra_carrera_ini`, `institucion`, `semestres_cursados`, `interrupciones_estudios`, `razones_interrupcion`, `razon_descide_estudiar_tesvb`, `sabedel_perfil_profesional`, `otras_opciones_vocales`, `cuales_otras_opciones_vocales`, `tegusta_carrera_elegida`, `porque_carrera_elegida`, `suspension_estudios_bachillerato`, `razones_suspension_estudios`, `teestimula_familia`, `id_alumno`) VALUES
(1, 1, 'SI', 3, '2015', 'CECYTEM', 70, 'NINGUNA', '1', 'CONALEP', 3, 1, 'ECONOMIA', 'ESTA LA CARRERA QUE ME GUSTA (2)', 'SI', 1, 'PEDAGOGIA', 1, 'ES INTERSANTE', 1, 'FALTA DE DINERO', '1', 8),
(5, 1, 'No', 3, '2016', 'CECYTEM', 8, '1', '1', 'UNN', 1, 2, '', 'ME GUSTA', 'SI', 2, '', 1, 'ME GUSTA', 2, '', '1', 10),
(6, 1, 'NO', 3, '2016', 'CECYTEM VILLA VICTORIA', 9, '0', '2', '', NULL, 2, '', 'ME GUSTO', 'SI', 2, '', 1, 'ME GUSTA', 2, '', '1', 11),
(7, 2, 'UUEM', 3, '2015', 'UUEM', 8, '2', '2', '', NULL, 2, '', 'ME  GUSTO', 'SI', 2, '', 1, 'ME GUSTA DIBUJAR', 2, '', '1', 1),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, NULL, NULL, 3, '2016', NULL, 95, 'inguna', '2', 'no', NULL, NULL, 'o', NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_area_psicopedagogica`
--

CREATE TABLE `exp_area_psicopedagogica` (
  `id_exp_area_psicopedagogica` int(11) NOT NULL,
  `rendimiento_escolar` int(11) DEFAULT NULL,
  `dominio_idioma` int(11) DEFAULT NULL,
  `otro_idioma` int(11) DEFAULT NULL,
  `conocimiento_compu` int(11) DEFAULT NULL,
  `aptitud_especial` int(11) DEFAULT NULL,
  `comprension` int(11) DEFAULT NULL,
  `preparacion` int(11) DEFAULT NULL,
  `estrategias_aprendizaje` int(11) DEFAULT NULL,
  `organizacion_actividades` int(11) DEFAULT NULL,
  `concentracion` int(11) DEFAULT NULL,
  `solucion_problemas` int(11) DEFAULT NULL,
  `condiciones_ambientales` int(11) DEFAULT NULL,
  `busqueda_bibliografica` int(11) DEFAULT NULL,
  `trabajo_equipo` int(11) DEFAULT NULL,
  `id_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_area_psicopedagogica`
--

INSERT INTO `exp_area_psicopedagogica` (`id_exp_area_psicopedagogica`, `rendimiento_escolar`, `dominio_idioma`, `otro_idioma`, `conocimiento_compu`, `aptitud_especial`, `comprension`, `preparacion`, `estrategias_aprendizaje`, `organizacion_actividades`, `concentracion`, `solucion_problemas`, `condiciones_ambientales`, `busqueda_bibliografica`, `trabajo_equipo`, `id_alumno`) VALUES
(1, 2, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 8),
(5, 2, 1, 1, 2, 3, 3, 2, 2, 2, 2, 2, 2, 2, 2, 10),
(6, 2, 1, 1, 2, 1, 2, 2, 3, 1, 2, 2, 2, 2, 2, 11),
(7, 1, 3, 2, 1, 3, 3, 3, 3, 2, 4, 3, 4, 1, 3, 1),
(8, 1, NULL, 3, NULL, NULL, 2, 1, NULL, 3, 2, NULL, NULL, NULL, NULL, 9),
(9, 1, NULL, 3, NULL, NULL, 2, 1, NULL, 3, 2, NULL, NULL, NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_asigna_alumnos`
--

CREATE TABLE `exp_asigna_alumnos` (
  `id_alumno` int(11) NOT NULL,
  `id_asigna_generacion` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_asigna_alumno` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_asigna_alumnos`
--

INSERT INTO `exp_asigna_alumnos` (`id_alumno`, `id_asigna_generacion`, `created_at`, `updated_at`, `id_asigna_alumno`, `estado`) VALUES
(9, 1, '2020-01-10 16:01:55', '0000-00-00 00:00:00', 1, 3),
(10, 1, '2020-01-10 16:01:53', '0000-00-00 00:00:00', 2, 3),
(11, 1, '2020-01-07 05:19:09', '0000-00-00 00:00:00', 3, 2),
(17, 2, '2019-12-09 03:51:16', '0000-00-00 00:00:00', 4, 1),
(18, 2, '2019-12-09 03:51:18', '0000-00-00 00:00:00', 5, 1),
(20, 2, '2019-12-09 03:51:20', '0000-00-00 00:00:00', 6, 1),
(1, 8, '2020-01-05 07:51:04', '0000-00-00 00:00:00', 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_asigna_coordinador`
--

CREATE TABLE `exp_asigna_coordinador` (
  `id_asigna_coordinador` int(11) NOT NULL,
  `id_jefe_periodo` int(11) DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_asigna_expediente`
--

CREATE TABLE `exp_asigna_expediente` (
  `id_asigna_expediente` int(11) NOT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_exp_general` int(11) DEFAULT NULL,
  `id_exp_antecedentes_academicos` int(11) DEFAULT NULL,
  `id_exp_datos_familiares` int(11) DEFAULT NULL,
  `id_exp_habitos_estudio` int(11) DEFAULT NULL,
  `id_exp_formacion_integral` int(11) DEFAULT NULL,
  `id_exp_area_psicopedagogica` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_asigna_generacion`
--

CREATE TABLE `exp_asigna_generacion` (
  `id_asigna_generacion` int(11) NOT NULL,
  `id_generacion` int(11) DEFAULT NULL,
  `grupo` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_asigna_generacion`
--

INSERT INTO `exp_asigna_generacion` (`id_asigna_generacion`, `id_generacion`, `grupo`, `id`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 2, 1, 1),
(4, 2, 2, 1),
(5, 3, 1, 1),
(6, 4, 1, 1),
(7, 4, 2, 1),
(8, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_asigna_tutor`
--

CREATE TABLE `exp_asigna_tutor` (
  `id_asigna_tutor` int(11) NOT NULL,
  `id_jefe_periodo` int(11) DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `id_asigna_generacion` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_asigna_tutor`
--

INSERT INTO `exp_asigna_tutor` (`id_asigna_tutor`, `id_jefe_periodo`, `id_personal`, `id_asigna_generacion`, `estado`) VALUES
(35, 12, 6, 8, 1),
(38, 11, 7, 2, 1),
(39, 11, 14, 3, 1),
(42, 11, 6, 4, 1),
(44, 11, 6, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_bachillerato`
--

CREATE TABLE `exp_bachillerato` (
  `id_bachillerato` int(11) NOT NULL,
  `desc_bachillerato` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_bachillerato`
--

INSERT INTO `exp_bachillerato` (`id_bachillerato`, `desc_bachillerato`) VALUES
(1, 'Técnico'),
(2, 'General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_bebidas`
--

CREATE TABLE `exp_bebidas` (
  `id_expbebidas` int(11) NOT NULL,
  `descripcion_bebida` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_bebidas`
--

INSERT INTO `exp_bebidas` (`id_expbebidas`, `descripcion_bebida`) VALUES
(1, 'Nunca'),
(2, 'Rara vez'),
(3, 'Aveces'),
(4, 'Frecuentemente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_civil_estados`
--

CREATE TABLE `exp_civil_estados` (
  `id_estado_civil` int(11) NOT NULL,
  `desc_ec` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_civil_estados`
--

INSERT INTO `exp_civil_estados` (`id_estado_civil`, `desc_ec`) VALUES
(1, 'Soltero'),
(2, 'Casado'),
(3, 'Unión libre'),
(4, 'Divorsiado'),
(5, 'Viudo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_datos_familiares`
--

CREATE TABLE `exp_datos_familiares` (
  `id_exp_datos_familiares` int(11) NOT NULL,
  `nombre_padre` varchar(255) DEFAULT NULL,
  `edad_padre` int(11) DEFAULT NULL,
  `ocupacion_padre` varchar(100) DEFAULT NULL,
  `lugar_residencia_padre` varchar(255) DEFAULT NULL,
  `nombre_madre` varchar(255) DEFAULT NULL,
  `edad_madre` int(11) DEFAULT NULL,
  `ocupacion_madre` varchar(100) DEFAULT NULL,
  `lugar_residencia_madre` varchar(255) DEFAULT NULL,
  `no_hermanos` int(11) DEFAULT NULL,
  `lugar_ocupas` varchar(45) DEFAULT NULL,
  `id_opc_vives` int(11) DEFAULT NULL,
  `no_personas` int(11) DEFAULT NULL,
  `etnia_indigena` int(11) DEFAULT NULL,
  `cual_etnia` varchar(45) DEFAULT NULL,
  `hablas_lengua_indigena` int(11) DEFAULT NULL,
  `sostiene_economia_hogar` varchar(45) DEFAULT NULL,
  `id_familia_union` int(11) DEFAULT NULL,
  `nombre_tutor` varchar(100) DEFAULT NULL,
  `id_parentesco` varchar(10) DEFAULT NULL,
  `id_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_datos_familiares`
--

INSERT INTO `exp_datos_familiares` (`id_exp_datos_familiares`, `nombre_padre`, `edad_padre`, `ocupacion_padre`, `lugar_residencia_padre`, `nombre_madre`, `edad_madre`, `ocupacion_madre`, `lugar_residencia_madre`, `no_hermanos`, `lugar_ocupas`, `id_opc_vives`, `no_personas`, `etnia_indigena`, `cual_etnia`, `hablas_lengua_indigena`, `sostiene_economia_hogar`, `id_familia_union`, `nombre_tutor`, `id_parentesco`, `id_alumno`) VALUES
(1, 'SILVIANO VERA BERNAL', 48, 'AGRICULTOR', 'SABANA DE SAN JERONIMO', 'MARIA GUADALUPE SOTERO MARTINEZ', 50, 'AMA DE CASA', 'SABANA DE SAN JERONIMO', 4, '1', 2, 4, 1, 'OTOMI', 1, 'HERMANO', 1, 'MARIA GUADALUPE SOTERO MARTINEZ', 'MAMÁ', 8),
(5, 'ISSAC REYES LOPEZ', 48, 'CHOFER', 'SANTO TOMAS', 'VALENTINA SUAREZ JIMENES', 45, 'AMA DE CASA', 'SAN JERONIMO', 0, '1', 1, 3, 1, 'MAZAHUA', 1, 'PADRE', 1, 'VALENTINA SUAREZ JIMENEZ', 'MADRE', 10),
(6, 'Antonio Benavidez Sosa', 40, 'COMERCIANTE', 'SAN ANTONIO', 'Marcelina Santiago Jimenez', 37, 'AMA DE CASA', 'DONATO GUERRA', 2, '1', 1, 4, 2, '', 1, 'PADRE', 1, 'marcelina santiago jimenez', 'madre', 11),
(7, 'MARCOS LOPEZ LOPEZ', 50, 'CHOFER', 'VILLA VICTORIA', 'MARGARITA MAURO ESTRADA', 47, 'AMA DE CASA', 'VILLA VICTORIA', 2, '1', 1, 4, 2, '', 2, 'PADRE', 1, 'MARGARITA MAURO ESTRADA', 'MADRE', 1),
(8, 'JUAN CARLOS VILCHIS VILCHUS', 45, 'MECANICO', 'SAN AMRTIN', 'ANGELINA MARTINEZ VENTURA', 47, 'AMA DE CASA', 'SAN MARTIN', 1, NULL, NULL, NULL, NULL, 'NINGUNA', NULL, NULL, NULL, 'ANGELINA MARTINEZ VENTURA', NULL, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_escalas`
--

CREATE TABLE `exp_escalas` (
  `id_escala` int(11) NOT NULL,
  `desc_escala` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_escalas`
--

INSERT INTO `exp_escalas` (`id_escala`, `desc_escala`) VALUES
(1, 'Excelente'),
(2, 'Muy Bien'),
(3, 'Bien'),
(4, 'Regular'),
(5, 'Mala');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_familia_union`
--

CREATE TABLE `exp_familia_union` (
  `id_familia_union` int(11) NOT NULL,
  `desc_union` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_familia_union`
--

INSERT INTO `exp_familia_union` (`id_familia_union`, `desc_union`) VALUES
(1, 'Unida'),
(2, 'Muy unida'),
(3, 'Disfuncional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_formacion_integral`
--

CREATE TABLE `exp_formacion_integral` (
  `id_exp_formacion_integral` int(11) NOT NULL,
  `practica_deporte` int(11) DEFAULT NULL,
  `especifica_deporte` varchar(100) DEFAULT NULL,
  `practica_artistica` int(11) DEFAULT NULL,
  `especifica_artistica` varchar(100) DEFAULT NULL,
  `pasatiempo` varchar(100) DEFAULT NULL,
  `actividades_culturales` int(11) DEFAULT NULL,
  `cuales_act` varchar(100) DEFAULT NULL,
  `estado_salud` int(11) DEFAULT NULL,
  `enfermedad_cronica` int(11) DEFAULT NULL,
  `especifica_enf_cron` varchar(100) DEFAULT NULL,
  `enf_cron_padre` int(11) DEFAULT NULL,
  `especifica_enf_cron_padres` varchar(100) DEFAULT NULL,
  `operacion` int(11) DEFAULT NULL,
  `deque_operacion` varchar(255) DEFAULT NULL,
  `enfer_visual` int(11) DEFAULT NULL,
  `especifica_enf` varchar(100) DEFAULT NULL,
  `usas_lentes` int(11) DEFAULT NULL,
  `medicamento_controlado` int(11) DEFAULT NULL,
  `especifica_medicamento` varchar(100) DEFAULT NULL,
  `estatura` varchar(10) DEFAULT NULL,
  `peso` varchar(10) DEFAULT NULL,
  `accidente_grave` int(11) DEFAULT NULL,
  `relata_breve` varchar(255) DEFAULT NULL,
  `id_expbebidas` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_formacion_integral`
--

INSERT INTO `exp_formacion_integral` (`id_exp_formacion_integral`, `practica_deporte`, `especifica_deporte`, `practica_artistica`, `especifica_artistica`, `pasatiempo`, `actividades_culturales`, `cuales_act`, `estado_salud`, `enfermedad_cronica`, `especifica_enf_cron`, `enf_cron_padre`, `especifica_enf_cron_padres`, `operacion`, `deque_operacion`, `enfer_visual`, `especifica_enf`, `usas_lentes`, `medicamento_controlado`, `especifica_medicamento`, `estatura`, `peso`, `accidente_grave`, `relata_breve`, `id_expbebidas`, `id_alumno`) VALUES
(1, 1, 'FUTBOL', 1, 'DIBUJO', 'FAMILIA, AMIGOS, GRUPO', 1, 'DANZA', 2, 1, 'CORAZON', 1, 'CORAZON', 1, 'CORAZON', 1, 'MIOPIA', 1, 1, 'PCTML', '1.57', '60', 1, 'AUTO', 0, 8),
(5, 1, 'FUTBOL', 2, '', 'VER VIDEOS', 2, '', 1, 2, '', 2, '', 2, '', 2, '', 2, 2, '', '1.58', '54', 2, '', 0, 10),
(6, 2, '', 2, '', 'leer', 2, '', 1, 2, '', 2, '', 2, '', 2, '', 1, 2, '', '1.50', '52', 2, '', 0, 11),
(7, 2, '', 1, 'CORRER', 'DIBUJAR', 2, '', 1, 2, '', 2, '', 2, '', 2, '', 1, 2, '', '1.65', '65', 2, '', 0, 1),
(8, NULL, NULL, NULL, NULL, 'ERR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '7', '7', NULL, NULL, 0, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_generacion`
--

CREATE TABLE `exp_generacion` (
  `id_generacion` int(11) NOT NULL,
  `generacion` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_generacion`
--

INSERT INTO `exp_generacion` (`id_generacion`, `generacion`, `created_at`, `updated_at`) VALUES
(1, 2016, '2019-11-24 04:55:01', '0000-00-00 00:00:00'),
(2, 2017, '2019-11-24 04:55:01', '0000-00-00 00:00:00'),
(3, 2018, '2019-11-24 04:56:52', '0000-00-00 00:00:00'),
(4, 2019, '2019-11-24 04:56:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_generales`
--

CREATE TABLE `exp_generales` (
  `id_exp_general` int(11) NOT NULL,
  `id_periodo` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `fecha_nacimientos` date DEFAULT NULL,
  `lugar_nacimientos` varchar(255) DEFAULT NULL,
  `id_semestre` int(11) DEFAULT NULL,
  `id_estado_civil` int(11) DEFAULT NULL,
  `no_hijos` int(11) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `tel_casa` varchar(10) DEFAULT NULL,
  `cel` varchar(10) DEFAULT NULL,
  `id_nivel_economico` int(11) DEFAULT NULL,
  `trabaja` int(11) DEFAULT NULL,
  `ocupacion` varchar(100) DEFAULT NULL,
  `horario` varchar(45) DEFAULT NULL,
  `no_cuenta` varchar(45) DEFAULT NULL,
  `beca` int(11) DEFAULT NULL,
  `tipo_beca` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `turno` int(11) DEFAULT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `poblacion` varchar(10) DEFAULT NULL,
  `ant_inst` varchar(10) DEFAULT NULL,
  `satisfaccion_c` varchar(10) DEFAULT NULL,
  `materias_repeticion` int(11) DEFAULT NULL,
  `tot_repe` int(11) DEFAULT NULL,
  `materias_especial` int(11) DEFAULT NULL,
  `tot_espe` int(11) DEFAULT NULL,
  `gen_espe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_generales`
--

INSERT INTO `exp_generales` (`id_exp_general`, `id_periodo`, `nombre`, `edad`, `sexo`, `fecha_nacimientos`, `lugar_nacimientos`, `id_semestre`, `id_estado_civil`, `no_hijos`, `direccion`, `correo`, `tel_casa`, `cel`, `id_nivel_economico`, `trabaja`, `ocupacion`, `horario`, `no_cuenta`, `beca`, `tipo_beca`, `estado`, `turno`, `id_alumno`, `id_grupo`, `id_carrera`, `poblacion`, `ant_inst`, `satisfaccion_c`, `materias_repeticion`, `tot_repe`, `materias_especial`, `tot_espe`, `gen_espe`) VALUES
(1, 1, 'YOSELIN VERA SOTERO', 21, 'F', '1998-01-28', 'TOLUCA', 7, 1, 0, 'SABANA DE SAN JERONIMO', 'isc_vera.y@tesvb.edu.mx', '7228495620', '7228759698', 3, 1, 'INVENTARIOS', 'Despertino', '201607042', 1, 'MANUTENCION FEDERAL 20000', 1, 1, 8, 13, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 2, 'JEOVANY', 25, 'M', '2019-11-15', 'mx', 4, 1, 1, 'vb', 'j@gmail.com', '72222222', '72222', 2, 1, 'AGRICULTOR', 'HHH', '201207017', 2, '', 2, 1, 2, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 1, 'ISABEL', 21, 'F', '1998-01-05', 'TOLUCA', 1, 1, 0, 'VALLE DE BRAVO', 'isc_isabel@texvb.edu.mx', '7859624447', '7258965214', 1, 2, '', 'Matutino', '201607025', 1, 'Manutencion', 1, 1, 10, 5, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 1, 'ALEXA', 21, 'F', '1998-01-15', 'TOLUCA', 3, 1, 0, 'VILLA VICTORIA', 'isc_alexa@tesvb.edu.mx', '7258965412', '7214563258', 2, 1, 'MESERA', 'MATUTINO', '201607044', 2, '', 1, 1, 11, 5, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 1, 'ALEJANDRO', 22, 'M', '1997-01-08', 'VILLA VICTORIA', 7, 1, 0, 'VILLA VICTORIA', 'isc_alejandro@tesvb.edu.mx', '7214589632', '7216321458', 2, 1, 'Mecanico', 'matutino', '201207039', 2, '', 2, 1, 1, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 2, 'DANIELA MICHELLE VILCHIS MARTINEZ', 21, 'F', NULL, NULL, NULL, NULL, 0, 'SAN MARTIN OBISPO', 'isc_vilchis.d@tesvb.edu,mx', '7228832212', '7228832212', NULL, 2, 'sss', 'matutino', '201607043', 1, NULL, 1, 1, 9, 9, 9, 'Rural', 'Continuaci', 'Muy satisf', 2, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_grupos_activos`
--

CREATE TABLE `exp_grupos_activos` (
  `id_grupo_activo` int(11) NOT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  `id_periodo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_habitos_estudio`
--

CREATE TABLE `exp_habitos_estudio` (
  `id_exp_habitos_estudio` int(11) NOT NULL,
  `tiempo_empelado_estudiar` varchar(45) DEFAULT NULL,
  `id_opc_intelectual` int(11) DEFAULT NULL,
  `forma_estudio` varchar(45) DEFAULT NULL,
  `tiempo_libre` varchar(100) DEFAULT NULL,
  `asignatura_preferida` varchar(100) DEFAULT NULL,
  `porque_asignatura` varchar(100) DEFAULT NULL,
  `asignatura_dificil` varchar(100) DEFAULT NULL,
  `porque_asignatura_dificil` varchar(100) DEFAULT NULL,
  `opinion_tu_mismo_estudiante` varchar(255) DEFAULT NULL,
  `id_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_habitos_estudio`
--

INSERT INTO `exp_habitos_estudio` (`id_exp_habitos_estudio`, `tiempo_empelado_estudiar`, `id_opc_intelectual`, `forma_estudio`, `tiempo_libre`, `asignatura_preferida`, `porque_asignatura`, `asignatura_dificil`, `porque_asignatura_dificil`, `opinion_tu_mismo_estudiante`, `id_alumno`) VALUES
(1, '2', 3, 'VISUAL-AUDITIVO', 'LEER, COMPARTIR TIEMPO CON MI FAMILIA, PRACTICAR DEPORTE, VER PELICULAS', 'BASE DE DATOS', 'ME GUSTAN LOS SISTEMAS DE INFORMACIÓN', 'DESARROLLO SUSTENTABLE', 'ES MUCHA TEORIA', 'SOY RESPONSABLE', 8),
(5, '2', 2, 'VISUAL', 'JUGAR', 'MATEMATICAS', 'ME GUSTAN', 'ESPAÑO', 'TEORIA', 'GOOD', 10),
(6, '2', 2, 'auditiva', 'trabajo en el hogar', 'español', 'me gusta leer', 'matematicas', 'no les entiendo', 'bueno', 11),
(7, '3', 1, 'AUDITIVO', 'TRABAJAR', 'ESPAÑOL', 'ES FACIL', 'MATEMATICAS', 'NO LES ENTIENDO BIEN', 'BUEN ESTUDIANTE', 1),
(8, NULL, NULL, 'AUDITIVA', 'VER VIDEOS', NULL, 'ME GUSTA', 'ESPAÑOL', 'ES TEORIA', 'ME GUSTA', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_opc_intelectual`
--

CREATE TABLE `exp_opc_intelectual` (
  `id_opc_intelectual` int(11) NOT NULL,
  `desc_opc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_opc_intelectual`
--

INSERT INTO `exp_opc_intelectual` (`id_opc_intelectual`, `desc_opc`) VALUES
(1, 'Muy rápido'),
(2, 'Rápido'),
(3, ' Regular'),
(4, 'Lento'),
(5, ' Muy lento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_opc_nivel_socio`
--

CREATE TABLE `exp_opc_nivel_socio` (
  `id_nivel_economico` int(11) NOT NULL,
  `desc_opc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_opc_nivel_socio`
--

INSERT INTO `exp_opc_nivel_socio` (`id_nivel_economico`, `desc_opc`) VALUES
(1, 'Alto'),
(2, 'Medio'),
(3, 'Bajo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_opc_tiempo`
--

CREATE TABLE `exp_opc_tiempo` (
  `id_opc_tiempo` int(11) NOT NULL,
  `desc_opc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_opc_tiempo`
--

INSERT INTO `exp_opc_tiempo` (`id_opc_tiempo`, `desc_opc`) VALUES
(1, 'Menos de 1 hora'),
(2, '1 hora'),
(3, '2 horas'),
(4, '3 horas'),
(5, 'mas de 4 horas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_opc_vives`
--

CREATE TABLE `exp_opc_vives` (
  `id_opc_vives` int(11) NOT NULL,
  `desc_opc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_opc_vives`
--

INSERT INTO `exp_opc_vives` (`id_opc_vives`, `desc_opc`) VALUES
(1, 'Con los padres'),
(2, 'Con otros estudiantes'),
(3, 'Con tios u otros familiares'),
(4, 'Solo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_parentescos`
--

CREATE TABLE `exp_parentescos` (
  `id_parentesco` int(11) NOT NULL,
  `desc_parentesco` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_parentescos`
--

INSERT INTO `exp_parentescos` (`id_parentesco`, `desc_parentesco`) VALUES
(1, 'Madre'),
(2, 'Padre'),
(3, 'Tío(a)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_tiempoestudia`
--

CREATE TABLE `exp_tiempoestudia` (
  `id_tiempoestudia` int(11) NOT NULL,
  `descripcion_tiempo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_tiempoestudia`
--

INSERT INTO `exp_tiempoestudia` (`id_tiempoestudia`, `descripcion_tiempo`) VALUES
(1, 'Menos de 1 hora'),
(2, '1 hora'),
(3, '2 horas'),
(4, '3 horas'),
(5, 'Más de 4 horas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_turno`
--

CREATE TABLE `exp_turno` (
  `id_turno` int(11) NOT NULL,
  `descripcion_turno` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_turno`
--

INSERT INTO `exp_turno` (`id_turno`, `descripcion_turno`) VALUES
(1, 'Matutino'),
(2, 'Vespertino'),
(3, 'Mixto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_alumnos`
--

CREATE TABLE `gnral_alumnos` (
  `id_alumno` int(11) NOT NULL,
  `cuenta` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apaterno` varchar(50) DEFAULT NULL,
  `amaterno` varchar(50) DEFAULT NULL,
  `genero` varchar(5) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `curp_al` varchar(18) DEFAULT NULL,
  `edo_civil` varchar(45) DEFAULT NULL,
  `nacionalidad` varchar(45) DEFAULT NULL,
  `twiter_al` varchar(45) DEFAULT NULL,
  `correo_al` varchar(45) DEFAULT NULL,
  `facebook_al` varchar(45) DEFAULT NULL,
  `cel_al` varchar(45) DEFAULT NULL,
  `tel_fijo_al` varchar(45) DEFAULT NULL,
  `entidad_nac_al` varchar(45) DEFAULT NULL,
  `grado_estudio_al` varchar(45) DEFAULT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `id_semestre` int(11) DEFAULT NULL,
  `grupo` int(11) DEFAULT NULL,
  `promedio` double DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `id_municipio` int(11) DEFAULT NULL,
  `calle_al` varchar(50) DEFAULT NULL,
  `n_ext_al` varchar(50) DEFAULT NULL,
  `n_int_al` varchar(50) DEFAULT NULL,
  `entre_calle` varchar(50) DEFAULT NULL,
  `y_calle` varchar(50) DEFAULT NULL,
  `otra_ref` varchar(500) DEFAULT NULL,
  `colonia_al` varchar(50) DEFAULT NULL,
  `localidad_al` varchar(50) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `sesion` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gnral_alumnos`
--

INSERT INTO `gnral_alumnos` (`id_alumno`, `cuenta`, `nombre`, `apaterno`, `amaterno`, `genero`, `fecha_nac`, `edad`, `curp_al`, `edo_civil`, `nacionalidad`, `twiter_al`, `correo_al`, `facebook_al`, `cel_al`, `tel_fijo_al`, `entidad_nac_al`, `grado_estudio_al`, `id_carrera`, `id_semestre`, `grupo`, `promedio`, `estado`, `id_municipio`, `calle_al`, `n_ext_al`, `n_int_al`, `entre_calle`, `y_calle`, `otra_ref`, `colonia_al`, `localidad_al`, `cp`, `id_usuario`, `sesion`, `created_at`, `updated_at`) VALUES
(1, 201207039, 'ALEJANDRO', 'GILLAN', 'GONZALEZ', 'M', '1994-09-08', 22, 'MOGFFSJNSSKD99GSG', 'SOLTERO', 'MEXICANA', '', 'ale@gmail.com', 'ALEJANDRO GM', '722485697', '755423698', '15', 'BACHILLERATO', 2, 7, 1, 91, 15, 769, 'VALLE', 'S/N', 'S/N', 'SIN CALLE', 'SAN ILDEFONSO', 'A UN COSTADO DE HERRERIA GONZALEZ', 'VALLE', 'VALLE', '51200', 55, NULL, '2020-01-05 20:10:38', '2017-04-07 01:31:07'),
(2, 201207017, 'JEOVANY', 'VERA', 'MILLAN', 'M', '1994-03-08', 20, 'EUMJ9403025LHF', 'SOLTERO', 'MEXICANA', 'NO', 'vera@gmail.com', 'NO', '7225421879', '0', '15', 'LICENCIATURA', 9, 2, 2, 90, 15, 767, 'COLORINES', 'S/N', 'S/N', '', '', 'A 100M DEL CAMPO', 'COLORINES', 'COLORINES', '54520', 56, NULL, '2019-11-24 22:14:16', '2017-04-04 23:19:03'),
(3, 201507009, 'JULIO', 'FLORES', 'HERNANDEZ', 'M', '1997-04-09', 19, 'FAHJ970409MCLRRB00', 'SOLTERO', 'MEXICANA', '', 'julio@gmail.com', '', '551284213690', '', '5', 'NIVEL MEDIO', 9, 5, 1, 70, 15, 687, 'VILLA', 's/n', 's/n', 'sin calle', 'sin calle', 'Al lado de la peña', 'la peña', 'la peña', '51078', 59, NULL, '2020-01-05 06:06:12', '2017-11-07 21:45:35'),
(4, 201407032, 'MARIA DANIELA', 'MARTINEZ', 'GUERRA', 'F', '1996-05-29', 20, 'magSDFREF0085', 'SOLTERO', 'MEXICANA', '', 'dAN@gmail.com', '', '55894632014', '', '15', 'BACHILLERATO', 9, 6, 2, 90, 15, 767, 'El arco', '', '', 'el sinfin', 'el sinfin', 'a 30 metros de la depo', 'el arco', 'Valle de Bravo', '51200', 60, NULL, '2020-01-05 06:06:19', '2017-03-30 21:44:14'),
(5, 201507038, 'AURORA', 'VEGA', 'FELIX', 'F', '1997-03-22', 20, 'VAFA9700125FGV', 'CASADO', 'MEXICANA', '', 'BELL@gmail.com', '', '5562054134', '5562054134', '15', 'NIVEL SUPERIO', 9, 6, 1, 80, 15, 661, 'SN/C', 'SN/N', 'SN/N', 'SN/N', 'SN/N', 'SN/N', 'SAN SEBASTIAN', 'SAN SEBASTIAN', '51260', 58, NULL, '2020-01-05 06:06:22', '2018-05-16 17:43:43'),
(6, 201507033, 'VALENTINA', 'HIDALGO', 'PINET', 'F', '1997-05-20', 20, 'SARFHJSS5728NSN', 'VIUDO', 'MEXICANA', '', 'VA@gmail.com', '', '7227915864', '', '15', 'PREPARATORIA', 9, 6, 1, 84, 15, 767, 'VALLE D EBRAVO', '112', '', 'IMSS', 'IMSS', 'A 200 M DEL CONALEP', 'VALLE', 'VALLE', '51230', 61, NULL, '2019-11-24 22:14:16', '2018-05-16 17:59:37'),
(7, 201735045, 'JES', 'MEDINA', 'LILI', 'F', '1997-10-30', 20, 'MDJNNDS5522685SADA', 'CASADO', 'MEXICANA', '', 'JES@GMAIL.COM', 'JESY', '5524688741', '72454623366', '15', 'BACHILLERATO', 2, 4, 1, 85, 15, 733, 'GUERRERO', 'S/N', 'S/N', 'GUERRERO', 'GUERRERO', 'A 500 M DE LA IGLESIA', 'GUERRERO', 'GUERRERO', '51470', 62, NULL, '2020-01-05 06:06:35', '2018-05-17 19:17:23'),
(8, 201607042, 'YOSELIN', 'VERA', 'SOTERO', 'F', '1998-01-28', 20, 'VESY980128MMCRTS05', 'SOLTERO', 'MEXICANA', '', 'isc_vera.y@tesvb.edu.mx', '', '5578948739', '', '15', 'BACHILLERATO', 9, 4, 1, 93, 15, 769, 'SIN CALLE', 'S/N', 'S/N', 'SIN CALLE', 'SIN CALLE', 'CERCA DE LA CASA SDE LA SRA ELENA BERNAL ARIAS ', 'SABANA DE SAN JERONIMO', 'SABANA DE SAN JERONIMO', '51000', 64, NULL, '2019-11-24 22:14:16', '2018-05-16 22:17:42'),
(9, 201607043, 'DANIELA MICHELLE', 'VILCHIS', 'MARTINEZ', 'F', '1998-10-14', 19, 'VIMD981014MMCLRN05', 'SOLTERO', 'MEXICANA', '', 'danysmichi@gmail.com', '', '7261021720', '7261021720', '15', 'BACHILLERATO', 9, 4, 1, 95, 15, 687, 'S/C', 'S/N', 'S/N', 'S/C', 'S/C', '100M DE LA IGLESIA', 'SAN MARTIN OBISPO', 'SAN MARTIN OBISPO', '51030', 8, NULL, '2020-01-16 19:01:29', '2018-06-01 21:57:50'),
(10, 201607025, 'ISABEL', 'SONNY', 'VEGA', 'F', '1998-08-15', 19, 'ISA528524AYHSH552', 'CASADO', 'MEXICANA', '0', 'is@hotmail.com', 'ISA VE', '55426584152', '72258745666', '15', 'PREPA', 9, 4, 1, 87, 15, 767, 'TOLUCA', 'S/N', 's/n', 'TOLUCA', 'TOLUCA', 'casa naranja', 'TOLUCA', 'TOLUCA', '54500', 66, NULL, '2020-01-05 06:06:42', '2018-05-16 23:08:45'),
(11, 201607044, 'ALEXA', 'VILLA', 'JULIO', 'F', '1998-09-22', 19, 'ALBSDBET54568HSDN', 'SOLTERO', 'MEXICANA', '', 'ALE@tesvb.edu.mx', '', '5548546546464', '', '15', 'PREPARATORIA', 9, 4, 1, 80, 15, 767, 'CERRADA AVE DE LOMA', 'S/N', 'S/N', 'GIRASOL', '1ERA CERRADA AVE DE LOMA', 'Final de la calle', 'RINCÓN VILLA DEL VALLE', 'VALLE DE BRAVO', '51200', 67, NULL, '2020-01-05 06:06:47', '2018-05-16 22:17:12'),
(12, 201635037, 'XIMENA', 'FIERRO', 'CASTILLO', 'F', '1998-06-19', 19, 'HSBDKBSA88546SR01', 'SOLTERO', 'MEXICANA', '', 'XIM@gmail.com', 'XIM HD', '5885655656', '54221433116', '15', 'Bachillerato ', 2, 4, 1, 91, 15, 767, 'cerrada centenario', 's/n', 's/n', 'Manuel Bautista', 'CERCA DEL CAMPO', 'a un costado del campo', 'El sifin', 'Valle', '51230', 69, NULL, '2020-01-05 06:06:51', '2018-05-16 22:12:22'),
(13, 201635033, 'JONY', 'BRAVO', 'VILLA', 'M', '1998-08-28', 19, 'JSHDNS866FGJHJ55', 'SOLTERO', 'MEXICANA', '', 'jhv@tesvb.edu.mx', 'jon@hotmail.com', '722546985', '0', '15', 'preparatoria', 2, 4, 1, 88, 15, 767, 'barrio 1', '0', '0', 'barrio 1', 'santa rosa', 'centro', 'barrio 1', 'barrio 1', '51200', 70, NULL, '2019-11-24 22:16:54', '2018-05-16 22:24:39'),
(14, 201635032, 'Emi', 'Polo', 'Avila', 'M', '1998-09-24', 19, 'sfsgd578678fddasf', 'SOLTERO', 'MEXICANA', '', 'kill@gmail.com', 'KIll AP', '7224585232', '5554593729', '', 'preparatoria', 2, 4, 1, 84, 15, 767, '16 de Septiembre', '517', '11', 'lázaro cardenas', 'uno', 'terminal 1 ', 'centro', 'Valle de Bravo', '51200', 71, NULL, '2019-11-24 22:17:35', '2018-05-16 22:13:48'),
(15, 201635030, 'ANA', 'MIRALRIO', 'MIRALRIO', 'F', '1998-01-06', 20, 'MIOM980106HMCRRG01', 'SOLTERO', 'MEXICANA', '', 'ANI@gmail.com', 'ANITA', '7565546459', '5466118399', '15', 'PREPARATORIA', 2, 4, 1, 86, 15, 767, 'SOR JUANA INES DE LA CRUZ', '0', '0', 'SOR JUANA INES DE LA CRUZ', 'SOR JUANA INES DE LA CRUZ', 'A 10 M DE LA PRIMARIA 2', 'sin colonia', 'SIN ', '51200', 73, NULL, '2020-01-05 06:06:56', '2018-05-16 23:07:32'),
(16, 201635027, 'MELISSA', 'ILL', 'SOLIS', 'F', '1998-12-13', 18, 'MJKHHKL866856JHJKN', 'SOLTERO', 'MEXICANA', 'SIN FACEBOOK', 'isc_ILL@tesvb.edu.mx', 'ILLY', '7225646546', '7546546546', '', 'UNIVERSITARIO', 2, 4, 1, 85, 15, 742, 'el centro', 's/n', 's/n', 'el centro', 'el centro', 'el centro', 'San Jose', 'San Jose', '51320', 74, NULL, '2019-11-24 22:17:24', '2018-05-16 22:17:59'),
(17, 201607011, 'ISAIAS', 'RUFIS', 'JIL', 'M', '1998-07-21', 18, 'EAFSJSAÑJASL656', 'SOLTERO', 'MEXICANA', '', 'isi12@gmail.com', '', '7221410556', '7221410669', '15', 'PREPARATORIA', 9, 4, 1, 76, 15, 767, 'BENITO JUAREZ', 's/n', 'S/n', 'BENITO JUAREZ', 'LA COSTERA', 'BENITO JUAREZ', ' el calvario', 'el calvario', '51200', 75, NULL, '2019-11-24 22:14:16', '2018-05-16 22:14:52'),
(18, 201607022, 'ANA LUISA', 'FELIX', 'HIDALGO', 'F', '1997-10-30', 20, 'GLKJÑHÑJL6546312', 'CASADO', 'MEXICANA', '', 'ani@gmail.com', 'Ani JF', '5521561234', '4656110954', '15', 'NIVEL SUPERIOR', 9, 4, 1, 84, 15, 708, 'GUSTAVO BAZ', 'SN', 'SN', 'GUSTAVO BAZ', 'ABASOLO', 'CERCA DEl PATIO CENTRAL', 'EMILIANO ZAPATA', 'EMILIANO ZAPATA', '51440', 76, NULL, '2019-11-24 22:14:16', '2018-05-16 22:17:53'),
(19, 201635010, 'ALDO', 'DOMINGUEZ', 'DOMINGUEZ', 'M', '1998-08-17', 19, 'ADGDFFG787FGGFDGDF', 'SOLTERO', 'MEXICANA', '', 'icar@gmail.com', 'sin facebook', '5422416594', '5545275727', '15', 'bachillerato', 2, 4, 1, 83, 15, 767, 'S/N', 'S/N', 'S/N', 'el arco', 'el arco', 'el arco', 'el arco', 'el arco', '51200', 77, NULL, '2019-11-24 22:23:29', '2018-05-16 22:14:43'),
(20, 201607021, 'URIEL', 'HERNANDEZ ', 'SOLIS', 'M', '1998-10-23', 19, 'URI68464SDDSDASD', 'SOLTERO', 'MEXICANA', '', 'URI@GMAIL.COM', 'Uri Ng', '7225255865', '7655651655', '', 'nivel superior', 9, 4, 1, 81, 15, 767, 'sn', 'sn', 'sn', 'VALLE DE BRAVO', 'VALLE DE BRAVO', 'A 2KM DEL CENTO ', 'VALLE DE BRAVO', '0028', '21230', 80, NULL, '2019-11-24 22:14:16', '2018-05-16 22:16:36'),
(21, 201635002, 'ALBERTO', 'RIO', 'URIBE', 'M', '1992-04-27', 26, 'DSGSG5757257FDGDFG', 'SOLTERO', 'MEXICANA', '', 'Aalbj@tesvb.edu.mx', '', '', '', '9', 'SUPERIOR', 2, 4, 1, 86, 15, 767, 'LAZARO CARDENAS', '12', '12', 'LAZARO CARDENAS', 'LAZARO CARDENAS', 'FRENTE A LA SECUNDARIA LAZARO CARDENAS', 'CENTRO', 'VALLE DE BRAVO', '51200', 79, NULL, '2019-11-24 22:23:15', '2018-05-16 22:14:39'),
(22, 201635020, 'JOSE', 'TORRES', 'CARRANZA', 'M', '1998-03-13', 20, 'FSHLADF6846464DH', 'SOLTERO', 'MEXICANA', '', 'terres@tesvb.edu.mx', 'sin facebook', '7224995553', '7224991000', '16', 'BACHILLERATO', 2, 4, 1, 85, 15, 769, 'CONOSIDO', 'S/N', 'S/N', 'FRENTE A LA IGLESIA', 'RUMBO A LA PEÑA', 'ADELANTE D ELA GASOLINERA', 'SANTA MARIA ', 'SANTA MARIA ', '51000', 81, NULL, '2019-11-24 22:23:01', '2018-05-16 23:31:28'),
(23, 201607015, 'VALERIO', 'GARCIA ', 'GARCIA ', 'M', '1998-06-18', 19, 'GSAKDBADMCRNC00', 'CASADO', 'MEXICANA', '', 'ivic@tesvb.edu.mx', 'Valerio VV', '722146130', '', '15', 'Bachillerato', 9, 4, 1, 86, 15, 767, 'Av. Juarez', '472', '', 'Av. Juarez', 'Av. Juarez', 'al lado de la tienda circulo K', 'centro', 'Valle de Bravo', '51200', 82, NULL, '2019-11-24 22:14:16', '2018-05-16 22:17:29'),
(24, 201607012, 'LUIS ', 'ARRIAGA', 'FLORES', 'M', '1997-10-13', 20, 'FDGSF654CSNS08', 'SOLTERO', 'MEXICANA', '', 'LUIS13@gmail.com', 'LUIS', '7224665882', '', '', 'MEDIO SUPERIOR', 9, 4, 1, 90, 15, 769, 'Sin Calle', 'Sin Numero', 'Sin Numero', 'Sin Calle', 'Sin Calle', 'Carretera federal Zitacuaro KM684', 'Sin Colonia', 'LA PEÑA', '51000', 78, NULL, '2019-11-24 22:14:16', '2018-05-16 22:15:34'),
(25, 201607007, 'CARLOS', 'CARIBE', 'BENITEZ', 'M', '1996-11-29', 21, 'ASDSA53HMCRNM00', 'SOLTERO', 'MEXICANA', '', 'alh23@gmail.com', '', '7255518705', '', '15', 'Nivel Medio Superior', 9, 4, 1, 82, 15, 767, 'sin calle', '', '9', 'RINCON VILLA DEL VALLE', 'BACHILLERES', 'bachilleres', 'rincon villa del valle', 'valle de bravo', '51200', 83, NULL, '2019-11-24 22:14:16', '2018-07-14 00:48:23'),
(26, 201607003, 'SONIA', 'JONHAS', 'TEVI', 'F', '1998-05-17', 19, 'SAHDAS7544CRLL07', 'SOLTERO', 'MEXICANA', '', 'isc_arias.g@tesvb.edu.mx', 'Glory Arias', '7225022753', '', '15', 'Universitaria', 9, 4, 1, 81, 15, 767, 'Fray.Gregorio Jimenez de la Cuenca', '170', 'S/N', 'la capilla', 'la peña', 'cerca del restaurante Di-gardi', 'centro', 'Valle de Bravo', '51200', 84, NULL, '2019-11-24 22:14:16', '2018-05-16 22:17:32'),
(27, 201635028, 'MARIA GUADALUPE', 'SOTERO', 'WILL', 'F', '1998-08-02', 19, 'DSDS64MCRSN07', 'SOLTERO', 'MEXICANA', '', 'sotero@tesvb.edu.mx', 'María Ángeles', '8465567818', '7256462690', '15', 'LICENCIATURA', 2, 4, 1, 86, 15, 687, 'S/C', 'S/N', 'S/N', 'ESCUELA PRIMARIA', 'CLINICA', 'CENTRO 1', 'centro 2', 'SAN gaspar', '51030', 85, NULL, '2019-11-24 22:22:51', '2018-05-16 22:18:30'),
(28, 201607039, 'OLGA', 'MARTINEZ', 'REYNOSA', 'F', '1998-01-22', 20, 'SKADJSBMMCRYR01', 'SOLTERO', 'MEXICANA', '', 'OLGA@GMAIL.COM', 'SIN CUENTA', '7525526701', '5543224155', '15', 'BACHILLERATO', 9, 4, 1, 87, 15, 767, 'ACATITLAN', 'S/N', 'S/N', 'ACATITLAN', 'ACATITLAN', 'CERVECERIA CARRANZA', 'LOMA DE RODRIGUEZ', 'LOMA DE RODRIGUEZ', '51200', 86, NULL, '2019-11-24 22:14:16', '2018-05-16 23:24:57'),
(29, 201635026, 'DANIELA ', 'MEJIA', 'PINET', 'F', '1998-09-14', 19, 'SDHBDKAB4MMCRZN03', 'SOLTERO', 'MEXICANA', '', 'DAN@tesvb.edu.mx', 'Daniela ', '7225571962', '7225571962', '15', 'Nivel superior', 2, 4, 1, 86, 15, 661, '', '', '', 'DESPUÉS DEL CAMPO', 'ANTES DEL CERVEFRIO', 'DESPUÉS DE LA IGLESIA', 'SAN JERONIMO', 'SAN JERONIMO,SEGUNDA SECCIÓN', '51260', 87, NULL, '2019-11-24 22:22:36', '2018-05-16 22:17:03'),
(30, 201535051, 'JULY', 'BERNAL', 'BERNAL', 'F', '2019-11-12', 21, 'DSFSDF556DFSDSF', 'SOLTERO', 'MEXICANA', NULL, 'july@gmail.com', NULL, '4625651414', '5454645456', 'mexico', 'universidad', 2, 2, 1, 90, 1, 60, 'sc', 'sc', 'sn', 'sn', 'sc', 'A 500m de la desvuaion  de Donato', 'Donato', 'Donato', '51200', 30, NULL, '2019-11-24 22:22:39', '2019-11-08 12:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_carreras`
--

CREATE TABLE `gnral_carreras` (
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `siglas` varchar(20) NOT NULL,
  `COLOR` varchar(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gnral_carreras`
--

INSERT INTO `gnral_carreras` (`id_carrera`, `nombre`, `siglas`, `COLOR`, `updated_at`, `created_at`) VALUES
(1, 'LICENCIATURA EN ADMINISTRACION', 'L.A', 'rojo', '2019-11-23 04:04:10', '0000-00-00 00:00:00'),
(2, 'LICENCIATURA EN ARQUITECTURA', 'ARQ', 'azul', '2019-11-23 04:04:25', '0000-00-00 00:00:00'),
(3, 'INGENIERÍA ELÉCTRICA', 'I.E', 'verde', '2019-11-23 04:03:34', '0000-00-00 00:00:00'),
(4, 'INGENIERIA INDUSTRIAL', 'I.I', 'azul', '2019-06-10 19:05:27', '0000-00-00 00:00:00'),
(5, 'INGENIERIA FORESTAL', 'I.F', 'verde', '2019-06-10 19:05:34', '0000-00-00 00:00:00'),
(6, 'LICENCIATURA EN GASTRONOMIA', 'L.G', 'gris', '2019-11-04 04:02:18', '0000-00-00 00:00:00'),
(7, 'INGENIERÍA MECATRÓNICA', 'I.M', 'rojo', '2019-11-23 04:03:38', '0000-00-00 00:00:00'),
(8, 'LICENCIATURA EN TURISMO', 'L.T', 'azul', '2019-06-17 19:05:52', '0000-00-00 00:00:00'),
(9, 'INGENIERIA EN SISTEMAS COMPUTACIONALES', 'I.S.C', 'negro', '2019-10-23 02:59:58', '0000-00-00 00:00:00'),
(10, 'INGENIERÍA CIVIL', 'I.C', 'gris', '2019-05-13 03:02:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_departamentos`
--

CREATE TABLE `gnral_departamentos` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gnral_departamentos`
--

INSERT INTO `gnral_departamentos` (`id_departamento`, `nombre_departamento`) VALUES
(2, 'JEFATURA'),
(4, 'DESARROLLO ACADÉMICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_grupos`
--

CREATE TABLE `gnral_grupos` (
  `id_grupo` int(11) NOT NULL,
  `grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gnral_grupos`
--

INSERT INTO `gnral_grupos` (`id_grupo`, `grupo`) VALUES
(1, 101),
(2, 102),
(3, 201),
(4, 202),
(5, 301),
(6, 302),
(7, 401),
(8, 402),
(9, 501),
(10, 502),
(11, 601),
(12, 602),
(13, 701),
(14, 702),
(15, 801),
(16, 802),
(17, 901),
(18, 902);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_horarios`
--

CREATE TABLE `gnral_horarios` (
  `id_horario_profesor` int(11) NOT NULL,
  `id_periodo_carrera` int(11) DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `aprobado` varchar(2) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gnral_horarios`
--

INSERT INTO `gnral_horarios` (`id_horario_profesor`, `id_periodo_carrera`, `id_personal`, `aprobado`, `updated_at`, `created_at`) VALUES
(1, 27, 20, '1', '2019-11-24 02:35:43', '2017-06-09 08:10:55'),
(2, 27, 10, '1', '2019-11-24 02:35:47', '2017-06-09 08:25:45'),
(3, 27, 11, '1', '2019-11-24 02:35:52', '2017-06-09 09:04:59'),
(4, 30, 2, '1', '2019-11-24 03:45:51', '2017-06-09 09:05:19'),
(5, 27, 6, '1', '2019-11-24 02:35:57', '2017-06-09 09:06:04'),
(6, 27, 13, '1', '2019-11-24 02:36:01', '2017-06-09 09:08:07'),
(7, 27, 3, '1', '2019-11-24 02:36:05', '2017-06-09 09:20:31'),
(8, 27, 14, '1', '2019-11-24 02:36:09', '2017-06-09 09:20:50'),
(9, 30, 6, '1', '2019-11-24 02:36:39', '2017-06-09 09:21:05'),
(10, 30, 3, '1', '2019-11-24 02:36:41', '2017-06-09 09:23:16'),
(11, 30, 7, '1', '2019-11-24 02:36:45', '2017-06-09 09:24:26'),
(12, 30, 14, '1', '2019-11-24 02:36:49', '2017-06-09 09:26:07'),
(13, 30, 13, '1', '2019-11-24 02:36:54', '2017-06-09 09:26:25'),
(14, 30, 16, '1', '2019-11-24 02:36:56', '2017-06-09 09:27:14'),
(15, 30, 15, '1', '2019-11-24 02:37:00', '2017-06-09 09:27:56'),
(16, 27, 18, '0', '2019-11-24 02:37:06', '2017-06-14 00:31:04'),
(17, 30, 20, '1', '2019-11-23 10:33:28', '2017-06-14 00:31:14'),
(18, 27, 7, '0', '2019-11-24 03:46:02', '2019-11-29 12:00:00'),
(19, 30, 11, '1', '2019-11-24 03:45:35', '2019-11-12 12:00:00'),
(20, 20, 20, '1', '2019-11-23 10:34:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_jefes_periodos`
--

CREATE TABLE `gnral_jefes_periodos` (
  `id_jefe_periodo` int(11) NOT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `tipo_cargo` int(11) NOT NULL,
  `id_periodo` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gnral_jefes_periodos`
--

INSERT INTO `gnral_jefes_periodos` (`id_jefe_periodo`, `id_carrera`, `id_personal`, `tipo_cargo`, `id_periodo`, `updated_at`, `created_at`) VALUES
(1, 9, 2, 1, 1, '2019-11-24 03:55:17', '2019-11-03 06:00:00'),
(2, 2, 8, 1, 1, '2019-11-23 04:39:28', '2019-11-03 06:00:00'),
(3, 3, 17, 1, 1, '2019-11-23 04:39:28', '2019-11-03 06:00:00'),
(4, 4, 12, 1, 1, '2019-11-23 04:39:28', '2019-11-03 06:00:00'),
(5, 5, 21, 1, 1, '2019-11-23 04:39:28', '2019-11-03 06:00:00'),
(6, 6, 22, 1, 1, '2019-11-23 04:39:28', '2019-11-03 06:00:00'),
(7, 7, 23, 1, 1, '2019-11-23 04:39:28', '2019-11-03 06:00:00'),
(8, 8, 24, 1, 1, '2019-11-23 04:39:28', '2019-11-03 06:00:00'),
(9, 1, 25, 1, 1, '2019-11-24 03:55:20', '2019-11-03 06:00:00'),
(10, 10, 26, 1, 1, '2019-11-23 04:39:28', '2019-11-03 06:00:00'),
(11, 9, 2, 1, 2, '2019-11-24 03:58:02', '2019-11-03 06:00:00'),
(12, 2, 8, 1, 2, '2019-11-23 04:39:28', '2019-11-03 06:00:00'),
(13, 3, 17, 1, 2, '2019-11-23 04:39:28', '2019-11-03 06:00:00'),
(14, 4, 12, 1, 2, '2019-11-23 04:39:28', '2019-11-03 06:00:00'),
(15, 5, 21, 1, 2, '2019-11-23 04:39:28', '2019-11-03 06:00:00'),
(16, 6, 22, 1, 2, '2019-11-23 04:39:28', '2019-11-03 06:00:00'),
(17, 7, 23, 1, 2, '2019-11-23 04:39:28', '2019-11-03 06:00:00'),
(18, 8, 24, 1, 2, '2019-11-23 04:39:28', '2019-11-03 06:00:00'),
(19, 1, 25, 1, 2, '2019-11-24 03:55:27', '2019-11-03 06:00:00'),
(20, 10, 26, 1, 2, '2019-11-23 04:39:28', '2019-11-03 06:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_periodos`
--

CREATE TABLE `gnral_periodos` (
  `id_periodo` int(11) NOT NULL,
  `periodo` varchar(50) DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `ciclo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gnral_periodos`
--

INSERT INTO `gnral_periodos` (`id_periodo`, `periodo`, `fecha_inicio`, `fecha_termino`, `ciclo`) VALUES
(1, 'SEPTIEMBRE 2018-FEBRERO 2019', '2018-09-01', '2019-02-28', '0'),
(2, 'MARZO 2019-AGOSTO 2019', '2019-03-01', '2019-08-30', '0'),
(3, 'SEPTIEMBRE 2019-FEBRERO 2020', '2019-09-01', '2020-02-29', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_periodo_carreras`
--

CREATE TABLE `gnral_periodo_carreras` (
  `id_periodo_carrera` int(11) NOT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `id_periodo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gnral_periodo_carreras`
--

INSERT INTO `gnral_periodo_carreras` (`id_periodo_carrera`, `id_carrera`, `id_periodo`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 3, 1),
(8, 3, 2),
(9, 3, 3),
(10, 4, 1),
(11, 4, 2),
(12, 4, 3),
(13, 5, 1),
(14, 5, 2),
(15, 5, 3),
(16, 6, 1),
(17, 6, 2),
(18, 6, 3),
(19, 7, 1),
(20, 7, 2),
(21, 7, 3),
(22, 8, 1),
(23, 8, 2),
(24, 8, 3),
(25, 9, 1),
(26, 9, 3),
(27, 9, 2),
(28, 10, 1),
(29, 10, 2),
(30, 10, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_personales`
--

CREATE TABLE `gnral_personales` (
  `id_personal` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `id_situacion` int(11) DEFAULT NULL,
  `esc_procedencia` text,
  `origen_nac` varchar(30) DEFAULT NULL,
  `fch_nac` varchar(10) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fch_ingreso_tesvb` varchar(10) DEFAULT NULL,
  `nombramiento` varchar(10) DEFAULT NULL,
  `rfc` varchar(13) DEFAULT NULL,
  `fch_recontratacion` varchar(10) DEFAULT NULL,
  `escolaridad` varchar(15) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `clave` int(11) DEFAULT NULL,
  `horas_maxima` int(11) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `cedula` int(11) NOT NULL,
  `sexo` varchar(5) NOT NULL,
  `maximo_horas_ingles` int(11) NOT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gnral_personales`
--

INSERT INTO `gnral_personales` (`id_personal`, `nombre`, `id_perfil`, `id_situacion`, `esc_procedencia`, `origen_nac`, `fch_nac`, `direccion`, `fch_ingreso_tesvb`, `nombramiento`, `rfc`, `fch_recontratacion`, `escolaridad`, `id_cargo`, `clave`, `horas_maxima`, `correo`, `telefono`, `celular`, `cedula`, `sexo`, `maximo_horas_ingles`, `tipo_usuario`, `created_at`, `updated_at`, `id_departamento`) VALUES
(1, 'Gabriela González Vaquez', 1, 1, 'TESVB', 'Valle de Bravo', '1985/12/27', 'Valle de Bravo', '2010/10/01', '0', 'GGGGGG', '2011/10/05', 'LICENCIATURA', 1, 788555, 35, '0', '72626650889', '7222547485', 859620, 'F', 0, 0, '2019-11-24 02:47:53', '2017-03-13 14:27:29', 0),
(2, 'Aldo Hernandez', 1, 1, 'TESVB', 'Valle de Bravo', '1987/10/02', 'Valle de Bravo', '2000/09/03', 'SSS', 'AHHHHT', '2010/09/03', 'LICENCITURA', 1, 7774, 40, 'OOIII', '7859522', '85552222', 77777522, 'M', 0, 1, '2019-11-24 02:48:04', '2019-08-14 16:18:58', 2),
(3, 'Cesar Primero Huerta', 1, 1, 'TESVB', 'Valle de Bravo', '1990/04/25', 'Valle de Bravo', '2008/10/15', 'm', 'uhtr55666', '2015/10/01', 'LICENCIATURA', 0, 85955555, 40, 'h', '89552222', '7258965488', 8965236, 'M', 0, 0, '2019-11-24 02:48:20', '2019-01-16 21:09:31', 0),
(4, 'Ambar González Guadarrama', 1, 1, 'TESVB', 'Valle de Bravo', '1990/04/04', 'Valle de Bravo', '2015/09/01', 'U', 'TGYYUU777', '2015/13/01', 'LICENCITURA', 1, 85996655, 35, 'G', '8596251455', '7225635855', 85412366, 'M', 0, 2, '2019-11-24 02:48:38', '2019-05-03 19:36:45', 0),
(5, 'Antonio Soto Luis', 1, 1, 'TESVB', 'Valle de Bravo', '1985/09/17', 'Valle de Bravo', '2002/09/01', 'ty', 'ghy66777', '2010/05/01', 'MAESTRIA', 1, 7895555, 40, 'soto@gmail.com', '785951222', '7589321555', 78965214, 'M', 0, 4, '2019-11-24 02:48:57', '2019-08-07 16:23:04', 0),
(6, 'Araceli Guerrero Alonso', 1, 1, 'TESVB', 'Valle de Bravo', '1998/10/02', 'Valle de Bravo', '2010/10/01', 'TR', 'FRTY67886', '2015/05/26', 'LICENCIATURA', 1, 78954411, 40, 'ARACELI@GMAIL.COM', '7896521444', '7896521465', 79632541, 'F', 0, 7, '2019-12-08 23:03:24', '2019-11-12 06:00:00', 0),
(7, 'Juan Carlos Garduño Milralrio', 1, 1, 'TESVB', 'Valle de Bravo', '1989/11/15', 'Valle de Bravo', '2014/10/01', 'TRRE', 'JUONBG6788', '2014/08/06', 'LICENCIATURA', 1, 7852222, 35, 'CARLOS@GMAIL.COM', '789552222', '7541236555', 85962222, 'M', 0, 0, '2019-11-24 02:49:21', '2019-08-30 13:27:12', 0),
(8, 'Marcos Salvador Jimenez', 1, 1, 'TESVB', 'Valle de Bravo', '1996/11/08', 'Valle de Bravo', '2011/08/23', 'RSWW', 'DFFF8521455', '2012/05/26', 'LICENCIATURA', 1, 596315255, 40, 'EERR', '725896255', '71458965', 25698811, 'M', 0, 3, '2019-11-24 02:50:02', '2018-09-19 13:16:49', 2),
(9, 'Jimena Lopez Lopez', 1, 1, 'TESVB', 'Valle de Bravo', '1985/05/21', 'Valle de Bravo', '2010/01/25', 'uyy', 'hyygghh8855', '2015/01/01', 'LICENCIATURA', 1, 88555666, 40, 'hhhhh', '75489522222', '72145896666', 154236555, 'F', 0, 0, '2019-11-24 02:50:05', '2019-08-22 17:15:07', 0),
(10, 'Mario Casas Estrada', 1, 1, 'TESVB', 'Valle de Bravo', '1988/01/13', 'Valle de Bravo', '2011/04/02', 'Tsss', 'asdd8888952', '2000/09/02', 'LICENCIATURA', 1, 55588965, 35, 'errd', '7258511226', '7214589654', 589652145, 'M', 0, 0, '2019-11-24 02:50:07', '2017-08-21 13:55:42', 0),
(11, 'Concepcion Pedraza JImenez', 1, 1, 'TESVB', 'Valle de Bravo', '1988/10/24', 'Valle de Bravo', '2010/10/02', 'iii', 'hhttg996555', '2012/05/02', 'LICENCIATURA', 1, 7845112, 35, 'ggg', '7256984152', '7256984123', 524896, 'F', 0, 0, '2019-11-24 02:50:11', '2019-08-09 13:58:30', 0),
(12, 'Rosa Maria Jimenez Torres', 1, 1, 'TESVB', 'Valle de Bravo', '1998/01/16', 'Valle de Bravo', '2001/04/01', 'jjj', 'hhuujj555555', '2011/02/16', 'LICENCIATURA', 1, 552211555, 40, 'jjjj', '7214555899', '2256695555', 5885522, 'M', 0, 6, '2019-11-24 02:50:37', '2019-08-22 17:14:00', 2),
(13, 'Maria Estrada Sanchez', 1, 1, 'TESVB', 'Valle de Bravo', '1980/04/19', 'Valle de Bravo', '2010/10/08', 'de', 'dert4587', '2015/10/01', 'LICENCIATURA', 1, 85488999, 40, 'hhhh', '7524896666', '7214589665', 7598522, 'F', 0, 0, '2019-11-24 02:50:40', '2018-09-11 22:06:22', 0),
(14, 'Cecilia Carbajal Arellano', 1, 1, 'TESVB', 'Valle de Bravo', '1985/10/02', 'Valle de Bravo', '2013/09/01', 'yu', 'htygff7588', '2003/05/03', 'LICENCIATURA', 1, 854966, 40, 'gt', '7258965488', '7214589666', 8547963, 'F', 0, 0, '2019-11-24 02:50:42', '2019-11-10 06:00:00', 0),
(15, 'Marcelo Marin Sanchez', 1, 1, 'TESVB', 'Valle de Bravo', '1985/12/17', 'Valle de Bravo', '2011/10/01', 'hyy', 'ert789555', '2012/05/01', 'LICENCIATURA', 1, 859652, 35, 'rt', '7214589666', '721458966', 758965214, 'F', 0, 0, '2019-11-24 02:50:44', '2019-11-13 06:00:00', 0),
(16, 'Jaime Torres Balbuena', 1, 1, 'TESVB', 'Valle de Bravo', '1990/04/25', 'Valle de Bravo', '2008/10/15', 'tt', 'erfgg6555', '2015/10/01', 'LICENCITURA', 1, 85444555, 35, 'tt', '7258963222', '7224589655', 2541365, 'M', 0, 0, '2019-11-24 02:50:48', '2019-11-03 06:00:00', 0),
(17, 'Antonieta Salazar Gomez', 2, 2, 'TESVB', 'Valle de Bravo', '1985/09/17', 'Valle de Bravo', '2008/10/15', 'hh', 'ftrerf14552', '2010/09/03', 'LICENCITURA', 1, 785552111, 40, 'deeeedd', '7589324554', '7258965214', 1254896552, 'F', 40, 5, '2019-11-24 02:51:12', '2019-11-20 06:00:00', 2),
(18, 'Margarita Mauro Martinez', 1, 1, 'Valle de Bravo', 'Valle de Bravo', '1985/12/17', 'valle', '2000/09/03', 'hyy', 'etfg7854', '2015/10/01', 'LICENCITURA', 1, 75896441, 0, 'tre', '72458965', '72145893', 8542111, 'F', 0, 0, '2019-11-24 02:51:15', '0000-00-00 00:00:00', 0),
(19, 'Julian Santos Salinas ', 1, 1, 'TESVB', 'VALLE', '1998/10/25', 'VALLE', '2015/10/10', 'RT', 'ETFR458965', '2014/10/25', 'LICENCIATURA', 1, 7854522, 0, 'uu', '7214589655', '7214589655', 4587996, 'M', 0, 0, '2019-11-24 02:51:18', '0000-00-00 00:00:00', 0),
(20, 'Maryam Gonzalez Benitez', 1, 1, 'TESVN', 'Valle de Bravo', '1980/04/19', 'valle', '2002/09/01', 'er', 'uuhhy14588', '2015/10/01', 'LICENCITURA', 1, 458796, 40, 'jjuu', '75489552', '754895522', 785466, 'F', 0, 0, '2019-11-24 02:51:21', '0000-00-00 00:00:00', 0),
(21, 'Marisol Dominguez Reyes', 1, 1, 'TESVB', 'VALLE', '1990/04/04', 'VALLE', '2008/10/15', 'er', 'HYYY78545', '2010/09/03', 'LICENCITURA', 1, 785412365, 0, 'JJJ', '754128966', '758962145', 458965214, 'F', 0, 0, '2019-11-24 02:51:23', '0000-00-00 00:00:00', 2),
(22, 'Erick Reyes Lopez', 1, 1, 'TESVB', 'VALLEQ', '1980/04/19', 'VALLE', '2008/10/15', 'ER', 'ERTFF854785', '2003/05/03', 'LICENCITURA', 1, 7854469, 0, 'JI', '7589541222', '754128955', 785412458, 'M', 0, 0, '2019-11-24 02:51:26', '0000-00-00 00:00:00', 2),
(23, 'Rosa Maria Vilchis Vilchis', 1, 1, 'TESVB', 'VALLE', '1985/10/02', 'VALLE', '2001/04/01', 'EER', 'ERTG784455', '2003/05/03', 'LICENCITURA', 1, 785455, 0, 'KIII', '72144559', '725958555', 784522, 'F', 0, 0, '2019-11-24 02:51:29', '0000-00-00 00:00:00', 2),
(24, 'Ramiro Gonzalez Gonzalez', 1, 1, 'TESVB', 'VALLE', '1990/04/25', 'VALLE', '2001/04/01', 'ER', 'ERTF78555', '2015/10/01', 'LICENCITURA', 1, 785466, 0, 'JJJ', '758965255', '72145896', 458796, 'F', 0, 0, '2019-11-24 02:51:31', '0000-00-00 00:00:00', 2),
(25, 'CARMEN FLORES FLORES', 1, 1, 'TESVB', 'VALLE', '1998/10/25', 'VALLE', '2015/10/10', 'RE', 'ERTF895412', '2013/10/25', 'LICENCIATURA', 1, 8925666, 0, 'IIII', '7215478996', '7214589655', 458752, 'F', 0, 0, '2019-11-24 02:51:34', '0000-00-00 00:00:00', 2),
(26, 'SOLEDAD SANTANA SANTANA', 1, 1, 'TESVB', 'Valle de Bravo', '1985/12/17', 'VALLE', '2001/04/01', 'TR', 'ERTD8555', '2000/09/02', 'LICENCITURA', 1, 745896, 0, 'UUU', '745892222', '745895555', 452126, 'F', 0, 4, '2019-11-23 04:32:50', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_semestres`
--

CREATE TABLE `gnral_semestres` (
  `id_semestre` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gnral_semestres`
--

INSERT INTO `gnral_semestres` (`id_semestre`, `descripcion`) VALUES
(1, 'PRIMERO'),
(2, 'SEGUNDO'),
(3, 'TERCERO'),
(4, 'CUARTO'),
(5, 'QUINTO'),
(6, 'SEXTO'),
(7, 'SEPTIMO'),
(8, 'OCTAVO'),
(9, 'NOVENO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_tipos_usuario`
--

CREATE TABLE `gnral_tipos_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gnral_tipos_usuario`
--

INSERT INTO `gnral_tipos_usuario` (`id_tipo_usuario`, `descripcion`) VALUES
(1, 'Alumno'),
(3, 'Profesor'),
(4, 'Jefatura de División');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `activated` int(11) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `info_ok` int(11) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `activated`, `tipo_usuario`, `info_ok`, `remember_token`, `updated_at`, `created_at`) VALUES
(1, 'aldo@gmail.com', '$2y$10$exVBLc5Ic/VlfdcWd3F7peBS5gA7ysMoiQDD94XoyL5ZsLtanVzjG', 1, 2, 0, NULL, '2019-11-13', '2019-11-13'),
(2, 'ambar@gmail.com', '$2y$10$aDMM1GfZ1K4OYYY900ydnuNsEg2VGA4zN4Y9EKsKX.8ZY4rgs8hgi', 1, 2, 0, NULL, '2019-11-14', '2019-11-14'),
(3, 'marcos@gmail.com', '$2y$10$o28CK25OrGhTsJXtxBIdf.i.Ll/bDPJNzkym70bcB4Lrg/tiFjsnG', 0, 2, 0, NULL, '2019-11-14', '2019-11-14'),
(4, 'Soto@gmail.com', '$2y$10$yCoAPh/LRKpqGU/RAmRaLOUgC9hBjXb335/OAMyEMeH3Henq8FWF.', 0, 2, 0, NULL, '2019-11-14', '2019-11-14'),
(5, 'antonieta@gmail.com', '$2y$10$J/38vjFYFNU/oqra7vPpLO6GIoDIovyh0SYuTlyIGq8P1hAq1AQ/6', 0, 2, 0, NULL, '2019-11-14', '2019-11-14'),
(6, 'rosa@gmail.com', '', 0, 2, 0, NULL, '2019-11-14', '2019-11-14'),
(7, 'araceli@gmail.com', '$2y$10$uevct344MjW7FMIwN6J1Yuyj4ky2J60YwW6.Q6Hx11CAVI4ET2kuq', 0, 2, 0, NULL, '2019-11-14', '2019-11-14'),
(8, 'michelle@gmail.com', '$2y$10$uevct344MjW7FMIwN6J1Yuyj4ky2J60YwW6.Q6Hx11CAVI4ET2kuq', 0, 1, 0, NULL, NULL, '2020-10-11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `exp_antecedentes_academicos`
--
ALTER TABLE `exp_antecedentes_academicos`
  ADD PRIMARY KEY (`id_exp_antecedentes_academicos`),
  ADD KEY `bac_idx` (`id_bachillerato`);

--
-- Indices de la tabla `exp_area_psicopedagogica`
--
ALTER TABLE `exp_area_psicopedagogica`
  ADD PRIMARY KEY (`id_exp_area_psicopedagogica`);

--
-- Indices de la tabla `exp_asigna_alumnos`
--
ALTER TABLE `exp_asigna_alumnos`
  ADD PRIMARY KEY (`id_asigna_alumno`);

--
-- Indices de la tabla `exp_asigna_coordinador`
--
ALTER TABLE `exp_asigna_coordinador`
  ADD PRIMARY KEY (`id_asigna_coordinador`),
  ADD KEY `jefeperd_idx` (`id_jefe_periodo`),
  ADD KEY `pers_idx` (`id_personal`);

--
-- Indices de la tabla `exp_asigna_expediente`
--
ALTER TABLE `exp_asigna_expediente`
  ADD PRIMARY KEY (`id_asigna_expediente`),
  ADD KEY `alumn_idx` (`id_alumno`),
  ADD KEY `exg_idx` (`id_exp_general`),
  ADD KEY `exa_idx` (`id_exp_antecedentes_academicos`),
  ADD KEY `exh_idx` (`id_exp_habitos_estudio`),
  ADD KEY `exff_idx` (`id_exp_datos_familiares`),
  ADD KEY `exps_idx` (`id_exp_area_psicopedagogica`),
  ADD KEY `exgff_idx` (`id_exp_formacion_integral`);

--
-- Indices de la tabla `exp_asigna_generacion`
--
ALTER TABLE `exp_asigna_generacion`
  ADD PRIMARY KEY (`id_asigna_generacion`),
  ADD KEY `grupgen_idx` (`id_generacion`);

--
-- Indices de la tabla `exp_asigna_tutor`
--
ALTER TABLE `exp_asigna_tutor`
  ADD PRIMARY KEY (`id_asigna_tutor`),
  ADD KEY `jefep_idx` (`id_jefe_periodo`),
  ADD KEY `prsona_idx` (`id_personal`),
  ADD KEY `asig_idx` (`id_asigna_generacion`);

--
-- Indices de la tabla `exp_bachillerato`
--
ALTER TABLE `exp_bachillerato`
  ADD PRIMARY KEY (`id_bachillerato`);

--
-- Indices de la tabla `exp_bebidas`
--
ALTER TABLE `exp_bebidas`
  ADD PRIMARY KEY (`id_expbebidas`);

--
-- Indices de la tabla `exp_civil_estados`
--
ALTER TABLE `exp_civil_estados`
  ADD PRIMARY KEY (`id_estado_civil`);

--
-- Indices de la tabla `exp_datos_familiares`
--
ALTER TABLE `exp_datos_familiares`
  ADD PRIMARY KEY (`id_exp_datos_familiares`),
  ADD KEY `viv_idx` (`id_opc_vives`),
  ADD KEY `uni_idx` (`id_familia_union`);

--
-- Indices de la tabla `exp_escalas`
--
ALTER TABLE `exp_escalas`
  ADD PRIMARY KEY (`id_escala`);

--
-- Indices de la tabla `exp_familia_union`
--
ALTER TABLE `exp_familia_union`
  ADD PRIMARY KEY (`id_familia_union`);

--
-- Indices de la tabla `exp_formacion_integral`
--
ALTER TABLE `exp_formacion_integral`
  ADD PRIMARY KEY (`id_exp_formacion_integral`);

--
-- Indices de la tabla `exp_generacion`
--
ALTER TABLE `exp_generacion`
  ADD PRIMARY KEY (`id_generacion`);

--
-- Indices de la tabla `exp_generales`
--
ALTER TABLE `exp_generales`
  ADD PRIMARY KEY (`id_exp_general`),
  ADD KEY `nse_idx` (`id_nivel_economico`),
  ADD KEY `per_idx` (`id_periodo`),
  ADD KEY `sem_idx` (`id_semestre`),
  ADD KEY `ec_idx` (`id_estado_civil`);

--
-- Indices de la tabla `exp_grupos_activos`
--
ALTER TABLE `exp_grupos_activos`
  ADD PRIMARY KEY (`id_grupo_activo`),
  ADD KEY `gr_idx` (`id_grupo`);

--
-- Indices de la tabla `exp_habitos_estudio`
--
ALTER TABLE `exp_habitos_estudio`
  ADD PRIMARY KEY (`id_exp_habitos_estudio`),
  ADD KEY `oin_idx` (`id_opc_intelectual`);

--
-- Indices de la tabla `exp_opc_intelectual`
--
ALTER TABLE `exp_opc_intelectual`
  ADD PRIMARY KEY (`id_opc_intelectual`);

--
-- Indices de la tabla `exp_opc_nivel_socio`
--
ALTER TABLE `exp_opc_nivel_socio`
  ADD PRIMARY KEY (`id_nivel_economico`);

--
-- Indices de la tabla `exp_opc_tiempo`
--
ALTER TABLE `exp_opc_tiempo`
  ADD PRIMARY KEY (`id_opc_tiempo`);

--
-- Indices de la tabla `exp_opc_vives`
--
ALTER TABLE `exp_opc_vives`
  ADD PRIMARY KEY (`id_opc_vives`);

--
-- Indices de la tabla `exp_parentescos`
--
ALTER TABLE `exp_parentescos`
  ADD PRIMARY KEY (`id_parentesco`);

--
-- Indices de la tabla `exp_tiempoestudia`
--
ALTER TABLE `exp_tiempoestudia`
  ADD PRIMARY KEY (`id_tiempoestudia`);

--
-- Indices de la tabla `exp_turno`
--
ALTER TABLE `exp_turno`
  ADD PRIMARY KEY (`id_turno`);

--
-- Indices de la tabla `gnral_alumnos`
--
ALTER TABLE `gnral_alumnos`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `ide_idx` (`id_usuario`),
  ADD KEY `car_idx` (`id_carrera`),
  ADD KEY `sem_idx` (`id_semestre`);

--
-- Indices de la tabla `gnral_carreras`
--
ALTER TABLE `gnral_carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `gnral_departamentos`
--
ALTER TABLE `gnral_departamentos`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `gnral_grupos`
--
ALTER TABLE `gnral_grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `gnral_horarios`
--
ALTER TABLE `gnral_horarios`
  ADD PRIMARY KEY (`id_horario_profesor`);

--
-- Indices de la tabla `gnral_jefes_periodos`
--
ALTER TABLE `gnral_jefes_periodos`
  ADD PRIMARY KEY (`id_jefe_periodo`),
  ADD KEY `oerso_idx` (`id_personal`),
  ADD KEY `carr_idx` (`id_carrera`),
  ADD KEY `per_idx` (`id_periodo`);

--
-- Indices de la tabla `gnral_periodos`
--
ALTER TABLE `gnral_periodos`
  ADD PRIMARY KEY (`id_periodo`);

--
-- Indices de la tabla `gnral_periodo_carreras`
--
ALTER TABLE `gnral_periodo_carreras`
  ADD PRIMARY KEY (`id_periodo_carrera`);

--
-- Indices de la tabla `gnral_personales`
--
ALTER TABLE `gnral_personales`
  ADD PRIMARY KEY (`id_personal`);

--
-- Indices de la tabla `gnral_semestres`
--
ALTER TABLE `gnral_semestres`
  ADD PRIMARY KEY (`id_semestre`);

--
-- Indices de la tabla `gnral_tipos_usuario`
--
ALTER TABLE `gnral_tipos_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tu_idx` (`tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `exp_antecedentes_academicos`
--
ALTER TABLE `exp_antecedentes_academicos`
  MODIFY `id_exp_antecedentes_academicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `exp_area_psicopedagogica`
--
ALTER TABLE `exp_area_psicopedagogica`
  MODIFY `id_exp_area_psicopedagogica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `exp_asigna_alumnos`
--
ALTER TABLE `exp_asigna_alumnos`
  MODIFY `id_asigna_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `exp_asigna_coordinador`
--
ALTER TABLE `exp_asigna_coordinador`
  MODIFY `id_asigna_coordinador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `exp_asigna_expediente`
--
ALTER TABLE `exp_asigna_expediente`
  MODIFY `id_asigna_expediente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `exp_asigna_tutor`
--
ALTER TABLE `exp_asigna_tutor`
  MODIFY `id_asigna_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `exp_bebidas`
--
ALTER TABLE `exp_bebidas`
  MODIFY `id_expbebidas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `exp_civil_estados`
--
ALTER TABLE `exp_civil_estados`
  MODIFY `id_estado_civil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `exp_datos_familiares`
--
ALTER TABLE `exp_datos_familiares`
  MODIFY `id_exp_datos_familiares` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `exp_escalas`
--
ALTER TABLE `exp_escalas`
  MODIFY `id_escala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `exp_formacion_integral`
--
ALTER TABLE `exp_formacion_integral`
  MODIFY `id_exp_formacion_integral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `exp_generales`
--
ALTER TABLE `exp_generales`
  MODIFY `id_exp_general` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `exp_habitos_estudio`
--
ALTER TABLE `exp_habitos_estudio`
  MODIFY `id_exp_habitos_estudio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `exp_opc_intelectual`
--
ALTER TABLE `exp_opc_intelectual`
  MODIFY `id_opc_intelectual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `exp_opc_nivel_socio`
--
ALTER TABLE `exp_opc_nivel_socio`
  MODIFY `id_nivel_economico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `exp_opc_tiempo`
--
ALTER TABLE `exp_opc_tiempo`
  MODIFY `id_opc_tiempo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `exp_opc_vives`
--
ALTER TABLE `exp_opc_vives`
  MODIFY `id_opc_vives` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `exp_parentescos`
--
ALTER TABLE `exp_parentescos`
  MODIFY `id_parentesco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `exp_tiempoestudia`
--
ALTER TABLE `exp_tiempoestudia`
  MODIFY `id_tiempoestudia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `exp_turno`
--
ALTER TABLE `exp_turno`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `gnral_alumnos`
--
ALTER TABLE `gnral_alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `gnral_carreras`
--
ALTER TABLE `gnral_carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `gnral_grupos`
--
ALTER TABLE `gnral_grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `gnral_jefes_periodos`
--
ALTER TABLE `gnral_jefes_periodos`
  MODIFY `id_jefe_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `gnral_periodo_carreras`
--
ALTER TABLE `gnral_periodo_carreras`
  MODIFY `id_periodo_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `gnral_personales`
--
ALTER TABLE `gnral_personales`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `gnral_tipos_usuario`
--
ALTER TABLE `gnral_tipos_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
