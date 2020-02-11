-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2020 a las 13:04:54
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistematutorias4`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `algoritmo` (IN `nombre` VARCHAR(40), IN `no_cuenta` INT, IN `sexo` INT, IN `id_estado_civil` INT, IN `no_hijos` INT, IN `no_hermanos` INT, IN `enfermedad_cronica` INT, IN `trabaja` INT, IN `practica_deporte` INT, IN `actividades_culturales` INT, IN `etnia_indigena` INT, IN `lugar_nacimientos` VARCHAR(30), IN `id_nivel_economico` INT, IN `sostiene_economia_hogar` VARCHAR(20), IN `id_carrera` INT, IN `tegusta_carrera_elegida` INT, IN `beca` INT, IN `estado` INT, IN `id_escala` INT, IN `poblacion` VARCHAR(30), IN `ant_inst` VARCHAR(30), IN `satisfaccion_c` VARCHAR(30), IN `materias_repeticion` INT, IN `tot_repe` INT, IN `materias_especial` INT, IN `tot_espe` INT, IN `gen_espe` INT)  BEGIN
    
    DECLARE sexo_v double ;
    DECLARE id_estado_civil_v double;
    DECLARE no_hijos_v double;
    DECLARE no_hermanos_v double;
    DECLARE enfermedad_cronica_v double;
    DECLARE trabaja_v double;
    DECLARE practica_deporte_v double;
    DECLARE actividades_culturales_v double;
    DECLARE etnia_indigena_v double;
    DECLARE lugar_nacimientos_v double;
    DECLARE id_nivel_economico_v double;
    DECLARE sostiene_economia_hogar_v double;
    DECLARE id_carrera_v double;
    DECLARE tegusta_carrera_elegida_v double;
    DECLARE beca_v double;
    DECLARE estado_v double;
    DECLARE id_escala_v double;
    DECLARE poblacion_v double;
    DECLARE ant_inst_v double;
    DECLARE satisfaccion_c_v double;
    DECLARE materias_repeticion_v double;
    DECLARE tot_repe_v double;
    DECLARE materias_especial_v double;
    DECLARE tot_espe_v double;
    DECLARE gen_espe_v double;
    DECLARE total  double;
    DECLARE compara int;
   
    IF sexo=1 THEN
      SET sexo_v=3.5;
    ELSEIF sexo=2 THEN
      SET sexo_v=3.5;
    END IF;
    
    IF id_estado_civil=1 THEN
      SET id_estado_civil_v=0.8;
    ELSEIF id_estado_civil=2 THEN
      SET id_estado_civil_v=3.5;
    ELSEIF id_estado_civil=3 THEN
      SET id_estado_civil_v= 2.0;
    ELSEIF id_estado_civil=4 THEN
      SET id_estado_civil_v= 2.5;
     ELSEIF id_estado_civil=5 THEN
      SET id_estado_civil_v=2.0;
    END IF;
    
    IF no_hijos=0 THEN
      SET no_hijos_v=0.8;
    ELSEIF no_hijos=1 THEN
      SET no_hijos_v=1.5;
    ELSEIF no_hijos=2 THEN
      SET no_hijos_v=2.5;
    ELSEIF no_hijos=3 THEN
      SET no_hijos_v=2.8;
    ELSEIF no_hijos=4 THEN
      SET no_hijos_v=3.5;
    ELSEIF no_hijos=5 THEN
      SET no_hijos_v=3.5;
    END IF;
    
    IF no_hermanos=0 THEN
      SET no_hermanos_v=0.8;
    ELSEIF no_hermanos=1 THEN
      SET no_hermanos_v=1.5;
    ELSEIF no_hermanos=2 THEN
      SET no_hermanos_v=2.0;
    ELSEIF no_hermanos=3 THEN
      SET no_hermanos_v=2.8;
    ELSEIF no_hermanos=4 THEN
      SET no_hermanos_v=3.5;
    ELSEIF no_hermanos=5 THEN
      SET no_hermanos_v=3.5;
    END IF;
    
    IF enfermedad_cronica=1 THEN
      SET enfermedad_cronica_v=3.5;
    ELSEIF enfermedad_cronica=2 THEN
      SET enfermedad_cronica_v=1.5;
    END IF;
    
    IF trabaja=1 THEN
      SET trabaja_v=3.5;
    ELSEIF trabaja=2 THEN
      SET trabaja_v=1.5;
    END IF;
    
    IF practica_deporte=1 THEN
      SET practica_deporte_v=1.5;
    ELSEIF practica_deporte=2 THEN
      SET practica_deporte_v=3.5;
    END IF;
    
    IF actividades_culturales=1 THEN
      SET actividades_culturales_v=1.5;
    ELSEIF actividades_culturales=2 THEN
      SET actividades_culturales_v=3.5;
    END IF;
    
    IF etnia_indigena=1 THEN
      SET etnia_indigena_v=3.5;
    ELSEIF etnia_indigena=2 THEN
      SET etnia_indigena_v=1.5;
    END IF;
    
    SET lugar_nacimientos_v=3.5;
    
    IF id_nivel_economico=1 THEN
      SET id_nivel_economico_v=1.5;
    ELSEIF id_nivel_economico=2 THEN
      SET id_nivel_economico_v=2.5;
     ELSEIF id_nivel_economico=3 THEN
      SET id_nivel_economico_v=3.5;
    END IF;
    
    SET sostiene_economia_hogar_v=3.5;
    SET id_carrera_v=3.5;
    
    IF tegusta_carrera_elegida=1 THEN
      SET tegusta_carrera_elegida_v=1.5;
    ELSEIF tegusta_carrera_elegida=2 THEN
      SET tegusta_carrera_elegida_v=3.5;
    END IF;
    
    IF beca=1 THEN
      SET beca_v=1.5;
    ELSEIF beca=2 THEN
      SET beca_v=3.5;
    END IF;
    
    IF estado=1 THEN
      SET estado_v=1.5;
    ELSEIF estado=2 THEN
      SET estado_v=3.5;
    END IF;
    
    IF id_escala=1 THEN
      SET id_escala_v=0.8;
    ELSEIF id_escala=2 THEN
      SET id_escala_v=1.5;
    ELSEIF id_escala=3 THEN
      SET id_escala_v=2.5;
    ELSEIF id_escala=4 THEN
      SET id_escala_v=3.5;
    END IF;
    
    IF poblacion="Rural" THEN
      SET poblacion_v=3.5;
    ELSEIF poblacion="Urbana" THEN
      SET poblacion_v=2.0;
    END IF;
    
    IF ant_inst="Continuación de estudios" THEN
      SET ant_inst_v=1.5;
    ELSEIF ant_inst="Cambio de carrera" THEN
      SET ant_inst_v=2.0;
    END IF;
    
    IF satisfaccion_c="Muy satisfecho" THEN
      SET satisfaccion_c_v=0.8;
    ELSEIF satisfaccion_c="Satisfecho" THEN
      SET satisfaccion_c_v=1.5;
    ELSEIF satisfaccion_c="Regular" THEN
      SET satisfaccion_c_v=2.5;
    ELSEIF satisfaccion_c="Inconforme" THEN
      SET satisfaccion_c_v=3.5;
    END IF;
    
    IF materias_repeticion=1 THEN
      SET materias_repeticion_v=3.5;
    ELSEIF materias_repeticion=2 THEN
      SET materias_repeticion_v=0.5;
    END IF;
    
    IF tot_repe=1 THEN
      SET tot_repe_v=0.1;
    ELSEIF tot_repe=2 THEN
      SET tot_repe_v=1.5;
    ELSEIF tot_repe=3 THEN
      SET tot_repe_v=2.5;
    ELSEIF tot_repe=4 THEN
      SET tot_repe_v=3.5;
    END IF;
    
    IF materias_especial=1 THEN
      SET materias_especial_v=3.5;
    ELSEIF materias_especial=2 THEN
      SET materias_especial_v=0.5;
    END IF;
    
    IF tot_espe=1 THEN
      SET tot_espe_v=0.1;
    ELSEIF tot_espe=2 THEN
      SET tot_espe_v=1.5;
    ELSEIF tot_espe=3 THEN
      SET tot_espe_v=2.5;
    ELSEIF tot_espe=4 THEN
      SET tot_espe_v=3.5;
    END IF;
    
    IF gen_espe=1 THEN
      SET gen_espe_v=0.1;
    ELSEIF gen_espe=2 THEN
      SET gen_espe_v=1.5;
    ELSEIF gen_espe=3 THEN
      SET gen_espe_v=2.5;
    ELSEIF gen_espe=4 THEN
      SET gen_espe_v=3.5;
    END IF;
     
     SET total=sexo_v+id_estado_civil_v+no_hijos_v+no_hermanos_v+enfermedad_cronica_v+trabaja_v+practica_deporte_v+
               actividades_culturales_v+etnia_indigena_v+lugar_nacimientos_v+id_nivel_economico_v+sostiene_economia_hogar_v
               +id_carrera_v+tegusta_carrera_elegida_v+beca_v+estado_v+id_escala_v+poblacion_v+ant_inst_v+satisfaccion_c_v
               +materias_repeticion_v+tot_repe_v+materias_especial_v+tot_espe_v+gen_espe_v;          
     SET compara=(SELECT COUNT(no_cuenta) FROM desercion WHERE no_cuenta=no_cuenta); 

     
    IF id_carrera=1 THEN
           INSERT INTO desercion(id_desercion,nombre,no_cuenta,sexo,sexo_v,id_estado_civil,id_estado_civil_v,no_hijos,no_hijos_v,no_hermanos,
                                 no_hermanos_v,enfermedad_cronica,enfermedad_cronica_v,trabaja,trabaja_v,practica_deporte,practica_deporte_v,
                                 actividades_culturales,actividades_culturales_v,etnia_indigena,etnia_indigena_v,lugar_nacimientos,
                                 lugar_nacimientos_v,id_nivel_economico,id_nivel_economico_v,sostiene_economia_hogar,sostiene_economia_hogar_v,
                                 id_carrera,id_carrera_v,tegusta_carrera_elegida,tegusta_carrera_elegida_v,beca,beca_v,estado,estado_v,
                                 id_escala,id_escala_v,poblacion,poblacion_v,ant_inst,ant_inst_v,satisfaccion_c,satisfaccion_c_v,
                                 materias_repeticion,materias_repeticion_v,tot_repe,tot_repe_v,materias_especial,materias_especial_v,
                                 tot_espe,tot_espe_v,gen_espe,gen_espe_v,total) 
           VALUES ('',nombre,no_cuenta,sexo,sexo_v,id_estado_civil,id_estado_civil_v,no_hijos,no_hijos_v,no_hermanos,
                                 no_hermanos_v,enfermedad_cronica,enfermedad_cronica_v,trabaja,trabaja_v,practica_deporte,practica_deporte_v,
                                 actividades_culturales,actividades_culturales_v,etnia_indigena,etnia_indigena_v,lugar_nacimientos,
                                 lugar_nacimientos_v,id_nivel_economico,id_nivel_economico_v,sostiene_economia_hogar,sostiene_economia_hogar_v,
                                 id_carrera,id_carrera_v,tegusta_carrera_elegida,tegusta_carrera_elegida_v,beca,beca_v,estado,estado_v,
                                 id_escala,id_escala_v,poblacion,poblacion_v,ant_inst,ant_inst_v,satisfaccion_c,satisfaccion_c_v,
                                 materias_repeticion,materias_repeticion_v,tot_repe,tot_repe_v,materias_especial,materias_especial_v,
                                 tot_espe,tot_espe_v,gen_espe,gen_espe_v,total);
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL,
  `id_planeacion` int(11) NOT NULL,
  `titulo_act` text NOT NULL,
  `desc_act` text NOT NULL,
  `instrucciones` text NOT NULL,
  `evidencia` varchar(150) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `id_planeacion`, `titulo_act`, `desc_act`, `instrucciones`, `evidencia`, `id_estado`) VALUES
(28, 8, 'yrfhf', 'gfchfchfhtf', 'gvgvugv', '1579020984.pdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas_canalizacion`
--

CREATE TABLE `areas_canalizacion` (
  `id_area` int(11) NOT NULL,
  `descripcion_area` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areas_canalizacion`
--

INSERT INTO `areas_canalizacion` (`id_area`, `descripcion_area`) VALUES
(1, 'Area Psicológica'),
(2, 'Area Academica'),
(3, 'Area de Salud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_alumnos`
--

CREATE TABLE `asignacion_alumnos` (
  `id_asigna_alumno` int(11) NOT NULL,
  `id_jefe_periodo` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_asigna_generacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna_coordinador`
--

CREATE TABLE `asigna_coordinador` (
  `id_asigna_coordinador` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna_planeacion_actividad`
--

CREATE TABLE `asigna_planeacion_actividad` (
  `id_asigna_planeacion_actividad` int(11) NOT NULL,
  `id_planeacion` int(11) DEFAULT NULL,
  `id_asigna_tutor` int(11) DEFAULT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  `sesion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asigna_planeacion_actividad`
--

INSERT INTO `asigna_planeacion_actividad` (`id_asigna_planeacion_actividad`, `id_planeacion`, `id_asigna_tutor`, `id_modulo`, `sesion`) VALUES
(5, 4, 6, NULL, NULL),
(6, 1, 8, NULL, NULL),
(8, 3, 9, NULL, NULL),
(11, 1, 17, NULL, NULL),
(16, 4, 22, NULL, NULL),
(17, 6, 23, NULL, NULL),
(19, 8, 21, NULL, NULL),
(21, 2, 26, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna_tutor`
--

CREATE TABLE `asigna_tutor` (
  `id_asigna_tutor` int(11) NOT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `id_semestre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asigna_tutor`
--

INSERT INTO `asigna_tutor` (`id_asigna_tutor`, `id_personal`, `id_grupo`, `id_carrera`, `id_semestre`) VALUES
(21, 1, NULL, 1, 8),
(23, 1, NULL, 1, 6),
(26, 1, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canalizacion`
--

CREATE TABLE `canalizacion` (
  `id_canalizacion` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `fecha_canalizacion` date DEFAULT NULL,
  `fecha_canalizacion_anterior` date DEFAULT NULL,
  `fecha_canalizacion_siguiente` date NOT NULL,
  `hora` time DEFAULT NULL,
  `aspectos_sociologicos1` int(11) DEFAULT NULL,
  `aspectos_sociologicos2` int(11) DEFAULT NULL,
  `aspectos_sociologicos3` int(11) DEFAULT NULL,
  `aspectos_academicos1` int(11) DEFAULT NULL,
  `aspectos_academicos2` int(11) DEFAULT NULL,
  `aspectos_academicos3` int(11) DEFAULT NULL,
  `observaciones` text,
  `otros` text,
  `notificacion` varchar(50) DEFAULT NULL,
  `id_area` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `canalizacion`
--

INSERT INTO `canalizacion` (`id_canalizacion`, `id_alumno`, `id_personal`, `fecha_canalizacion`, `fecha_canalizacion_anterior`, `fecha_canalizacion_siguiente`, `hora`, `aspectos_sociologicos1`, `aspectos_sociologicos2`, `aspectos_sociologicos3`, `aspectos_academicos1`, `aspectos_academicos2`, `aspectos_academicos3`, `observaciones`, `otros`, `notificacion`, `id_area`, `status`) VALUES
(9, 1, 1, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crea_reporte_coor_carrera`
--

CREATE TABLE `crea_reporte_coor_carrera` (
  `id_crearepor_coor_carrera` int(11) NOT NULL,
  `id_crea_reporte_tutor` int(11) NOT NULL,
  `fecha_crea_coorcarrera` date NOT NULL,
  `id_personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crea_reporte_coor_institucional`
--

CREATE TABLE `crea_reporte_coor_institucional` (
  `id_crearepor_institucional` int(11) NOT NULL,
  `id_crearepor_coor_carrera` int(11) NOT NULL,
  `fecha_crea_institucional` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crea_reporte_departamento`
--

CREATE TABLE `crea_reporte_departamento` (
  `id_crearepor_departamento` int(11) NOT NULL,
  `id_crearepor_institucional` int(11) NOT NULL,
  `fecha_crea_departamento` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crea_reporte_tutor`
--

CREATE TABLE `crea_reporte_tutor` (
  `id_crea_reporte_tutor` int(11) NOT NULL,
  `id_reporte` int(11) NOT NULL,
  `fecha_reportetutor` date NOT NULL,
  `id_personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desercion`
--

CREATE TABLE `desercion` (
  `id_desercion` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `no_cuenta` int(11) DEFAULT NULL,
  `sexo` int(11) DEFAULT NULL,
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
  `lugar_nacimientos` varchar(30) DEFAULT NULL,
  `lugar_nacimientos_v` double DEFAULT NULL,
  `id_nivel_economico` int(11) DEFAULT NULL,
  `id_nivel_economico_v` double DEFAULT NULL,
  `sostiene_economia_hogar` varchar(30) DEFAULT NULL,
  `sostiene_economia_hogar_v` double DEFAULT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `id_carrera_v` double DEFAULT NULL,
  `tegusta_carrera_elegida` int(11) DEFAULT NULL,
  `tegusta_carrera_elegida_v` double DEFAULT NULL,
  `beca` int(11) DEFAULT NULL,
  `beca_v` double DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `estado_v` double DEFAULT NULL,
  `id_escala` int(11) DEFAULT NULL,
  `id_escala_v` double DEFAULT NULL,
  `poblacion` varchar(20) DEFAULT NULL,
  `poblacion_v` double DEFAULT NULL,
  `ant_inst` varchar(30) DEFAULT NULL,
  `ant_inst_v` double DEFAULT NULL,
  `satisfaccion_c` varchar(25) DEFAULT NULL,
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
-- Volcado de datos para la tabla `desercion`
--

INSERT INTO `desercion` (`id_desercion`, `nombre`, `no_cuenta`, `sexo`, `sexo_v`, `id_estado_civil`, `id_estado_civil_v`, `no_hijos`, `no_hijos_v`, `no_hermanos`, `no_hermanos_v`, `enfermedad_cronica`, `enfermedad_cronica_v`, `trabaja`, `trabaja_v`, `practica_deporte`, `practica_deporte_v`, `actividades_culturales`, `actividades_culturales_v`, `etnia_indigena`, `etnia_indigena_v`, `lugar_nacimientos`, `lugar_nacimientos_v`, `id_nivel_economico`, `id_nivel_economico_v`, `sostiene_economia_hogar`, `sostiene_economia_hogar_v`, `id_carrera`, `id_carrera_v`, `tegusta_carrera_elegida`, `tegusta_carrera_elegida_v`, `beca`, `beca_v`, `estado`, `estado_v`, `id_escala`, `id_escala_v`, `poblacion`, `poblacion_v`, `ant_inst`, `ant_inst_v`, `satisfaccion_c`, `satisfaccion_c_v`, `materias_repeticion`, `materias_repeticion_v`, `tot_repe`, `tot_repe_v`, `materias_especial`, `materias_especial_v`, `tot_espe`, `tot_espe_v`, `gen_espe`, `gen_espe_v`, `total`) VALUES
(1, 'Jazmin Estanislao Gonzalez', 201507008, 2, 3.5, 1, 0.8, 0, 0.8, 2, 2, 2, 1.5, 1, 3.5, 1, 1.5, 2, 3.5, 2, 1.5, 'Valle de Bravo', 3.5, 2, 2.5, 'Mama', 3.5, 1, 3.5, 1, 1.5, 1, 1.5, 1, 1.5, 4, 3.5, 'Rural', 3.5, 'Continuación de estudios', 1.5, 'Satisfecho', 1.5, 2, 0.5, 1, 0.1, 2, 0.5, 1, 0.1, 1, 0.1, 47.400000000000006),
(2, 'Ulises Navor Angeles', 201507026, 1, 3.5, 1, 0.8, 0, 0.8, 1, 1.5, 2, 1.5, 1, 3.5, 2, 3.5, 2, 3.5, 2, 1.5, 'Lomas del Valle', 3.5, 2, 2.5, '', 3.5, 1, 3.5, 1, 1.5, 2, 3.5, 1, 1.5, 4, 3.5, 'Rural', 3.5, 'Continuación de estudios', 1.5, 'Muy satisfecho', 0.8, 2, 0.5, 1, 0.1, 2, 0.5, 1, 0.1, 1, 0.1, 50.2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `titulo_evento` text NOT NULL,
  `desc_evento` text NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidencias`
--

CREATE TABLE `evidencias` (
  `id_evidencia` int(11) NOT NULL,
  `evidencia` varchar(30) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_asigna_planeacion_actividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `teestimula_familia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_antecedentes_academicos`
--

INSERT INTO `exp_antecedentes_academicos` (`id_exp_antecedentes_academicos`, `id_bachillerato`, `otros_estudios`, `anos_curso_bachillerato`, `ano_terminacion`, `escuela_procedente`, `promedio`, `materias_reprobadas`, `otra_carrera_ini`, `institucion`, `semestres_cursados`, `interrupciones_estudios`, `razones_interrupcion`, `razon_descide_estudiar_tesvb`, `sabedel_perfil_profesional`, `otras_opciones_vocales`, `cuales_otras_opciones_vocales`, `tegusta_carrera_elegida`, `porque_carrera_elegida`, `suspension_estudios_bachillerato`, `razones_suspension_estudios`, `teestimula_familia`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, NULL, 3, '2015', 'Cecytem', 8, '5', '2', NULL, NULL, 2, NULL, 'Me agrada', 'si', 2, NULL, 1, 'Es buena', 2, NULL, '1'),
(3, 1, NULL, 3, '2015', 'Cecytem', 8, '5', '2', NULL, NULL, 2, NULL, 'Me agrada', 'si', 2, NULL, 1, 'Es buena', 2, NULL, '1');

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
  `trabajo_equipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_area_psicopedagogica`
--

INSERT INTO `exp_area_psicopedagogica` (`id_exp_area_psicopedagogica`, `rendimiento_escolar`, `dominio_idioma`, `otro_idioma`, `conocimiento_compu`, `aptitud_especial`, `comprension`, `preparacion`, `estrategias_aprendizaje`, `organizacion_actividades`, `concentracion`, `solucion_problemas`, `condiciones_ambientales`, `busqueda_bibliografica`, `trabajo_equipo`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3),
(3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_asigna_coordinador`
--

CREATE TABLE `exp_asigna_coordinador` (
  `id_asigna_coordinador` int(11) NOT NULL,
  `id_jefe_periodo` int(11) DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
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

--
-- Volcado de datos para la tabla `exp_asigna_expediente`
--

INSERT INTO `exp_asigna_expediente` (`id_asigna_expediente`, `id_alumno`, `id_exp_general`, `id_exp_antecedentes_academicos`, `id_exp_datos_familiares`, `id_exp_habitos_estudio`, `id_exp_formacion_integral`, `id_exp_area_psicopedagogica`) VALUES
(1, 5, 1, 1, 1, 1, 1, 1),
(2, 5, 2, 2, 2, 2, 2, 2),
(3, 5, 3, 3, 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_asigna_generacion`
--

CREATE TABLE `exp_asigna_generacion` (
  `id_asigna_generacion` int(11) NOT NULL,
  `ig_grupo` int(11) DEFAULT NULL,
  `generacion` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Tecnico'),
(2, 'General');

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
(3, 'Union libre'),
(4, 'Divorciado'),
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
  `id_parentesco` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_datos_familiares`
--

INSERT INTO `exp_datos_familiares` (`id_exp_datos_familiares`, `nombre_padre`, `edad_padre`, `ocupacion_padre`, `lugar_residencia_padre`, `nombre_madre`, `edad_madre`, `ocupacion_madre`, `lugar_residencia_madre`, `no_hermanos`, `lugar_ocupas`, `id_opc_vives`, `no_personas`, `etnia_indigena`, `cual_etnia`, `hablas_lengua_indigena`, `sostiene_economia_hogar`, `id_familia_union`, `nombre_tutor`, `id_parentesco`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Jorge Navor Reyna', 49, 'Albañil', 'Lomas del Valle', 'Adela Angeles Garcia', 47, 'Ama de casa', 'Lomas del Valle', 1, 'Segundo', 1, 4, 2, NULL, 2, NULL, 1, 'Adela Angeles Garcia', '1'),
(3, 'Jorge Navor Reyna', 49, 'Albañil', 'Lomas del Valle', 'Adela Angeles Garcia', 47, 'Ama de casa', 'Lomas del Valle', 1, 'Segundo', 1, 4, 2, NULL, 2, NULL, 1, 'Adela Angeles Garcia', '1');

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
(1, 'Nunca'),
(2, 'Rara vez'),
(3, 'A veces'),
(4, 'Frecuentemente');

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
(3, 'Disfuncional'),
(4, 'asdf');

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
  `id_escala` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_formacion_integral`
--

INSERT INTO `exp_formacion_integral` (`id_exp_formacion_integral`, `practica_deporte`, `especifica_deporte`, `practica_artistica`, `especifica_artistica`, `pasatiempo`, `actividades_culturales`, `cuales_act`, `estado_salud`, `enfermedad_cronica`, `especifica_enf_cron`, `enf_cron_padre`, `especifica_enf_cron_padres`, `operacion`, `deque_operacion`, `enfer_visual`, `especifica_enf`, `usas_lentes`, `medicamento_controlado`, `especifica_medicamento`, `estatura`, `peso`, `accidente_grave`, `relata_breve`, `id_escala`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, NULL, 2, NULL, 'Tomar', 2, NULL, 2, 2, NULL, 2, NULL, 2, NULL, 1, 'Astigmatissmo', 1, 2, NULL, '1.68', '81', 2, NULL, 4),
(3, 2, NULL, 2, NULL, 'Tomar', 2, NULL, 2, 2, NULL, 2, NULL, 2, NULL, 1, 'Astigmatissmo', 1, 2, NULL, '1.68', '81', 2, NULL, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_generales`
--

CREATE TABLE `exp_generales` (
  `id_exp_general` int(11) NOT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `id_periodo` int(11) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL,
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
  `poblacion` varchar(10) DEFAULT NULL,
  `ant_inst` varchar(30) DEFAULT NULL,
  `satisfaccion_c` varchar(20) DEFAULT NULL,
  `materias_repeticion` int(11) DEFAULT NULL,
  `tot_repe` int(11) DEFAULT NULL,
  `materias_especial` int(11) DEFAULT NULL,
  `tot_espe` int(11) DEFAULT NULL,
  `gen_espe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_generales`
--

INSERT INTO `exp_generales` (`id_exp_general`, `id_carrera`, `id_periodo`, `id_grupo`, `nombre`, `edad`, `sexo`, `fecha_nacimientos`, `lugar_nacimientos`, `id_semestre`, `id_estado_civil`, `no_hijos`, `direccion`, `correo`, `tel_casa`, `cel`, `id_nivel_economico`, `trabaja`, `ocupacion`, `horario`, `no_cuenta`, `beca`, `tipo_beca`, `estado`, `turno`, `poblacion`, `ant_inst`, `satisfaccion_c`, `materias_repeticion`, `tot_repe`, `materias_especial`, `tot_espe`, `gen_espe`) VALUES
(3, 1, 1, 1, 'Ulises Navor Angeles', 22, '1', '1997-12-28', 'Lomas del Valle', 1, 1, 0, 'Lomas del Valle', 'navor@gmail.com', '7262519080', '7223221534', 2, 1, 'Chofer', 'Mixto', '201507026', 2, NULL, 1, 1, 'Rural', 'Continuación de estudios', 'Muy satisfecho', 2, 1, 2, 1, 1);

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
  `tiempo_empelado_estudiar` int(45) DEFAULT NULL,
  `id_opc_intelectual` int(11) DEFAULT NULL,
  `forma_estudio` varchar(45) DEFAULT NULL,
  `tiempo_libre` varchar(100) DEFAULT NULL,
  `asignatura_preferida` varchar(100) DEFAULT NULL,
  `porque_asignatura` varchar(100) DEFAULT NULL,
  `asignatura_dificil` varchar(100) DEFAULT NULL,
  `porque_asignatura_dificil` varchar(100) DEFAULT NULL,
  `opinion_tu_mismo_estudiante` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exp_habitos_estudio`
--

INSERT INTO `exp_habitos_estudio` (`id_exp_habitos_estudio`, `tiempo_empelado_estudiar`, `id_opc_intelectual`, `forma_estudio`, `tiempo_libre`, `asignatura_preferida`, `porque_asignatura`, `asignatura_dificil`, `porque_asignatura_dificil`, `opinion_tu_mismo_estudiante`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 2, 'Visual', 'Distraerme', 'Programacion', 'Me agrada', 'Taller', 'Documentacion', 'Buen estudiante'),
(3, 1, 2, 'Visual', 'Distraerme', 'Programacion', 'Me agrada', 'Taller', 'Documentacion', 'Buen estudiante');

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
(1, 'Muy rapido'),
(2, 'Rapido'),
(3, 'Lento');

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
(1, 'Padres'),
(2, 'Otros estudiantes'),
(3, 'Tios'),
(4, 'Solo'),
(5, 'Otros familiares');

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
(1, 'Mamá'),
(2, 'Papá'),
(3, 'Otro');

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
(1, '1 hora'),
(2, '2 horas');

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
(1, 201507026, 'Ulises', 'Navor', 'Angeles', 'M', '1997-12-28', 21, 'NAAU971228HMCVNL01', 'Soltero', 'Mexicano', NULL, 'navorulises@gmail.com', 'Ulises NA', '7223221534', NULL, 'Santiago del Monte', 'Preparatoria', 1, 8, 16, 85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '50960', 1, NULL, '2020-01-10 14:21:20', '0000-00-00 00:00:00'),
(2, 201507027, 'Jesus', 'Ramirez', 'Ocampo', 'M', '2019-08-15', 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, '2019-12-03 20:12:23', '0000-00-00 00:00:00'),
(3, 201507028, 'Jazmin', 'Estanislao', 'Gonzalez', 'F', '2019-06-17', 21, NULL, NULL, NULL, NULL, 'slayer@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 6, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, '2020-01-14 04:10:24', '0000-00-00 00:00:00'),
(4, 201507029, 'Cristian', 'Arias', 'Zepeda', 'M', '2019-07-16', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, '2019-12-03 20:12:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_carreras`
--

CREATE TABLE `gnral_carreras` (
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `siglas` varchar(20) NOT NULL,
  `COLOR` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gnral_carreras`
--

INSERT INTO `gnral_carreras` (`id_carrera`, `nombre`, `siglas`, `COLOR`) VALUES
(1, 'Ingenieria en Sistemas Computacionales', 'I.S.C', 'rojo'),
(2, 'Ingenieria Civil', 'Ing Civil', 'gris'),
(3, 'Ingenieria Electrica', 'Ing Electrica', 'gris'),
(4, 'Ingenieria Forestal', 'Ing Forestal', 'verde'),
(5, 'Administracion', 'Lic. Administracion', 'azul');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_grupos`
--

CREATE TABLE `gnral_grupos` (
  `id_grupo` int(11) NOT NULL,
  `grupo` int(11) NOT NULL
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
(16, 802);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_periodos`
--

CREATE TABLE `gnral_periodos` (
  `id_periodo` int(11) NOT NULL,
  `periodo` varchar(20) NOT NULL,
  `fecha_inicio` varchar(20) NOT NULL,
  `fecha_termino` varchar(20) NOT NULL,
  `ciclo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gnral_periodos`
--

INSERT INTO `gnral_periodos` (`id_periodo`, `periodo`, `fecha_inicio`, `fecha_termino`, `ciclo`) VALUES
(1, 'marzo', '2019-11-25 10:03:59', '2019-11-25 10:04:49', '2019');

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
(1, 'Gabriela González Vazquez', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'gabriela@gmail.com', '', '', 0, '', 0, 2, '2019-11-26 11:09:49', '0000-00-00 00:00:00', 3),
(2, 'Luis Alberto', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '', '', 0, '', 0, NULL, '2019-11-29 00:39:38', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_semestres`
--

CREATE TABLE `gnral_semestres` (
  `id_semestre` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gnral_semestres`
--

INSERT INTO `gnral_semestres` (`id_semestre`, `descripcion`) VALUES
(1, 'Primero'),
(2, 'Segundo'),
(3, 'Tercero'),
(4, 'Cuarto'),
(5, 'Quinto'),
(6, 'Sexto'),
(7, 'Septimo'),
(8, 'Octavo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planeacion`
--

CREATE TABLE `planeacion` (
  `id_planeacion` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `desc_actividad` text,
  `objetivo` text,
  `instrucciones` text,
  `id_semestre` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `comentarios` text,
  `sugerencia` text,
  `id_sugerencia` int(11) DEFAULT NULL,
  `estrategia` text,
  `id_estrategia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `planeacion`
--

INSERT INTO `planeacion` (`id_planeacion`, `fecha_inicio`, `fecha_fin`, `desc_actividad`, `objetivo`, `instrucciones`, `id_semestre`, `id_estado`, `comentarios`, `sugerencia`, `id_sugerencia`, `estrategia`, `id_estrategia`) VALUES
(8, '2020-01-13', '2020-01-17', 'Desarrollar habilidades de lectura', 'Mediante la fomentación de lectura mejor la ortografía de los tutorados', 'Realizar lecturas de distintos libros', 8, 1, NULL, 'fc gfchvg', 1, 'vecvecfrccedcedccecece', 2),
(9, '2020-01-16', '2020-01-25', 'gf', 'fc gfc', 'gcgb', 8, 1, NULL, 'fcgfcg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripcion`) VALUES
(1, 'Coord_inst'),
(2, 'Profesor'),
(3, 'Alumno'),
(4, 'Coord carr'),
(5, 'Dep des'),
(6, 'Jefe div');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `id_rol` int(11) NOT NULL,
  `updated_at` varchar(15) NOT NULL,
  `created_at` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `id_rol`, `updated_at`, `created_at`) VALUES
(1, 'mutsotool@gmail.com', '$2y$10$iZYsu4GXiDIfDZqyet/lReRvYxPJrA5oTkY0aD8c.dq6LmDxiIpa6', 3, '2019-11-22 22:4', '2019-11-22 22:4'),
(2, 'jefe_div@gmail.com', '$2y$10$iZYsu4GXiDIfDZqyet/lReRvYxPJrA5oTkY0aD8c.dq6LmDxiIpa6', 6, '2019-11-07 23:1', '2019-11-07 23:1'),
(3, 'tutor@gmail.com', '$2y$10$iZYsu4GXiDIfDZqyet/lReRvYxPJrA5oTkY0aD8c.dq6LmDxiIpa6', 2, '2019-11-08 00:3', '2019-11-08 00:3'),
(4, 'lilith@gmail.com', '$2y$10$iZYsu4GXiDIfDZqyet/lReRvYxPJrA5oTkY0aD8c.dq6LmDxiIpa6', 3, '2019-11-27 22:3', '2019-11-27 22:3'),
(5, 'slayer@gmail.com', '$2y$10$iZYsu4GXiDIfDZqyet/lReRvYxPJrA5oTkY0aD8c.dq6LmDxiIpa6', 3, '2019-12-01 20:5', '2019-12-01 20:5'),
(6, 'ara@gmail.com', '$2y$12$CETadbaCYsAkHq8vtouf1e1.sd3N1YDlY30ZKpyeKChtprDf85YxS', 1, '2019-12-11 19:0', '2019-12-11 19:0'),
(7, 'coor_carrera@gmail.com', '$2y$10$iZYsu4GXiDIfDZqyet/lReRvYxPJrA5oTkY0aD8c.dq6LmDxiIpa6', 4, '2019-12-11 22:1', '2019-12-11 22:1'),
(8, 'des_academ@gmail.com', '$2y$10$iZYsu4GXiDIfDZqyet/lReRvYxPJrA5oTkY0aD8c.dq6LmDxiIpa6', 5, '2019-12-11 22:1', '2019-12-11 22:1'),
(9, 'a@gmail.com', '$2y$10$QayF.AmS19Ups3xPZS.MweKC4HkQRWkI.l6zowD6h2WEHc9E1SJJi', 1, '2019-12-20 22:0', '2019-12-20 22:0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `areas_canalizacion`
--
ALTER TABLE `areas_canalizacion`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `asigna_coordinador`
--
ALTER TABLE `asigna_coordinador`
  ADD PRIMARY KEY (`id_asigna_coordinador`);

--
-- Indices de la tabla `asigna_planeacion_actividad`
--
ALTER TABLE `asigna_planeacion_actividad`
  ADD PRIMARY KEY (`id_asigna_planeacion_actividad`);

--
-- Indices de la tabla `asigna_tutor`
--
ALTER TABLE `asigna_tutor`
  ADD PRIMARY KEY (`id_asigna_tutor`);

--
-- Indices de la tabla `canalizacion`
--
ALTER TABLE `canalizacion`
  ADD PRIMARY KEY (`id_canalizacion`);

--
-- Indices de la tabla `desercion`
--
ALTER TABLE `desercion`
  ADD PRIMARY KEY (`id_desercion`),
  ADD UNIQUE KEY `no_cuenta` (`no_cuenta`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `exp_antecedentes_academicos`
--
ALTER TABLE `exp_antecedentes_academicos`
  ADD PRIMARY KEY (`id_exp_antecedentes_academicos`);

--
-- Indices de la tabla `exp_area_psicopedagogica`
--
ALTER TABLE `exp_area_psicopedagogica`
  ADD PRIMARY KEY (`id_exp_area_psicopedagogica`);

--
-- Indices de la tabla `exp_asigna_expediente`
--
ALTER TABLE `exp_asigna_expediente`
  ADD PRIMARY KEY (`id_asigna_expediente`);

--
-- Indices de la tabla `exp_bachillerato`
--
ALTER TABLE `exp_bachillerato`
  ADD PRIMARY KEY (`id_bachillerato`);

--
-- Indices de la tabla `exp_civil_estados`
--
ALTER TABLE `exp_civil_estados`
  ADD PRIMARY KEY (`id_estado_civil`);

--
-- Indices de la tabla `exp_datos_familiares`
--
ALTER TABLE `exp_datos_familiares`
  ADD PRIMARY KEY (`id_exp_datos_familiares`);

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
-- Indices de la tabla `exp_generales`
--
ALTER TABLE `exp_generales`
  ADD PRIMARY KEY (`id_exp_general`);

--
-- Indices de la tabla `exp_habitos_estudio`
--
ALTER TABLE `exp_habitos_estudio`
  ADD PRIMARY KEY (`id_exp_habitos_estudio`);

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
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `gnral_carreras`
--
ALTER TABLE `gnral_carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `gnral_grupos`
--
ALTER TABLE `gnral_grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `gnral_periodos`
--
ALTER TABLE `gnral_periodos`
  ADD PRIMARY KEY (`id_periodo`);

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
-- Indices de la tabla `planeacion`
--
ALTER TABLE `planeacion`
  ADD PRIMARY KEY (`id_planeacion`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `areas_canalizacion`
--
ALTER TABLE `areas_canalizacion`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `asigna_coordinador`
--
ALTER TABLE `asigna_coordinador`
  MODIFY `id_asigna_coordinador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asigna_planeacion_actividad`
--
ALTER TABLE `asigna_planeacion_actividad`
  MODIFY `id_asigna_planeacion_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `asigna_tutor`
--
ALTER TABLE `asigna_tutor`
  MODIFY `id_asigna_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `canalizacion`
--
ALTER TABLE `canalizacion`
  MODIFY `id_canalizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `desercion`
--
ALTER TABLE `desercion`
  MODIFY `id_desercion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `exp_antecedentes_academicos`
--
ALTER TABLE `exp_antecedentes_academicos`
  MODIFY `id_exp_antecedentes_academicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `exp_area_psicopedagogica`
--
ALTER TABLE `exp_area_psicopedagogica`
  MODIFY `id_exp_area_psicopedagogica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `exp_asigna_expediente`
--
ALTER TABLE `exp_asigna_expediente`
  MODIFY `id_asigna_expediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `exp_bachillerato`
--
ALTER TABLE `exp_bachillerato`
  MODIFY `id_bachillerato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `exp_civil_estados`
--
ALTER TABLE `exp_civil_estados`
  MODIFY `id_estado_civil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `exp_datos_familiares`
--
ALTER TABLE `exp_datos_familiares`
  MODIFY `id_exp_datos_familiares` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `exp_escalas`
--
ALTER TABLE `exp_escalas`
  MODIFY `id_escala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `exp_familia_union`
--
ALTER TABLE `exp_familia_union`
  MODIFY `id_familia_union` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `exp_formacion_integral`
--
ALTER TABLE `exp_formacion_integral`
  MODIFY `id_exp_formacion_integral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `exp_generales`
--
ALTER TABLE `exp_generales`
  MODIFY `id_exp_general` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `exp_habitos_estudio`
--
ALTER TABLE `exp_habitos_estudio`
  MODIFY `id_exp_habitos_estudio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `exp_opc_intelectual`
--
ALTER TABLE `exp_opc_intelectual`
  MODIFY `id_opc_intelectual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `exp_opc_nivel_socio`
--
ALTER TABLE `exp_opc_nivel_socio`
  MODIFY `id_nivel_economico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `exp_opc_vives`
--
ALTER TABLE `exp_opc_vives`
  MODIFY `id_opc_vives` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `exp_parentescos`
--
ALTER TABLE `exp_parentescos`
  MODIFY `id_parentesco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `exp_tiempoestudia`
--
ALTER TABLE `exp_tiempoestudia`
  MODIFY `id_tiempoestudia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `gnral_grupos`
--
ALTER TABLE `gnral_grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `gnral_periodos`
--
ALTER TABLE `gnral_periodos`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `gnral_semestres`
--
ALTER TABLE `gnral_semestres`
  MODIFY `id_semestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `planeacion`
--
ALTER TABLE `planeacion`
  MODIFY `id_planeacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
