-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2019 a las 22:25:39
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hvtbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--
CREATE DATABASE hvtbd;
USE hvtbd;

CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL,
  `nombre` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `estado_civil` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dui` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nit` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `carnet_minoridad` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `discapacidad` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_nac` date NOT NULL,
  `id_cohorte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `nombre`, `apellidos`, `direccion`, `estado_civil`, `sexo`, `dui`, `nit`, `carnet_minoridad`, `discapacidad`, `telefono`, `correo`, `fecha_nac`, `id_cohorte`) VALUES
(5, 'Gabriela Nathalie', 'Menendez Menendez', 'Urb. Las Colinas', 'Soltera/o', 'Femenino', '02564987-8', '1561-805181-848-4', NULL, '', '8676-4378', 'gabriela.menendez@proyectosfgk.org', '1993-06-16', 1),
(6, 'Stephannie', 'Escobar', 'calle iaofaew', 'Soltera/o', 'Femenino', '02564987-8', '1561-805181-848-4', NULL, '', '4367-3475', 'stephannie.escobar@proyectosfgk.org', '2019-04-10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cohorte`
--

CREATE TABLE `cohorte` (
  `id_cohorte` int(11) NOT NULL,
  `nombre` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_sede` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cohorte`
--

INSERT INTO `cohorte` (`id_cohorte`, `nombre`, `fecha_inicio`, `fecha_fin`, `id_sede`, `id_curso`, `estado`) VALUES
(1, 'COHORTE-1', '2019-03-25', '2019-10-28', 1, 1, 1),
(16, 'COHORTE-2', '2019-04-23', '2019-04-26', 1, 2, 1),
(24, 'COHORTE-4', '2019-04-11', '2019-04-19', 1, 1, 1),
(25, 'COHORTE-6', '2019-04-12', '2019-04-13', 1, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterio`
--

CREATE TABLE `criterio` (
  `id_criterio` int(11) NOT NULL,
  `id_tipo_criterio` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `criterio`
--

INSERT INTO `criterio` (`id_criterio`, `id_tipo_criterio`, `nombre`) VALUES
(1, 1, 'Identifica sus  fortalezas y  aspectos a mejorar'),
(2, 1, 'Identifica y relaciona sus intereses con las posibilidades de desarrollo personal, profesional y laboral'),
(3, 1, 'Asume y responde oportuna y eficientemente a los compromisos adquiridos'),
(4, 2, 'Utiliza el lenguaje escrito con claridad, fluidez y adecuadamente, para interactuar en distintos contextos sociales y con otras personas'),
(5, 2, 'Utiliza el lenguaje oral  con claridad, fluidez y adecuadamente, para interactuar en distintos contextos sociales y con otras personas'),
(6, 3, 'Analiza el entorno y las diferentes situaciones de la vida, desde diversos puntos de vista'),
(7, 3, 'Transforma necesidades u obstÃ¡culos en oportunidades'),
(8, 4, 'Identifica los aspectos del entorno visualizando necesidades, obstÃ¡culos y oportunidades para posible soluciÃ³n'),
(9, 5, 'Considera importante pensar el futuro y trazarse un objetivo'),
(10, 5, 'Especifica tiempos y recursos necesarios para cada acciÃ³n propuesta'),
(11, 5, 'Considera cuidadosamente ventajas y desventajas para valorar alternativas'),
(12, 6, 'Participa y aporta conocimientos y capacidades para el desarrollo de una tarea u objetivo comÃºn'),
(13, 6, 'Diferencia roles y funciones en el desarrollo de una tarea u objetivo comÃºn'),
(14, 6, 'InteractÃºa con las y los demÃ¡s y promueve el trabajo en equipo'),
(15, 6, 'Se responsabiliza de cumplir con su parte para el logro comÃºn de los objetivos'),
(16, 7, 'Analiza de manera anticipada  problemas, dificultades y riesgos; propone soluciones'),
(17, 7, 'Moviliza continuamente proactivamente sus recursos para lograr resultados'),
(18, 7, 'Hace lo que se necesita hacer antes que otras personas tengan que pedirle que lo haga'),
(19, 8, 'Asimila con rapidez los nuevos conocimientos y los pone en practica cotidianamente'),
(20, 8, 'EvalÃºa  y revisa sus acciones, adecuÃ¡ndose a  nuevas condiciones, entornos y personas'),
(21, 8, 'Percibe los cambios  o los desaciertos, como una posibilidad de nuevos aprendizajes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nombre` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre`) VALUES
(1, 'PHP'),
(2, 'C# XAMARIN'),
(3, 'HTML MVC'),
(4, 'JAVA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `nombre_materia` enum('Habilidades para la vida y el trabajo') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_criterio` int(11) NOT NULL,
  `nota_inicio` int(11) DEFAULT NULL,
  `nota_fin` int(11) DEFAULT NULL,
  `fecha_llenado_inicio` date DEFAULT NULL,
  `fecha_llenado_fin` date DEFAULT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`id_nota`, `nombre_materia`, `id_criterio`, `nota_inicio`, `nota_fin`, `fecha_llenado_inicio`, `fecha_llenado_fin`, `id_alumno`, `id_usuario`) VALUES
(2, 'Habilidades para la vida y el trabajo', 1, 1, 2, '2019-04-23', '2019-04-24', 5, 4),
(3, 'Habilidades para la vida y el trabajo', 2, 1, 2, '2019-04-23', '2019-04-24', 5, 4),
(4, 'Habilidades para la vida y el trabajo', 3, 2, 2, '2019-04-23', '2019-04-24', 5, 4),
(5, 'Habilidades para la vida y el trabajo', 4, 1, 2, '2019-04-23', '2019-04-24', 5, 4),
(6, 'Habilidades para la vida y el trabajo', 5, 2, 3, '2019-04-23', '2019-04-24', 5, 4),
(7, 'Habilidades para la vida y el trabajo', 6, 1, 3, '2019-04-23', '2019-04-24', 5, 4),
(8, 'Habilidades para la vida y el trabajo', 7, 2, 3, '2019-04-23', '2019-04-24', 5, 4),
(9, 'Habilidades para la vida y el trabajo', 8, 0, 0, '2019-04-23', '2019-04-24', 5, 4),
(10, 'Habilidades para la vida y el trabajo', 9, 0, 0, '2019-04-23', '2019-04-24', 5, 4),
(11, 'Habilidades para la vida y el trabajo', 10, 0, 0, '2019-04-23', '2019-04-24', 5, 4),
(12, 'Habilidades para la vida y el trabajo', 11, 0, 0, '2019-04-23', '2019-04-24', 5, 4),
(13, 'Habilidades para la vida y el trabajo', 12, 0, 0, '2019-04-23', '2019-04-24', 5, 4),
(14, 'Habilidades para la vida y el trabajo', 13, 0, 0, '2019-04-23', '2019-04-24', 5, 4),
(15, 'Habilidades para la vida y el trabajo', 14, 0, 0, '2019-04-23', '2019-04-24', 5, 4),
(16, 'Habilidades para la vida y el trabajo', 15, 0, 0, '2019-04-23', '2019-04-24', 5, 4),
(17, 'Habilidades para la vida y el trabajo', 16, 0, 0, '2019-04-23', '2019-04-24', 5, 4),
(18, 'Habilidades para la vida y el trabajo', 17, 0, 0, '2019-04-23', '2019-04-24', 5, 4),
(19, 'Habilidades para la vida y el trabajo', 18, 0, 0, '2019-04-23', '2019-04-24', 5, 4),
(20, 'Habilidades para la vida y el trabajo', 19, 0, 0, '2019-04-23', '2019-04-24', 5, 4),
(21, 'Habilidades para la vida y el trabajo', 20, 0, 0, '2019-04-23', '2019-04-24', 5, 4),
(22, 'Habilidades para la vida y el trabajo', 21, 0, 0, '2019-04-23', '2019-04-24', 5, 4),
(23, 'Habilidades para la vida y el trabajo', 1, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(24, 'Habilidades para la vida y el trabajo', 2, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(25, 'Habilidades para la vida y el trabajo', 3, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(26, 'Habilidades para la vida y el trabajo', 4, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(27, 'Habilidades para la vida y el trabajo', 5, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(28, 'Habilidades para la vida y el trabajo', 6, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(29, 'Habilidades para la vida y el trabajo', 7, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(30, 'Habilidades para la vida y el trabajo', 8, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(31, 'Habilidades para la vida y el trabajo', 9, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(32, 'Habilidades para la vida y el trabajo', 10, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(33, 'Habilidades para la vida y el trabajo', 11, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(34, 'Habilidades para la vida y el trabajo', 12, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(35, 'Habilidades para la vida y el trabajo', 13, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(36, 'Habilidades para la vida y el trabajo', 14, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(37, 'Habilidades para la vida y el trabajo', 15, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(38, 'Habilidades para la vida y el trabajo', 16, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(39, 'Habilidades para la vida y el trabajo', 17, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(40, 'Habilidades para la vida y el trabajo', 18, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(41, 'Habilidades para la vida y el trabajo', 19, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(42, 'Habilidades para la vida y el trabajo', 20, 0, 0, '2019-04-24', '2019-04-24', 6, 4),
(43, 'Habilidades para la vida y el trabajo', 21, 0, 0, '2019-04-24', '2019-04-24', 6, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'DOCENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id_sede` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `telefono` varchar(32) NOT NULL,
  `correo` varchar(120) DEFAULT NULL,
  `direccion` varchar(120) NOT NULL,
  `departamento` varchar(64) NOT NULL,
  `municipio` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id_sede`, `nombre`, `telefono`, `correo`, `direccion`, `departamento`, `municipio`) VALUES
(1, 'FGK-SANTA ANA', '4367-3475', 'vnsihrs@jsgergvsdgsrjgdkfhbdsjklrghdjkrhgkdjrgd.com', '9Â° Calle ', 'SANTA ANA', 'Santa Ana'),
(3, 'FGK AHUACHAPAN', '8676-4378', 'adagae@gmail.com', 'calle faew', 'AHUACHAPAN', 'AHUACHAPAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_criterio`
--

CREATE TABLE `tipo_criterio` (
  `id_tipo_criterio` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_criterio`
--

INSERT INTO `tipo_criterio` (`id_tipo_criterio`, `nombre`) VALUES
(1, 'Gestionar el desarrollo personal '),
(2, 'Comunicar con efectividad'),
(3, 'Identificar oportunidades'),
(4, 'Pensar y actuar de manera creativa'),
(5, 'Traducir ideas en un plan de acciÃ³n'),
(6, 'Trabajar de manera colaborativa'),
(7, 'Actuar con iniciativa'),
(8, 'Adaptacion al cambio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `correo` varchar(120) NOT NULL,
  `contrasenia` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidos`, `id_rol`, `correo`, `contrasenia`) VALUES
(1, 'Ulises', 'Samayoa', 1, 'ulises.samayoa@proyectosfgk.org', '202cb962ac59075b964b07152d234b70'),
(4, 'Rogelio', 'Gonzalez', 2, 'rogelio.gonzalez@proyectosfgk.org', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'Mauricio', 'Gudiel', 1, 'mauricio.gudiel@proyectosfgk.org', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `id_cohorte` (`id_cohorte`);

--
-- Indices de la tabla `cohorte`
--
ALTER TABLE `cohorte`
  ADD PRIMARY KEY (`id_cohorte`),
  ADD KEY `id_sede` (`id_sede`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `criterio`
--
ALTER TABLE `criterio`
  ADD PRIMARY KEY (`id_criterio`),
  ADD KEY `id_tipo_criterio` (`id_tipo_criterio`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_criterio` (`id_criterio`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id_sede`);

--
-- Indices de la tabla `tipo_criterio`
--
ALTER TABLE `tipo_criterio`
  ADD PRIMARY KEY (`id_tipo_criterio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cohorte`
--
ALTER TABLE `cohorte`
  MODIFY `id_cohorte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `criterio`
--
ALTER TABLE `criterio`
  MODIFY `id_criterio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `id_sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_criterio`
--
ALTER TABLE `tipo_criterio`
  MODIFY `id_tipo_criterio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`id_cohorte`) REFERENCES `cohorte` (`id_cohorte`);

--
-- Filtros para la tabla `cohorte`
--
ALTER TABLE `cohorte`
  ADD CONSTRAINT `cohorte_ibfk_1` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`),
  ADD CONSTRAINT `cohorte_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);

--
-- Filtros para la tabla `criterio`
--
ALTER TABLE `criterio`
  ADD CONSTRAINT `criterio_ibfk_1` FOREIGN KEY (`id_tipo_criterio`) REFERENCES `tipo_criterio` (`id_tipo_criterio`);

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`),
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `nota_ibfk_3` FOREIGN KEY (`id_criterio`) REFERENCES `criterio` (`id_criterio`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
