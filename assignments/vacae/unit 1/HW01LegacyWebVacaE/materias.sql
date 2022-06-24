-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-09-2021 a las 01:06:07
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `id` int(3) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `area` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nivel` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `horas` int(2) NOT NULL,
  `estado` int(2) NOT NULL DEFAULT '1' COMMENT 'Activo: 1 - Inactivo: 0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre`, `area`, `nivel`, `horas`, `estado`) VALUES
(1, 'Lengua y Literatura', 'Lengua y Literatura', '2do', 10, 1),
(2, 'Matematica', 'Matematica', '2do', 8, 1),
(3, 'Estudios Sociales', 'Ciencias Sociales', '2do', 2, 1),
(4, 'Ciencias Naturales', 'Ciencias Naturales', '2do', 3, 1),
(5, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '2do', 2, 1),
(6, 'Educación Física', 'Educación Física', '2do', 5, 1),
(7, 'Ingles', 'Lengua Extranjera', '2do', 3, 1),
(8, 'Lengua y Literatura', 'Lengua y Literatura', '3ro', 10, 1),
(9, 'Matematica', 'Matematica', '3ro', 8, 1),
(10, 'Estudios Sociales', 'Ciencias Sociales', '3ro', 2, 1),
(11, 'Ciencias Naturales', 'Ciencias Naturales', '3ro', 3, 1),
(12, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '3ro', 2, 1),
(13, 'Educación Física', 'Educación Física', '3ro', 5, 1),
(14, 'Ingles', 'Lengua Extranjera', '3ro', 3, 1),
(15, 'Lengua y Literatura', 'Lengua y Literatura', '4to', 10, 0),
(16, 'Matematica', 'Matematica', '4to', 8, 1),
(17, 'Estudios Sociales', 'Ciencias Sociales', '4to', 2, 1),
(18, 'Ciencias Naturales', 'Ciencias Naturales', '4to', 3, 1),
(19, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '4to', 2, 1),
(20, 'Educación Física', 'Educación Física', '4to', 5, 1),
(21, 'Ingles', 'Lengua Extranjera', '4to', 3, 1),
(22, 'Lengua y Literatura', 'Lengua y Literatura', '5to', 8, 1),
(23, 'Matematica', 'Matematica', '5to', 7, 1),
(24, 'Estudios Sociales', 'Ciencias Sociales', '5to', 3, 1),
(25, 'Ciencias Naturales', 'Ciencias Naturales', '5to', 5, 1),
(26, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '5to', 2, 1),
(27, 'Educación Física', 'Educación Física', '5to', 5, 1),
(28, 'Ingles', 'Lengua Extranjera', '5to', 3, 1),
(29, 'Lengua y Literatura', 'Lengua y Literatura', '6to', 8, 1),
(30, 'Matematica', 'Matematica', '6to', 7, 1),
(31, 'Estudios Sociales', 'Ciencias Sociales', '6to', 3, 1),
(32, 'Ciencias Naturales', 'Ciencias Naturales', '6to', 5, 1),
(33, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '6to', 2, 1),
(34, 'Educación Física', 'Educación Física', '6to', 5, 1),
(35, 'Ingles', 'Lengua Extranjera', '6to', 3, 1),
(36, 'Lengua y Literatura', 'Lengua y Literatura', '7mo', 8, 1),
(37, 'Matematica', 'Matematica', '7mo', 7, 1),
(38, 'Estudios Sociales', 'Ciencias Sociales', '7mo', 3, 1),
(39, 'Ciencias Naturales', 'Ciencias Naturales', '7mo', 5, 1),
(40, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '7mo', 2, 1),
(41, 'Educación Física', 'Educación Física', '7mo', 5, 1),
(42, 'Ingles', 'Lengua Extranjera', '7mo', 3, 1),
(43, 'Lengua y Literatura', 'Lengua y Literatura', '8vo', 6, 1),
(44, 'Matematica', 'Matematica', '8vo', 6, 1),
(45, 'Estudios Sociales', 'Ciencias Sociales', '8vo', 4, 1),
(46, 'Ciencias Naturales', 'Ciencias Naturales', '8vo', 4, 1),
(47, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '8vo', 2, 1),
(48, 'Educación Física', 'Educación Física', '8vo', 5, 1),
(49, 'Ingles', 'Lengua Extranjera', '8vo', 5, 1),
(50, 'Lengua y Literatura', 'Lengua y Literatura', '9no', 6, 1),
(51, 'Matematica', 'Matematica', '9no', 6, 1),
(52, 'Estudios Sociales', 'Ciencias Sociales', '9no', 4, 1),
(53, 'Ciencias Naturales', 'Ciencias Naturales', '9no', 4, 1),
(54, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '9no', 2, 1),
(55, 'Educación Física', 'Educación Física', '9no', 5, 1),
(56, 'Ingles', 'Lengua Extranjera', '9no', 5, 1),
(57, 'Lengua y Literatura', 'Lengua y Literatura', '10mo', 6, 1),
(58, 'Matematica', 'Matematica', '10mo', 6, 1),
(59, 'Estudios Sociales', 'Ciencias Sociales', '10mo', 4, 1),
(60, 'Ciencias Naturales', 'Ciencias Naturales', '10mo', 4, 1),
(61, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '10mo', 2, 1),
(62, 'Educación Física', 'Educación Física', '10mo', 5, 1),
(63, 'Ingles', 'Lengua Extranjera', '10mo', 5, 1),
(64, 'Matematica', 'Matematica', '1BGU', 5, 1),
(65, 'Física', 'Ciencias Naturales', '1BGU', 3, 1),
(66, 'Química', 'Ciencias Naturales', '1BGU', 2, 1),
(67, 'Biología', 'Ciencias Naturales', '1BGU', 2, 1),
(68, 'Historia', 'Ciencias Sociales', '1BGU', 3, 1),
(69, 'Educación para la Ciudadanía', 'Ciencias Sociales', '1BGU', 2, 1),
(70, 'Filosofía', 'Ciencias Sociales', '1BGU', 2, 1),
(71, 'Lengua y Literatura', 'Lengua y Literatura', '1BGU', 5, 1),
(72, 'Ingles', 'Lengua Extranjera', '1BGU', 5, 1),
(73, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '1BGU', 2, 1),
(74, 'Educación Física', 'Educación Física', '1BGU', 2, 1),
(75, 'Emprendimiento y Gestión', 'Módulo Interdisciplinar', '1BGU', 2, 1),
(76, 'Matematica', 'Matematica', '2BGU', 4, 1),
(77, 'Física', 'Ciencias Naturales', '2BGU', 3, 1),
(78, 'Química', 'Ciencias Naturales', '2BGU', 3, 1),
(79, 'Biología', 'Ciencias Naturales', '2BGU', 2, 1),
(80, 'Historia', 'Ciencias Sociales', '2BGU', 3, 1),
(81, 'Educación para la Ciudadanía', 'Ciencias Sociales', '2BGU', 2, 1),
(82, 'Filosofía', 'Ciencias Sociales', '2BGU', 2, 1),
(83, 'Lengua y Literatura', 'Lengua y Literatura', '2BGU', 5, 1),
(84, 'Ingles', 'Lengua Extranjera', '2BGU', 5, 1),
(85, 'Educación Cultural y Artística', 'Educación Cultural y Artística', '2BGU', 2, 1),
(86, 'Educación Física', 'Educación Física', '2BGU', 2, 1),
(87, 'Emprendimiento y Gestión', 'Módulo Interdisciplinar', '2BGU', 2, 1),
(88, 'Matematica', 'Matematica', '3BGU', 3, 1),
(89, 'Física', 'Ciencias Naturales', '3BGU', 2, 1),
(90, 'Química', 'Ciencias Sociales', '3BGU', 2, 1),
(91, 'Biología', 'Ciencias Naturales', '3BGU', 2, 1),
(92, 'Historia', 'Ciencias Sociales', '3BGU', 2, 1),
(93, 'Lengua y Literatura', 'Lengua y Literatura', '3BGU', 2, 1),
(94, 'Ingles', 'Lengua Extranjera', '3BGU', 3, 1),
(95, 'Educación Física', 'Educación Física', '3BGU', 2, 1),
(96, 'Emprendimiento y Gestión', 'Módulo Interdisciplinar', '3BGU', 2, 1),
(97, 'asdasda', 'asdasdasd', '4to', 5, 1),
(98, 'aasxasxa', 'asdasd', '7mo', 5, 1),
(99, 'qdqwdqwd', 'qdwqd', '4to', 4, 1),
(100, 'Pablo', 'qdwqd', '4to', 4, 1),
(101, 'asasdasd', 'dasdasd', '4to', 5, 1),
(102, 'asdasda', 'asdasdasd', '3ro', 4, 1),
(103, 'luis', '', '', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
