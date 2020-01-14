-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2019 a las 16:36:56
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
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id_docente` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_jefe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna_tutor`
--

CREATE TABLE `asigna_tutor` (
  `id_asigna_tutor` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_jefe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `desc_carrera` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `desc_carrera`) VALUES
(1, 'Ingenieria en Sistemas Computacionales'),
(2, 'Arquitectura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE `datos_personales` (
  `id_datos_personales` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_antecedentes_academicos`
--

CREATE TABLE `exp_antecedentes_academicos` (
  `id_exp_antecedentes_academicos` int(11) NOT NULL,
  `id_bachillerato` int(11) DEFAULT NULL,
  `otros_estudios` varchar(100) DEFAULT NULL,
  `años_curso_bachillerato` int(11) DEFAULT NULL,
  `año_terminacion` varchar(10) DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_escalas`
--

CREATE TABLE `exp_escalas` (
  `id_escala` int(11) NOT NULL,
  `desc_escala` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_familia_union`
--

CREATE TABLE `exp_familia_union` (
  `id_familia_union` int(11) NOT NULL,
  `desc_union` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `relata_breve` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `lugar_naciemientos` varchar(255) DEFAULT NULL,
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
  `turno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `opinion_tu_mismo_estudiante` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_opc_intelectual`
--

CREATE TABLE `exp_opc_intelectual` (
  `id_opc_intelectual` int(11) NOT NULL,
  `desc_opc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_opc_nivel_socio`
--

CREATE TABLE `exp_opc_nivel_socio` (
  `id_nivel_economico` int(11) NOT NULL,
  `desc_opc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_parentescos`
--

CREATE TABLE `exp_parentescos` (
  `id_parentesco` int(11) NOT NULL,
  `desc_parentesco` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_departamentos`
--

CREATE TABLE `gnral_departamentos` (
  `id_departamento` int(11) NOT NULL,
  `descripcion_de` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_grupos`
--

CREATE TABLE `gnral_grupos` (
  `id_grupo` int(11) NOT NULL,
  `grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_semestres`
--

CREATE TABLE `gnral_semestres` (
  `id_semestre` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gnral_tipos_usuario`
--

CREATE TABLE `gnral_tipos_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `desc_grupo` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_activos`
--

CREATE TABLE `grupos_activos` (
  `id_grupo_activo` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodos` (
  `id_periodo` int(11) NOT NULL,
  `desc_periodo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripcion`) VALUES
(1, 'Jefe'),
(2, 'Profesor'),
(3, 'Alumno');

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
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `id_rol`, `updated_at`, `created_at`) VALUES
(1, 'mutsotool@gmail.com', '$2y$10$iZYsu4GXiDIfDZqyet/lReRvYxPJrA5oTkY0aD8c.dq6LmDxiIpa6', 3, 'sysdate', 'sysdate'),
(2, 'slayer_black@gmail.com', '$2y$10$iZYsu4GXiDIfDZqyet/lReRvYxPJrA5oTkY0aD8c.dq6LmDxiIpa6', 1, '2019-11-07 23:17:18', '2019-11-07 23:17:18'),
(3, 'korn@gmail.com', '$2y$10$iZYsu4GXiDIfDZqyet/lReRvYxPJrA5oTkY0aD8c.dq6LmDxiIpa6', 2, '2019-11-08 00:35:18', '2019-11-08 00:35:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `asignacion_alumnos`
--
ALTER TABLE `asignacion_alumnos`
  ADD PRIMARY KEY (`id_asigna_alumno`),
  ADD KEY `jefp_idx` (`id_jefe_periodo`),
  ADD KEY `alumnosss_idx` (`id_alumno`),
  ADD KEY `gen_idx` (`id_asigna_generacion`);

--
-- Indices de la tabla `asigna_coordinador`
--
ALTER TABLE `asigna_coordinador`
  ADD PRIMARY KEY (`id_asigna_coordinador`);

--
-- Indices de la tabla `asigna_tutor`
--
ALTER TABLE `asigna_tutor`
  ADD PRIMARY KEY (`id_asigna_tutor`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD PRIMARY KEY (`id_datos_personales`);

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
  ADD KEY `grupgen_idx` (`ig_grupo`);

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
-- Indices de la tabla `gnral_grupos`
--
ALTER TABLE `gnral_grupos`
  ADD PRIMARY KEY (`id_grupo`);

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
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `grupos_activos`
--
ALTER TABLE `grupos_activos`
  ADD PRIMARY KEY (`id_grupo_activo`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `tu_idx` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asigna_coordinador`
--
ALTER TABLE `asigna_coordinador`
  MODIFY `id_asigna_coordinador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asigna_tutor`
--
ALTER TABLE `asigna_tutor`
  MODIFY `id_asigna_tutor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  MODIFY `id_datos_personales` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `exp_antecedentes_academicos`
--
ALTER TABLE `exp_antecedentes_academicos`
  MODIFY `id_exp_antecedentes_academicos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `exp_area_psicopedagogica`
--
ALTER TABLE `exp_area_psicopedagogica`
  MODIFY `id_exp_area_psicopedagogica` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_asigna_tutor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `exp_civil_estados`
--
ALTER TABLE `exp_civil_estados`
  MODIFY `id_estado_civil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `exp_datos_familiares`
--
ALTER TABLE `exp_datos_familiares`
  MODIFY `id_exp_datos_familiares` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `exp_escalas`
--
ALTER TABLE `exp_escalas`
  MODIFY `id_escala` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `exp_formacion_integral`
--
ALTER TABLE `exp_formacion_integral`
  MODIFY `id_exp_formacion_integral` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `exp_generales`
--
ALTER TABLE `exp_generales`
  MODIFY `id_exp_general` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `exp_habitos_estudio`
--
ALTER TABLE `exp_habitos_estudio`
  MODIFY `id_exp_habitos_estudio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `exp_opc_intelectual`
--
ALTER TABLE `exp_opc_intelectual`
  MODIFY `id_opc_intelectual` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `exp_opc_nivel_socio`
--
ALTER TABLE `exp_opc_nivel_socio`
  MODIFY `id_nivel_economico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `exp_opc_tiempo`
--
ALTER TABLE `exp_opc_tiempo`
  MODIFY `id_opc_tiempo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `exp_opc_vives`
--
ALTER TABLE `exp_opc_vives`
  MODIFY `id_opc_vives` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gnral_alumnos`
--
ALTER TABLE `gnral_alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gnral_carreras`
--
ALTER TABLE `gnral_carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gnral_grupos`
--
ALTER TABLE `gnral_grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gnral_jefes_periodos`
--
ALTER TABLE `gnral_jefes_periodos`
  MODIFY `id_jefe_periodo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gnral_personales`
--
ALTER TABLE `gnral_personales`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gnral_tipos_usuario`
--
ALTER TABLE `gnral_tipos_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupos_activos`
--
ALTER TABLE `grupos_activos`
  MODIFY `id_grupo_activo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
