-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 13, 2021 at 04:11 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto7`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `ADM_CODIGO` int(11) NOT NULL,
  `PER_CEDULA` char(11) NOT NULL,
  `PER_NOMBRES` varchar(35) NOT NULL,
  `PER_APELLIDOS` varchar(35) NOT NULL,
  `PER_USUARIO` char(20) NOT NULL,
  `PER_CLAVE` char(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PER_ROL` int(1) NOT NULL,
  `PER_TELEFONO` char(10) DEFAULT NULL,
  `PER_CORREO` varchar(70) DEFAULT NULL,
  `PER_FECHA_NACIMIENTO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`ADM_CODIGO`, `PER_CEDULA`, `PER_NOMBRES`, `PER_APELLIDOS`, `PER_USUARIO`, `PER_CLAVE`, `PER_ROL`, `PER_TELEFONO`, `PER_CORREO`, `PER_FECHA_NACIMIENTO`) VALUES
(1, '1750893966', 'Yoselin', 'Andrango', 'yoselin', '12345', 1, '0987547845', 'correo@hotmail.com', '2021-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `ARE_CODIGO` int(11) NOT NULL,
  `ARE_NOMBRE` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`ARE_CODIGO`, `ARE_NOMBRE`) VALUES
(1, 'Ciencias exactas'),
(2, 'Idiomas'),
(3, 'Literatura'),
(4, 'Recreacion'),
(5, 'Ciencias naturales'),
(6, 'Informatica'),
(7, 'Ciencias sociales'),
(8, 'Interdisciplinar'),
(9, 'Hola ccomo estas'),
(10, 'vadvadvadv'),
(11, 'CCC'),
(12, 'davdavadv'),
(13, 'davdavadv'),
(14, 'Hola ccomo estas'),
(15, '49865adsdasd'),
(16, 'elkin'),
(17, 'milenka'),
(18, 'karate'),
(19, 'jeremias'),
(20, 'matematica'),
(21, 'salmon'),
(22, 'Artes Marciales'),
(23, 'DIBUJO'),
(24, 'Escultura');

-- --------------------------------------------------------

--
-- Table structure for table `auditoria`
--

CREATE TABLE `auditoria` (
  `AUD_CODIGO` int(11) NOT NULL,
  `PER_CEDULA` char(11) NOT NULL,
  `AUD_IP` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `AUD_MAC` varchar(30) NOT NULL,
  `AUD_FECHA` date NOT NULL,
  `AUD_HORA` time NOT NULL,
  `AUD_PROCESO` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auditoria`
--

INSERT INTO `auditoria` (`AUD_CODIGO`, `PER_CEDULA`, `AUD_IP`, `AUD_MAC`, `AUD_FECHA`, `AUD_HORA`, `AUD_PROCESO`) VALUES
(111, '131101879-5', '::1', '', '2021-09-12', '23:05:50', 'Inicio Sesión'),
(112, '131101879-5', '::1', '', '2021-09-12', '23:05:52', 'Observó Horario'),
(113, '131101879-5', '::1', '', '2021-09-12', '23:06:23', 'Finalizó Sesión'),
(114, '131101879-5', '::1', '', '2021-09-12', '23:06:32', 'Inicio Sesión'),
(115, '131101879-5', '::1', '', '2021-09-12', '23:06:39', 'Observó Horario'),
(116, '131101879-5', '::1', '', '2021-09-12', '23:08:24', 'Observó Horario'),
(117, '131101879-5', '::1', '', '2021-09-12', '23:08:28', 'Observó Horario'),
(118, '131101879-5', '::1', '', '2021-09-12', '23:09:34', 'Observó Horario'),
(119, '131101879-5', '::1', '', '2021-09-12', '23:09:35', 'Observó Horario'),
(120, '131101879-5', '::1', '', '2021-09-12', '23:10:18', 'Descargó Horario');

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `CUR_CODIGO` int(11) NOT NULL,
  `CUR_CURSO` char(25) NOT NULL,
  `CUR_PARALELO` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `CUR_DISPONIBLE` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`CUR_CODIGO`, `CUR_CURSO`, `CUR_PARALELO`, `CUR_DISPONIBLE`) VALUES
(1, '1 BGU', 'A', 1),
(2, '1 BGU', 'B', 1),
(3, '2 BGU', 'A', 1),
(4, '2 BGU', 'B', 1),
(5, '10', 'A', 0),
(6, '10', 'B', 1),
(7, '3 BGU', 'A', 1),
(8, '3 BGU', 'B', 1),
(9, '6', 'A', 1),
(10, '4', 'A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `docente`
--

CREATE TABLE `docente` (
  `DOC_CODIGO` int(11) NOT NULL,
  `PER_CEDULA` char(11) NOT NULL,
  `PER_NOMBRES` varchar(35) NOT NULL,
  `PER_APELLIDOS` varchar(35) NOT NULL,
  `PER_USUARIO` char(20) NOT NULL,
  `PER_CLAVE` char(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PER_ROL` int(1) NOT NULL,
  `PER_TELEFONO` char(10) DEFAULT NULL,
  `PER_CORREO` varchar(70) DEFAULT NULL,
  `PER_FECHA_NACIMIENTO` date DEFAULT NULL,
  `MAT_CODIGO` int(11) NOT NULL,
  `DOC_ESPECIALIDAD` varchar(30) NOT NULL,
  `DOC_NIVEL` char(1) NOT NULL,
  `DOC_NUMERO_HORAS` int(11) NOT NULL DEFAULT '30'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `docente`
--

INSERT INTO `docente` (`DOC_CODIGO`, `PER_CEDULA`, `PER_NOMBRES`, `PER_APELLIDOS`, `PER_USUARIO`, `PER_CLAVE`, `PER_ROL`, `PER_TELEFONO`, `PER_CORREO`, `PER_FECHA_NACIMIENTO`, `MAT_CODIGO`, `DOC_ESPECIALIDAD`, `DOC_NIVEL`, `DOC_NUMERO_HORAS`) VALUES
(1, '171052145', 'Kleber', 'Aguilar', 'kaguilar', '12345', 3, '0999999999', 'cooreo@hotmail.com', '1983-07-08', 16, 'Programador', 'B', 30),
(2, '17485959-9', 'Steven', 'Chinlle', 'schinlle', '12345', 3, '0954878448', 'steven@gmail.com', '1991-06-13', 2, 'Fisica', 'B', 30),
(3, '175010101-', 'lauro', 'Martinez', 'lmartinez', '$2y$10$ZFi/xEtczzuqTtXBWk3HMevLgUDUSy/Fwr/ZZRofjkJN9GCtWyjZq', 4, '0447845784', 'lmartinez@gmail.com', '2021-09-03', 13, 'Artes', 'B', 30),
(4, '171020405-', 'docente', 'ddedede', 'docente', '$2y$10$B3dQvjpnE7neKJYDRftXheXKu62rTU.oXq505JOxpWf2kTuwdXz.a', 4, '0945784545', 'doce@gmail.com', '2021-04-29', 10, 'Karate', 'B', 30),
(5, '175081149-', 'Marcelo', 'Pobeda', 'mpobeda', '$2y$10$ATFiMnQ3CxiSVCL88D5tiuxxWlebnfI.9lpt0XEYwTI8EOFPjDn6q', 4, '0945142144', 'mpobeda@gmail.com', '2021-09-23', 1, 'Maematicas', 'B', 30),
(6, '131154465-2', 'Elkin David', 'Vera Cadena', 'edvera1', '$2y$10$BV9Vz/m8.o5rnD3xFaQWou2gmVHbfb.4g7DDf.DB41FiHur2YzvQi', 4, '0982657346', 'edvera1@espe.edu.ec', '2021-09-01', 1, 'Matematico', 'B', 30),
(7, '131154465-1', 'Milenka Andreina', 'Vera Cadena', 'mandreina', '$2y$10$V7ZkIyMOd370mHvCO8xg0uO49z1yg2OirQOD1JWJweSWFsVp129iy', 4, '0982655874', 'mandreina@hotmail.com', '2021-09-07', 2, 'Ingenieria fisica', 'B', 30),
(8, '131145285-8', 'Jessica Karina', 'Cadena Velez', 'kcadena', '$2y$10$Oox9SoZh85jkIFyUUg/Od.Y60ukYmv7uicWcVATJuKwK.CSvnjDNq', 4, '0982651452', 'kcadena29@gmail.com', '2021-09-07', 3, 'Preparadora fisica', 'E', 25),
(9, '131154465-2', 'Helquin Arturo', 'Vera Londono', 'hver', '$2y$10$bkILipZyBOitdPbhxYmoSeUfLFLE4Yyr3qo3kxg4qqBe2zLLQdh.2', 4, '0982655874', 'hver500@outlook.com', '2021-09-07', 4, 'Licenciado en idiomas', 'B', 30),
(10, '131145285-2', 'Cesar', 'Galarraga Cevallos', 'cesar', '$2y$10$NUCq/w.NwB6ANtfOk4Ib6.zhPUcVtaOUiqJekl7jXIdI21LlPUafi', 4, '0982602156', 'cgcevallos@hotmail.com', '2021-09-07', 5, 'Escritor', 'B', 30),
(11, '131154879-5', 'Gabriel', 'Tipan', 'gtipan', '$2y$10$JZ3qzVti6sejnqdA7AZT5uf1I.4WS.x8QbkgK3O2lK98l9E/pYCnS', 4, '0982655874', 'gabriel@hotmail.com', '2021-09-06', 6, 'Dramaturgo', 'E', 24),
(12, '131154856-9', 'Elias', 'Chonillo', 'echonillo', '$2y$10$j7BQcxwy8c9BG3RLBo5R9.NLvow8QG.8T9ASMbeFYmdp9LbRQywjK', 4, '0985623658', 'echonillo@hotmail.com', '2021-09-07', 7, 'Matematico', 'E', 24),
(13, '131154879-0', 'Adrian Renato', 'Lopez Ayon', 'ralo', '$2y$10$snWhV83egnEFOE.3aNofFe/lky2qxHyN2/eMHHYP6L4f8e0XH75Bu', 4, '0980000001', 'renato_lopez@hotmail.com', '2021-09-07', 8, 'Quimico', 'B', 30),
(14, '131154465-2', 'Allyson Rafaela', 'Burau Garcia', 'allybu', '$2y$10$loP01TRbJoiZCqPWxHRJz./EVQ5tD3MrIA0CtR7vWMXTjJiP0ov4S', 4, '0982655874', 'allyson@hotmail.com', '2021-09-07', 9, 'Biologa', 'B', 30),
(15, '131145285-7', 'Nataly', 'Morales', 'nathy', '$2y$10$vLBYXsWGe9kZ3Gr4iTwvje..RoCjf5u9y/omTd6.E5aRFVJpBVS82', 4, '0982602156', 'nmorales@hotmail.com', '0000-00-00', 10, 'Historiadora', 'B', 30),
(16, '131354879-5', 'Maycol', 'Tituana Tupiza', 'maycol', '$2y$10$odqHHBD71nmsR2xx6q79rON6YYuM3mlVqqN9KlMhpaHVoIwAIAGbC', 4, '0985623658', 'mtituana@hotmail.com', '2021-09-08', 11, 'Licenciado', 'B', 30),
(17, '131145285-9', 'Maria Belen', 'Vera Cadena', 'mbelen', '$2y$10$b9VwnZ.iXDdNvka/Pk.o6.VH58iDefjW5NsuLMgE/T5kEvxM8rvJm', 4, '0982602156', 'mbelen_vera@hotmail.com', '2021-08-31', 12, 'Filosofa', 'B', 30),
(18, '131145285-1', 'Daniel', 'Chonillo', 'daniel', '$2y$10$aTSqEYOvtTs7G.OSMquKS.BMPSLyQQWgIvhflf9lSAgn.kGsCZRo.', 4, '0985623658', 'daniel@hotmail.com', '2021-09-07', 13, 'Arquitecto', 'B', 30),
(19, '131158579-5', 'Diego', 'Mendoza Mendoza', 'diego', '$2y$10$U.Zk3/s2IEPRN0FhE5EdLOrAnqBeXasPiYKEvvyVsOeBqCKfj5XH6', 4, '', '', '2021-09-03', 14, 'Preparador fisico', 'E', 30),
(20, '221154465-2', 'Riztho', 'Rodriguez', 'riztho', '$2y$10$556EjkoCqwmKbvdqskNjaego9hP4a0TZBGRqVo3VMpbFuaUK0TLUW', 4, '0982655874', 'riztho@hotmail.com', '2021-09-07', 15, 'Emprendedor', 'B', 30),
(21, '131784465-2', 'Nahomi', 'Guzman', 'naho', '$2y$10$9BhP.TuBHj99tfPb3QXA7OsTYKrT/T4EUzJyQh5AnatJUC2dNOIr.', 4, '0982651452', 'nahomi@hotmail.com', '2021-09-08', 16, 'Ingeniera de software', 'B', 30),
(22, '131414465-2', 'Paula', 'Paredes Torres', 'paula', '$2y$10$sR.j639/TVjsEo.8oM7IGuqhPgQCcgjy1IECVvJ3lRAlbiqzlrMUq', 4, '0982655874', 'paula@hotmail.com', '2021-09-14', 17, 'Arquitecta', 'E', 28),
(23, '137854879-5', 'Alessa', 'Delgado', 'alessa', '$2y$10$A.1WijAoMUNLYMCUNTubkuUrGKBCxhvWaGzcyAH.As5VdytNsSef2', 4, '0982655874', 'alessa@hotmail.com', '2021-09-06', 18, 'Biologa', 'E', 26),
(24, '137454879-5', 'Pilar', 'Intriago Bergmann', 'pili', '$2y$10$0DSzPRuk1xyvn9zbL0.40epAielBx3Q4062NSJye67OYbEQDLCi86', 4, '0982655874', 'pilar@hotmail.com', '2021-09-09', 2, 'Fisica', 'B', 30),
(25, '131154879-6', 'Carolina', 'Sanchez', 'carol', '$2y$10$8VgRU5j9Rx6IGX42AvtM6u17uVGrdXgfDIkkn6nQEY9FE3axcLshO', 4, '0982602156', 'carol@hotmail.com', '2021-08-31', 20, 'Licenciada en idiomas', 'E', 25),
(26, '131101879-5', 'Marina', 'Tortorelli', 'marina', '$2y$10$yM4deHq8PYJqSUoHiXvbreY4ivNn44FxiFyTB1Lm35TpQzxXcuKrW', 4, '0982651452', 'marina@hotmail.com', '2021-09-03', 21, 'Licenciada', 'E', 27),
(27, '137845285-2', 'David', 'Cruz Gonzalez', 'david', '$2y$10$3qSvjkffGGQd6diFOVtaUOh.FJ7l5tDgH0kKf2LXJY.nqKXxM3ifC', 4, '0982651452', 'david@hotmail.com', '2021-08-31', 19, 'Historiador', 'E', 26);

-- --------------------------------------------------------

--
-- Table structure for table `estudiante`
--

CREATE TABLE `estudiante` (
  `EST_CODIGO` int(11) NOT NULL,
  `PER_CEDULA` char(11) NOT NULL,
  `PER_NOMBRES` varchar(35) NOT NULL,
  `PER_APELLIDOS` varchar(35) NOT NULL,
  `PER_USUARIO` char(20) NOT NULL,
  `PER_CLAVE` char(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PER_ROL` int(1) NOT NULL,
  `PER_TELEFONO` char(10) DEFAULT NULL,
  `PER_CORREO` varchar(70) DEFAULT NULL,
  `PER_FECHA_NACIMIENTO` date DEFAULT NULL,
  `CUR_CODIGO` int(11) NOT NULL,
  `EST_ACTIVO` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estudiante`
--

INSERT INTO `estudiante` (`EST_CODIGO`, `PER_CEDULA`, `PER_NOMBRES`, `PER_APELLIDOS`, `PER_USUARIO`, `PER_CLAVE`, `PER_ROL`, `PER_TELEFONO`, `PER_CORREO`, `PER_FECHA_NACIMIENTO`, `CUR_CODIGO`, `EST_ACTIVO`) VALUES
(3, '175089399-', 'Yoselin', 'Andrango', 'yaandrango', '$2y$10$5xmB.5r2Z7iwvxThgQJKpOeiUnjPjuewZXMLBNRHplBVuAgM7.3pO', 2, '0999999999', 'yoselin@gmail.com', '2005-02-11', 5, 0),
(4, '171010101-', 'Juan', 'Loor', 'jujuujujujujuju', '$2y$10$xNqimX7QTIbPDbqxeeGvLu6QUUDXeEytLKwIkt57NgYLt6UNRAzPO', 2, '0888888888', 'jloor7777.1@hotmail.com', '1998-02-28', 1, 0),
(5, '174040405-', 'nose ', 'asasas', 'usuario123', '$2y$10$KEHBepK0zaRWXC7QDKP3.On55OKguZr.qLq6FXWSQzhz.kA2AN8C.', 2, '0999999555', 'nose123@gmail.com', '2004-07-10', 1, 0),
(6, '175089589-', 'fdfdsf', 'fdfddd', 'qqqqq', '$2y$10$SywiyHIuPZIrDrXSetcuYuFCudEXSHwJi/oIp.hXAXchV5h4UFzrm', 2, '0478474747', 'qqqqqq@hotmail.com', '2021-09-25', 1, 1),
(7, '175089396-', 'Juan', 'Delta', 'jdelta', '123456', 2, '0954781000', 'texto@hotmail.com', '2021-01-20', 1, 1),
(8, '172322222-7', 'Micaela', 'Amagua', 'mica', '$2y$10$e5OGwXuLdFu0EAL6l3/sjODjqPLi9hTT2WuoLErma.SyU1q7R/PbK', 2, '9876500000', 'erik@hotmail.com', '2020-09-12', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `horario`
--

CREATE TABLE `horario` (
  `HOR_CODIGO` int(11) NOT NULL,
  `DOC_CODIGO` int(11) NOT NULL,
  `CUR_CODIGO` int(11) NOT NULL,
  `HOR_HORA` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `HOR_DIA` varchar(10) NOT NULL,
  `HOR_ESTADO` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `horario`
--

INSERT INTO `horario` (`HOR_CODIGO`, `DOC_CODIGO`, `CUR_CODIGO`, `HOR_HORA`, `HOR_DIA`, `HOR_ESTADO`) VALUES
(1, 26, 5, '07:15', 'Lunes', 1),
(2, 8, 5, '07:15', 'Martes', 1),
(3, 26, 5, '07:15', 'Miercoles', 1),
(4, 8, 5, '07:15', 'Jueves', 1),
(5, 12, 5, '07:15', 'Viernes', 1),
(6, 8, 5, '08:00', 'Lunes', 1),
(7, 11, 5, '08:00', 'Martes', 1),
(8, 11, 5, '08:00', 'Miercoles', 1),
(9, 8, 5, '08:00', 'Jueves', 1),
(10, 12, 5, '08:00', 'Viernes', 1),
(11, 27, 5, '08:45', 'Lunes', 1),
(12, 11, 5, '08:45', 'Martes', 1),
(13, 27, 5, '08:45', 'Miercoles', 1),
(14, 22, 5, '08:45', 'Jueves', 1),
(15, 25, 5, '08:45', 'Viernes', 1),
(16, 11, 5, '09:30', 'Lunes', 1),
(17, 27, 5, '09:30', 'Martes', 1),
(18, 25, 5, '09:30', 'Miercoles', 1),
(19, 11, 5, '09:30', 'Jueves', 1),
(20, 25, 5, '09:30', 'Viernes', 1),
(21, 12, 5, '10:45', 'Lunes', 1),
(22, 12, 5, '10:45', 'Martes', 1),
(23, 25, 5, '10:45', 'Miercoles', 1),
(24, 12, 5, '10:45', 'Jueves', 1),
(25, 23, 5, '10:45', 'Viernes', 1),
(26, 12, 5, '11:30', 'Lunes', 1),
(27, 25, 5, '11:30', 'Martes', 1),
(28, 22, 5, '11:30', 'Miercoles', 1),
(29, 27, 5, '11:30', 'Jueves', 1),
(30, 8, 5, '11:30', 'Viernes', 1),
(31, 23, 5, '12:15', 'Lunes', 1),
(32, 26, 5, '12:15', 'Martes', 1),
(33, 23, 5, '12:15', 'Miercoles', 1),
(34, 23, 5, '12:15', 'Jueves', 1),
(35, 11, 5, '12:15', 'Viernes', 1),
(36, 12, 6, '07:15', 'Lunes', 0),
(37, 26, 6, '07:15', 'Martes', 0),
(38, 11, 6, '07:15', 'Miercoles', 0),
(39, 11, 6, '07:15', 'Jueves', 0),
(40, 25, 6, '07:15', 'Viernes', 0),
(41, 12, 6, '08:00', 'Lunes', 0),
(42, 27, 6, '08:00', 'Martes', 0),
(43, 26, 6, '08:00', 'Miercoles', 0),
(44, 11, 6, '08:00', 'Jueves', 0),
(45, 25, 6, '08:00', 'Viernes', 0),
(46, 25, 6, '08:45', 'Lunes', 0),
(47, 12, 6, '08:45', 'Martes', 0),
(48, 8, 6, '08:45', 'Miercoles', 0),
(49, 27, 6, '08:45', 'Jueves', 0),
(50, 26, 6, '08:45', 'Viernes', 0),
(51, 25, 6, '09:30', 'Lunes', 0),
(52, 12, 6, '09:30', 'Martes', 0),
(53, 8, 6, '09:30', 'Miercoles', 0),
(54, 27, 6, '09:30', 'Jueves', 0),
(55, 27, 6, '09:30', 'Viernes', 0),
(56, 8, 6, '10:45', 'Lunes', 0),
(57, 11, 6, '10:45', 'Martes', 0),
(58, 22, 6, '10:45', 'Miercoles', 0),
(59, 25, 6, '10:45', 'Jueves', 0),
(60, 8, 6, '10:45', 'Viernes', 0),
(61, 23, 6, '11:30', 'Lunes', 0),
(62, 11, 6, '11:30', 'Martes', 0),
(63, 23, 6, '11:30', 'Miercoles', 0),
(64, 12, 6, '11:30', 'Jueves', 0),
(65, 11, 6, '11:30', 'Viernes', 0),
(66, 22, 6, '12:15', 'Lunes', 0),
(67, 23, 6, '12:15', 'Martes', 0),
(68, 12, 6, '12:15', 'Miercoles', 0),
(69, 8, 6, '12:15', 'Jueves', 0),
(70, 23, 6, '12:15', 'Viernes', 0),
(71, 12, 6, '07:15', 'Lunes', 0),
(72, 26, 6, '07:15', 'Martes', 0),
(73, 11, 6, '07:15', 'Miercoles', 0),
(74, 11, 6, '07:15', 'Jueves', 0),
(75, 25, 6, '07:15', 'Viernes', 0),
(76, 12, 6, '08:00', 'Lunes', 0),
(77, 27, 6, '08:00', 'Martes', 0),
(78, 26, 6, '08:00', 'Miercoles', 0),
(79, 25, 6, '08:00', 'Jueves', 0),
(80, 25, 6, '08:00', 'Viernes', 0),
(81, 25, 6, '08:45', 'Lunes', 0),
(82, 12, 6, '08:45', 'Martes', 0),
(83, 8, 6, '08:45', 'Miercoles', 0),
(84, 27, 6, '08:45', 'Jueves', 0),
(85, 26, 6, '08:45', 'Viernes', 0),
(86, 25, 6, '09:30', 'Lunes', 0),
(87, 12, 6, '09:30', 'Martes', 0),
(88, 8, 6, '09:30', 'Miercoles', 0),
(89, 27, 6, '09:30', 'Jueves', 0),
(90, 27, 6, '09:30', 'Viernes', 0),
(91, 8, 6, '10:45', 'Lunes', 0),
(92, 11, 6, '10:45', 'Martes', 0),
(93, 22, 6, '10:45', 'Miercoles', 0),
(94, 8, 6, '10:45', 'Jueves', 0),
(95, 8, 6, '10:45', 'Viernes', 0),
(96, 23, 6, '11:30', 'Lunes', 0),
(97, 11, 6, '11:30', 'Martes', 0),
(98, 23, 6, '11:30', 'Miercoles', 0),
(99, 12, 6, '11:30', 'Jueves', 0),
(100, 11, 6, '11:30', 'Viernes', 0),
(101, 22, 6, '12:15', 'Lunes', 0),
(102, 23, 6, '12:15', 'Martes', 0),
(103, 12, 6, '12:15', 'Miercoles', 0),
(104, 11, 6, '12:15', 'Jueves', 0),
(105, 23, 6, '12:15', 'Viernes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE `materia` (
  `MAT_CODIGO` int(11) NOT NULL,
  `ARE_CODIGO` int(11) NOT NULL,
  `MAT_NOMBRE` char(25) NOT NULL,
  `MAT_NIVEL` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materia`
--

INSERT INTO `materia` (`MAT_CODIGO`, `ARE_CODIGO`, `MAT_NOMBRE`, `MAT_NIVEL`) VALUES
(1, 1, 'Matematica', 'B'),
(2, 1, 'Fisica', 'B'),
(3, 4, 'Educacion fisica', 'EB'),
(4, 2, 'Ingles', 'B'),
(5, 3, 'Lengua y literatura', 'B'),
(6, 3, 'Lenguaje', 'EB'),
(7, 1, 'Matematica', 'EB'),
(8, 1, 'Quimica', 'B'),
(9, 5, 'Biologia', 'B'),
(10, 7, 'Historia', 'B'),
(11, 7, 'Ciudadania', 'B'),
(12, 7, 'Filosofia', 'B'),
(13, 4, 'Educacion artistica', 'B'),
(14, 4, 'Educacion fisica', 'B'),
(15, 8, 'Emprendimiento', 'B'),
(16, 6, 'Informatica', 'B'),
(17, 4, 'Educacion artistica', 'EB'),
(18, 5, 'Ciencias naturales', 'EB'),
(19, 7, 'Estudios sociales', 'EB'),
(20, 2, 'Ingles', 'EB'),
(21, 8, 'Proyectos', 'EB');

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `PER_CEDULA` char(11) NOT NULL,
  `PER_NOMBRES` varchar(35) NOT NULL,
  `PER_APELLIDOS` varchar(35) NOT NULL,
  `PER_USUARIO` char(20) NOT NULL,
  `PER_CLAVE` char(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PER_ROL` int(11) NOT NULL,
  `PER_TELEFONO` char(10) DEFAULT NULL,
  `PER_CORREO` varchar(70) DEFAULT NULL,
  `PER_FECHA_NACIMIENTO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`PER_CEDULA`, `PER_NOMBRES`, `PER_APELLIDOS`, `PER_USUARIO`, `PER_CLAVE`, `PER_ROL`, `PER_TELEFONO`, `PER_CORREO`, `PER_FECHA_NACIMIENTO`) VALUES
('', 'Yoselin', 'Guachamin', 'yoselin', '$2y$10$ATFiMnQ3CxiSVCL88D5tiuxxWlebnfI.9lpt0XEYwTI8EOFPjDn6q', 1, '0987547845', 'yos@hotmail.com', '2021-09-01'),
('131101879-5', 'Marina', 'Tortorelli', 'marina', '$2y$10$yM4deHq8PYJqSUoHiXvbreY4ivNn44FxiFyTB1Lm35TpQzxXcuKrW', 4, '0982651452', 'marina@hotmail.com', '2021-09-03'),
('131145285-1', 'Daniel', 'Chonillo', 'daniel', '$2y$10$aTSqEYOvtTs7G.OSMquKS.BMPSLyQQWgIvhflf9lSAgn.kGsCZRo.', 4, '0985623658', 'daniel@hotmail.com', '2021-09-07'),
('131145285-2', 'Cesar', 'Galarraga Cevallos', 'cesar', '$2y$10$NUCq/w.NwB6ANtfOk4Ib6.zhPUcVtaOUiqJekl7jXIdI21LlPUafi', 4, '0982602156', 'cgcevallos@hotmail.com', '2021-09-07'),
('131145285-7', 'Nataly', 'Morales', 'nathy', '$2y$10$vLBYXsWGe9kZ3Gr4iTwvje..RoCjf5u9y/omTd6.E5aRFVJpBVS82', 4, '0982602156', 'nmorales@hotmail.com', '0000-00-00'),
('131145285-8', 'Jessica Karina', 'Cadena Velez', 'kcadena', '$2y$10$Oox9SoZh85jkIFyUUg/Od.Y60ukYmv7uicWcVATJuKwK.CSvnjDNq', 4, '0982651452', 'kcadena29@gmail.com', '2021-09-07'),
('131145285-9', 'Maria Belen', 'Vera Cadena', 'mbelen', '$2y$10$b9VwnZ.iXDdNvka/Pk.o6.VH58iDefjW5NsuLMgE/T5kEvxM8rvJm', 4, '0982602156', 'mbelen_vera@hotmail.com', '2021-08-31'),
('1311544648', 'Elkin', 'Vera Cadena', 'elkin044', '$2y$10$kzxzwtjxc0P4KYcovuJVhOcueUYS5th5Sz0R7dsquETwP3VXDmdeq', 3, NULL, NULL, NULL),
('131154465-1', 'Milenka Andreina', 'Vera Cadena', 'mandreina', '$2y$10$V7ZkIyMOd370mHvCO8xg0uO49z1yg2OirQOD1JWJweSWFsVp129iy', 4, '0982655874', 'mandreina@hotmail.com', '2021-09-07'),
('131154465-2', 'Elkin David', 'Vera Cadena', 'edvera1', '$2y$10$BV9Vz/m8.o5rnD3xFaQWou2gmVHbfb.4g7DDf.DB41FiHur2YzvQi', 4, '0982657346', 'edvera1@espe.edu.ec', '2021-09-01'),
('131154856-9', 'Elias', 'Chonillo', 'echonillo', '$2y$10$j7BQcxwy8c9BG3RLBo5R9.NLvow8QG.8T9ASMbeFYmdp9LbRQywjK', 4, '0985623658', 'echonillo@hotmail.com', '2021-09-07'),
('131154879-0', 'Adrian Renato', 'Lopez Ayon', 'ralo', '$2y$10$snWhV83egnEFOE.3aNofFe/lky2qxHyN2/eMHHYP6L4f8e0XH75Bu', 4, '0980000001', 'renato_lopez@hotmail.com', '2021-09-07'),
('131154879-5', 'Gabriel', 'Tipan', 'gtipan', '$2y$10$JZ3qzVti6sejnqdA7AZT5uf1I.4WS.x8QbkgK3O2lK98l9E/pYCnS', 4, '0982655874', 'gabriel@hotmail.com', '2021-09-06'),
('131154879-6', 'Carolina', 'Sanchez', 'carol', '$2y$10$8VgRU5j9Rx6IGX42AvtM6u17uVGrdXgfDIkkn6nQEY9FE3axcLshO', 4, '0982602156', 'carol@hotmail.com', '2021-08-31'),
('131158579-5', 'Diego', 'Mendoza Mendoza', 'diego', '$2y$10$U.Zk3/s2IEPRN0FhE5EdLOrAnqBeXasPiYKEvvyVsOeBqCKfj5XH6', 4, '', '', '2021-09-03'),
('131354879-5', 'Maycol', 'Tituana Tupiza', 'maycol', '$2y$10$odqHHBD71nmsR2xx6q79rON6YYuM3mlVqqN9KlMhpaHVoIwAIAGbC', 4, '0985623658', 'mtituana@hotmail.com', '2021-09-08'),
('131414465-2', 'Paula', 'Paredes Torres', 'paula', '$2y$10$sR.j639/TVjsEo.8oM7IGuqhPgQCcgjy1IECVvJ3lRAlbiqzlrMUq', 4, '0982655874', 'paula@hotmail.com', '2021-09-14'),
('131784465-2', 'Nahomi', 'Guzman', 'naho', '$2y$10$9BhP.TuBHj99tfPb3QXA7OsTYKrT/T4EUzJyQh5AnatJUC2dNOIr.', 4, '0982651452', 'nahomi@hotmail.com', '2021-09-08'),
('137454879-5', 'Pilar', 'Intriago Bergmann', 'pili', '$2y$10$0DSzPRuk1xyvn9zbL0.40epAielBx3Q4062NSJye67OYbEQDLCi86', 4, '0982655874', 'pilar@hotmail.com', '2021-09-09'),
('137845285-2', 'David', 'Cruz Gonzalez', 'david', '$2y$10$3qSvjkffGGQd6diFOVtaUOh.FJ7l5tDgH0kKf2LXJY.nqKXxM3ifC', 4, '0982651452', 'david@hotmail.com', '2021-08-31'),
('137854879-5', 'Alessa', 'Delgado', 'alessa', '$2y$10$A.1WijAoMUNLYMCUNTubkuUrGKBCxhvWaGzcyAH.As5VdytNsSef2', 4, '0982655874', 'alessa@hotmail.com', '2021-09-06'),
('171010101-', 'Juan', 'Loor', 'jloor', '$2y$10$xNqimX7QTIbPDbqxeeGvLu6QUUDXeEytLKwIkt57NgYLt6UNRAzPO', 2, '0959708449', 'jloor@hotmail.com', '1998-02-28'),
('171020405-', 'docente', 'ddedede', 'docente', '$2y$10$B3dQvjpnE7neKJYDRftXheXKu62rTU.oXq505JOxpWf2kTuwdXz.a', 4, '0945784545', 'doce@gmail.com', '2021-04-29'),
('171052145', 'Kleber', 'Aguilar', 'kaguilar', '$2y$10$ATFiMnQ3CxiSVCL88D5tiuxxWlebnfI.9lpt0XEYwTI8EOFPjDn6q', 3, '0954874547', 'kaguilar@hotmail.com', '1983-07-08'),
('172322222-7', 'Micaela', 'Amagua', 'mica', '$2y$10$e5OGwXuLdFu0EAL6l3/sjODjqPLi9hTT2WuoLErma.SyU1q7R/PbK', 2, '9876500000', 'erik@hotmail.com', '2020-09-12'),
('174040405-', 'nose ', 'asasas', 'dsadsds', '$2y$10$KEHBepK0zaRWXC7QDKP3.On55OKguZr.qLq6FXWSQzhz.kA2AN8C.', 2, '0999999555', 'sdsadsadsd@gmail.com', '2004-07-10'),
('17485959-9', 'Steven', 'Chinlle', 'schinlle', '$2y$10$ATFiMnQ3CxiSVCL88D5tiuxxWlebnfI.9lpt0XEYwTI8EOFPjDn6q', 3, '0954878448', 'steven@gmail.com', '1991-06-13'),
('175010101-', 'lauro', 'Martinez', 'lmartinez', '$2y$10$ZFi/xEtczzuqTtXBWk3HMevLgUDUSy/Fwr/ZZRofjkJN9GCtWyjZq', 4, '0447845784', 'lmartinez@gmail.com', '2021-09-03'),
('175081149-', 'Marcelo', 'Pobeda', 'mpobeda', '$2y$10$ATFiMnQ3CxiSVCL88D5tiuxxWlebnfI.9lpt0XEYwTI8EOFPjDn6q', 4, '0945142144', 'mpobeda@gmail.com', '2021-09-23'),
('1750893533', 'admin', 'admin', 'admin', '$2y$10$5xmB.5r2Z7iwvxThgQJKpOeiUnjPjuewZXMLBNRHplBVuAgM7.3pO', 1, NULL, NULL, NULL),
('175089396-', 'Juan', 'Delta', 'jdelta', '$2y$10$nk/nccs6D9RZFb8pmhOiretvNXws0JloYW1tlqTCza4jP1z1QwfsS', 2, '0954781000', 'juan@hotmail.com', '2021-01-20'),
('175089399-', 'Yoselin', 'Andrango', 'yaandrango', '$2y$10$5xmB.5r2Z7iwvxThgQJKpOeiUnjPjuewZXMLBNRHplBVuAgM7.3pO', 2, '0959708444', 'yoselin@gmail.com', '2005-02-11'),
('175089589-', 'fdfdsf', 'fdfddd', 'qqqqq', '$2y$10$SywiyHIuPZIrDrXSetcuYuFCudEXSHwJi/oIp.hXAXchV5h4UFzrm', 2, '0478474747', 'qqqqqq@hotmail.com', '2021-09-25'),
('221154465-2', 'Riztho', 'Rodriguez', 'riztho', '$2y$10$556EjkoCqwmKbvdqskNjaego9hP4a0TZBGRqVo3VMpbFuaUK0TLUW', 4, '0982655874', 'riztho@hotmail.com', '2021-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(2) NOT NULL,
  `rol` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Estudiante'),
(3, 'Supervisor'),
(4, 'Docente');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `SUP_CODIGO` int(11) NOT NULL,
  `PER_CEDULA` char(11) NOT NULL,
  `PER_NOMBRES` varchar(35) NOT NULL,
  `PER_APELLIDOS` varchar(35) NOT NULL,
  `PER_USUARIO` char(20) NOT NULL,
  `PER_CLAVE` char(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PER_ROL` int(1) NOT NULL,
  `PER_TELEFONO` char(10) DEFAULT NULL,
  `PER_CORREO` varchar(70) DEFAULT NULL,
  `PER_FECHA_NACIMIENTO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`SUP_CODIGO`, `PER_CEDULA`, `PER_NOMBRES`, `PER_APELLIDOS`, `PER_USUARIO`, `PER_CLAVE`, `PER_ROL`, `PER_TELEFONO`, `PER_CORREO`, `PER_FECHA_NACIMIENTO`) VALUES
(1, '1311544648', 'Elkin', 'Vera Cadena', 'elkin044', '$2y$10$kzxzwtjxc0P4KYcovuJVhOcueUYS5th5Sz0R7dsquETwP3VXDmdeq', 3, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ADM_CODIGO`),
  ADD KEY `FK_ADMINIST_SE_DIVIDE_PERSONA` (`PER_CEDULA`),
  ADD KEY `PER_ROL` (`PER_ROL`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`ARE_CODIGO`);

--
-- Indexes for table `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`AUD_CODIGO`),
  ADD KEY `FK_AUDITORI_REALIZA_PERSONA` (`PER_CEDULA`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`CUR_CODIGO`);

--
-- Indexes for table `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`DOC_CODIGO`),
  ADD KEY `PER_ROL` (`PER_ROL`),
  ADD KEY `MAT_CODIGO` (`MAT_CODIGO`);

--
-- Indexes for table `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`EST_CODIGO`),
  ADD KEY `PER_ROL` (`PER_ROL`),
  ADD KEY `CUR_CODIGO` (`CUR_CODIGO`);

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`HOR_CODIGO`),
  ADD KEY `FK_HORARIO_TIENE_CURSO` (`CUR_CODIGO`),
  ADD KEY `FK_HORARIO_TIENE2_DOCENTE` (`DOC_CODIGO`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`MAT_CODIGO`),
  ADD KEY `FK_MATERIA_PERTENECE_AREA` (`ARE_CODIGO`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`PER_CEDULA`),
  ADD KEY `PER_ROL` (`PER_ROL`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`SUP_CODIGO`),
  ADD KEY `PER_ROL` (`PER_ROL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `ADM_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `ARE_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `AUD_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `CUR_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `docente`
--
ALTER TABLE `docente`
  MODIFY `DOC_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `EST_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `HOR_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `MAT_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `SUP_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`PER_ROL`) REFERENCES `persona` (`PER_ROL`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `FK_AUDITORI_REALIZA_PERSONA` FOREIGN KEY (`PER_CEDULA`) REFERENCES `persona` (`PER_CEDULA`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`PER_ROL`) REFERENCES `persona` (`PER_ROL`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `docente_ibfk_2` FOREIGN KEY (`MAT_CODIGO`) REFERENCES `materia` (`MAT_CODIGO`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`PER_ROL`) REFERENCES `persona` (`PER_ROL`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`CUR_CODIGO`) REFERENCES `curso` (`CUR_CODIGO`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `FK_HORARIO_TIENE2_DOCENTE` FOREIGN KEY (`DOC_CODIGO`) REFERENCES `docente` (`DOC_CODIGO`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_HORARIO_TIENE_CURSO` FOREIGN KEY (`CUR_CODIGO`) REFERENCES `curso` (`CUR_CODIGO`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `FK_MATERIA_PERTENECE_AREA` FOREIGN KEY (`ARE_CODIGO`) REFERENCES `area` (`ARE_CODIGO`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`PER_ROL`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `supervisor_ibfk_1` FOREIGN KEY (`PER_ROL`) REFERENCES `persona` (`PER_ROL`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
