-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-09-2021 a las 23:12:35
-- Versión del servidor: 5.7.15-log
-- Versión de PHP: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaescolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `mat_codigo` int(3) NOT NULL,
  `mat_nombre` varchar(30) NOT NULL,
  `mat_area` varchar(30) NOT NULL,
  `mat_nivel` varchar(10) NOT NULL,
  `mat_horas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`mat_codigo`, `mat_nombre`, `mat_area`, `mat_nivel`, `mat_horas`) VALUES
(1, 'Lengua y Literatura', 'Lengua y Literatura', '2do', 10),
(2, 'Matematica', 'Matematica', '2do', 8),
(3, 'Estudios Sociales', 'Ciencias Sociales', '2do', 2),
(4, 'Ciencias Naturales', 'Ciencias Naturales', '2do', 3),
(5, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '2do', 2),
(6, 'Educación Física', 'Educación Física', '2do', 5),
(7, 'Ingles', 'Lengua Extranjera', '2do', 3),
(8, 'Lengua y Literatura', 'Lengua y Literatura', '3ro', 10),
(9, 'Matematica', 'Matematica', '3ro', 8),
(10, 'Estudios Sociales', 'Ciencias Sociales', '3ro', 2),
(11, 'Ciencias Naturales', 'Ciencias Naturales', '3ro', 3),
(12, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '3ro', 2),
(13, 'Educación Física', 'Educación Física', '3ro', 5),
(14, 'Ingles', 'Lengua Extranjera', '3ro', 3),
(15, 'Lengua y Literatura', 'Lengua y Literatura', '4to', 10),
(16, 'Matematica', 'Matematica', '4to', 8),
(17, 'Estudios Sociales', 'Ciencias Sociales', '4to', 2),
(18, 'Ciencias Naturales', 'Ciencias Naturales', '4to', 3),
(19, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '4to', 2),
(20, 'Educación Física', 'Educación Física', '4to', 5),
(21, 'Ingles', 'Lengua Extranjera', '4to', 3),
(22, 'Lengua y Literatura', 'Lengua y Literatura', '5to', 8),
(23, 'Matematica', 'Matematica', '5to', 7),
(24, 'Estudios Sociales', 'Ciencias Sociales', '5to', 3),
(25, 'Ciencias Naturales', 'Ciencias Naturales', '5to', 5),
(26, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '5to', 2),
(27, 'Educación Física', 'Educación Física', '5to', 5),
(28, 'Ingles', 'Lengua Extranjera', '5to', 3),
(29, 'Lengua y Literatura', 'Lengua y Literatura', '6to', 8),
(30, 'Matematica', 'Matematica', '6to', 7),
(31, 'Estudios Sociales', 'Ciencias Sociales', '6to', 3),
(32, 'Ciencias Naturales', 'Ciencias Naturales', '6to', 5),
(33, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '6to', 2),
(34, 'Educación Física', 'Educación Física', '6to', 5),
(35, 'Ingles', 'Lengua Extranjera', '6to', 3),
(36, 'Lengua y Literatura', 'Lengua y Literatura', '7mo', 8),
(37, 'Matematica', 'Matematica', '7mo', 7),
(38, 'Estudios Sociales', 'Ciencias Sociales', '7mo', 3),
(39, 'Ciencias Naturales', 'Ciencias Naturales', '7mo', 5),
(40, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '7mo', 2),
(41, 'Educación Física', 'Educación Física', '7mo', 5),
(42, 'Ingles', 'Lengua Extranjera', '7mo', 3),
(43, 'Lengua y Literatura', 'Lengua y Literatura', '8vo', 6),
(44, 'Matematica', 'Matematica', '8vo', 6),
(45, 'Estudios Sociales', 'Ciencias Sociales', '8vo', 4),
(46, 'Ciencias Naturales', 'Ciencias Naturales', '8vo', 4),
(47, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '8vo', 2),
(48, 'Educación Física', 'Educación Física', '8vo', 5),
(49, 'Ingles', 'Lengua Extranjera', '8vo', 5),
(50, 'Lengua y Literatura', 'Lengua y Literatura', '9no', 6),
(51, 'Matematica', 'Matematica', '9no', 6),
(52, 'Estudios Sociales', 'Ciencias Sociales', '9no', 4),
(53, 'Ciencias Naturales', 'Ciencias Naturales', '9no', 4),
(54, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '9no', 2),
(55, 'Educación Física', 'Educación Física', '9no', 5),
(56, 'Ingles', 'Lengua Extranjera', '9no', 5),
(57, 'Lengua y Literatura', 'Lengua y Literatura', '10mo', 6),
(58, 'Matematica', 'Matematica', '10mo', 6),
(59, 'Estudios Sociales', 'Ciencias Sociales', '10mo', 4),
(60, 'Ciencias Naturales', 'Ciencias Naturales', '10mo', 4),
(61, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '10mo', 2),
(62, 'Educación Física', 'Educación Física', '10mo', 5),
(63, 'Ingles', 'Lengua Extranjera', '10mo', 5),
(64, 'Matematica', 'Matematica', '1BGU', 5),
(65, 'Física', 'Ciencias Naturales', '1BGU', 3),
(66, 'Química', 'Ciencias Naturales', '1BGU', 2),
(67, 'Biología', 'Ciencias Naturales', '1BGU', 2),
(68, 'Historia', 'Ciencias Sociales', '1BGU', 3),
(69, 'Educación para la Ciudadanía', 'Ciencias Sociales', '1BGU', 2),
(70, 'Filosofía', 'Ciencias Sociales', '1BGU', 2),
(71, 'Lengua y Literatura', 'Lengua y Literatura', '1BGU', 5),
(72, 'Ingles', 'Lengua Extranjera', '1BGU', 5),
(73, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '1BGU', 2),
(74, 'Educación Física', 'Educación Física', '1BGU', 2),
(75, 'Emprendimiento y Gestión', 'Módulo Interdisciplinar', '1BGU', 2),
(76, 'Matematica', 'Matematica', '2BGU', 4),
(77, 'Física', 'Ciencias Naturales', '2BGU', 3),
(78, 'Química', 'Ciencias Naturales', '2BGU', 3),
(79, 'Biología', 'Ciencias Naturales', '2BGU', 2),
(80, 'Historia', 'Ciencias Sociales', '2BGU', 3),
(81, 'Educación para la Ciudadanía', 'Ciencias Sociales', '2BGU', 2),
(82, 'Filosofía', 'Ciencias Sociales', '2BGU', 2),
(83, 'Lengua y Literatura', 'Lengua y Literatura', '2BGU', 5),
(84, 'Ingles', 'Lengua Extranjera', '2BGU', 5),
(85, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '2BGU', 2),
(86, 'Educación Física', 'Educación Física', '2BGU', 2),
(87, 'Emprendimiento y Gestión', 'Módulo Interdisciplinar', '2BGU', 2),
(88, 'Matematica', 'Matematica', '3BGU', 3),
(89, 'Física', 'Ciencias Naturales', '3BGU', 2),
(90, 'Química', 'Ciencias Sociales', '3BGU', 2),
(91, 'Biología', 'Ciencias Naturales', '3BGU', 2),
(92, 'Historia', 'Ciencias Sociales', '3BGU', 2),
(93, 'Lengua y Literatura', 'Lengua y Literatura', '3BGU', 2),
(94, 'Ingles', 'Lengua Extranjera', '3BGU', 3),
(95, 'Educación Física', 'Educación Física', '3BGU', 2),
(96, 'Emprendimiento y Gestión', 'Módulo Interdisciplinar', '3BGU', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `user` varchar(20) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `curso` varchar(10) NOT NULL,
  `rol` varchar(10) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `area` varchar(20) NOT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `cedula`, `user`, `clave`, `correo`, `curso`, `rol`, `fecha`, `area`, `nivel`) VALUES
(20, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin@espe.cpm', 'admin', 'Admin', '2021-09-05 02:45:38', '', ''),
(21, 'Jorge', 'Ramos', '1727672006', 'jsramos', 'Jsramos3', 'jorge@espe.ec', 'N/A', 'Supervisor', '2021-09-07 22:07:23', 'N/A', 'N/A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`mat_codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `mat_codigo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
