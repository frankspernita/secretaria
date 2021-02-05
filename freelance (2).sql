-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2020 a las 20:35:41
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `freelance`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areaasignatura`
--

CREATE TABLE `areaasignatura` (
  `idAreaAsignatura` int(11) NOT NULL,
  `idArea` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `Estado` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `idArea` int(11) NOT NULL,
  `idDepartamento` int(11) DEFAULT NULL,
  `Area` varchar(50) NOT NULL,
  `Estado` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`idArea`, `idDepartamento`, `Area`, `Estado`) VALUES
(2, 2, 'Matematicas 1', 'A'),
(3, 2, 'Matematicas 3', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `idAsignatura` int(11) NOT NULL,
  `idArea` bigint(20) NOT NULL,
  `idDepartamento` int(10) DEFAULT NULL,
  `Asignatura` varchar(50) NOT NULL,
  `Modulo` int(5) NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`idAsignatura`, `idArea`, `idDepartamento`, `Asignatura`, `Modulo`, `Estado`) VALUES
(4, 2, NULL, 'Calculo 1', 2, 'A'),
(5, 3, 2, 'Calculo 1', 2, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturasdocentes`
--

CREATE TABLE `asignaturasdocentes` (
  `idAsignaturaDocente` int(11) NOT NULL,
  `idDocente` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `idDepartamento` int(10) NOT NULL,
  `idResolucion` int(10) NOT NULL,
  `Estado` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `asignaturasdocentes`
--

INSERT INTO `asignaturasdocentes` (`idAsignaturaDocente`, `idDocente`, `idAsignatura`, `idDepartamento`, `idResolucion`, `Estado`) VALUES
(1, 0, 5, 2, 9, 'Activo'),
(2, 29, 5, 2, 9, 'Activo'),
(3, 29, 5, 2, 9, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargoayudantes`
--

CREATE TABLE `cargoayudantes` (
  `idCargoAyudante` int(11) NOT NULL,
  `idDatosP` bigint(20) NOT NULL,
  `idDepartamento` int(10) DEFAULT NULL,
  `Legajo` varchar(20) NOT NULL,
  `Carrera` varchar(50) NOT NULL,
  `idAsignatura` bigint(20) NOT NULL,
  `idResolucion` bigint(20) NOT NULL,
  `Expediente` varchar(20) NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargoayudantes`
--

INSERT INTO `cargoayudantes` (`idCargoAyudante`, `idDatosP`, `idDepartamento`, `Legajo`, `Carrera`, `idAsignatura`, `idResolucion`, `Expediente`, `Estado`) VALUES
(3, 12, NULL, '546456-', 'Ing Electronica', 5, 9, 'dasgsg', ''),
(4, 12, 2, '546456-', 'Ing Electronica', 5, 9, 'dasgsg', 'Activo'),
(5, 12, 2, '546456-', 'Ing Electronica', 5, 9, 'dasgsg', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargodocentes`
--

CREATE TABLE `cargodocentes` (
  `idDocente` int(11) NOT NULL,
  `Categoria` varchar(100) NOT NULL,
  `idDatosP` bigint(20) NOT NULL,
  `idDepartamento` int(10) DEFAULT NULL,
  `Dedicacion` varchar(20) NOT NULL,
  `Condicion` varchar(20) NOT NULL,
  `Puntaje` float NOT NULL,
  `Designacion` varchar(100) DEFAULT NULL,
  `Observacion` varchar(150) DEFAULT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargodocentes`
--

INSERT INTO `cargodocentes` (`idDocente`, `Categoria`, `idDatosP`, `idDepartamento`, `Dedicacion`, `Condicion`, `Puntaje`, `Designacion`, `Observacion`, `Estado`) VALUES
(5, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Interina', '', ''),
(6, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Interina', '', ''),
(7, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Interina', '', ''),
(8, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Prórroga de designación interina', '', ''),
(9, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Prórroga de designación interina', '', ''),
(10, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Prórroga de designación interina', '', ''),
(11, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Prórroga de designación interina', '', ''),
(12, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Regular por Concurso', 'hola', ''),
(13, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Regular por Concurso', 'hola', ''),
(14, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Regular por Concurso', 'hola', ''),
(15, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Regular por Concurso', 'hola', ''),
(16, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Prórroga de designación interina', 'hola', ''),
(17, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Prórroga de designación interina', 'hola', ''),
(18, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Prórroga de designación interina', 'hola', ''),
(19, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Prórroga de designación interina', 'hola', ''),
(20, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Regular por Concurso', 'hola', ''),
(21, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Regular por Concurso', 'hola', ''),
(22, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Regular por Concurso', 'hola', ''),
(23, 'Asociado', 10, NULL, 'Semidedicación', 'Interino', 9, 'Regular por Concurso', 'hola', ''),
(24, 'Asociado', 10, NULL, 'Exclusiva', 'Interino', 9, 'Regular por Concurso', 'hola', ''),
(25, 'Asociado', 10, NULL, 'Exclusiva', 'Interino', 9, 'Regular por Concurso', 'hola', ''),
(26, 'Asociado', 10, NULL, 'Exclusiva', 'Interino', 9, 'Regular por Concurso', 'hola', ''),
(27, 'Asociado', 10, NULL, 'Exclusiva', 'Interino', 9, 'Regular por Concurso', 'hola', ''),
(28, 'Asociado', 10, NULL, 'Exclusiva', 'Interino', 9, 'Prórroga de designación interina', 'hola', ''),
(29, 'Asociado', 10, 2, 'Exclusiva', 'Interino', 95, 'Prórroga de designación interina', 'hola', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospersonalestitulo`
--

CREATE TABLE `datospersonalestitulo` (
  `idDatosPTitulos` int(11) NOT NULL,
  `idDatosP` int(11) NOT NULL,
  `idTitulo` int(11) NOT NULL,
  `Estado` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE `datos_personales` (
  `idDatosP` int(11) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `FechaNac` date NOT NULL,
  `DNI` bigint(11) NOT NULL,
  `Cuil` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `TelFijo` varchar(100) DEFAULT NULL,
  `Celular` varchar(100) DEFAULT NULL,
  `Tipo` varchar(10) DEFAULT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`idDatosP`, `Apellido`, `Nombre`, `FechaNac`, `DNI`, `Cuil`, `Email`, `TelFijo`, `Celular`, `Tipo`, `Estado`) VALUES
(10, 'Cabezas', 'Franks', '2020-12-04', 35053399, '2031513-', 'ojeador6@gmail.com', '3543453', '453453', 'D', 'A'),
(11, 'Cabezas', 'Franks', '2020-12-01', 35053399, '2031513-', 'ojeador6@gmail.com', '3543453', '325235235', 'N', 'A'),
(12, 'Cabezas', 'Franks', '2020-12-04', 35053399, '2031513-', 'ojeador6@gmail.com', '3543453', '325235235', 'A', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `idDepartamento` int(10) NOT NULL,
  `idDatosP` int(10) DEFAULT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`idDepartamento`, `idDatosP`, `Nombre`, `Estado`) VALUES
(2, 10, 'Matematicas', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentosnodocentes`
--

CREATE TABLE `departamentosnodocentes` (
  `idDepartamentoNoDocente` int(11) NOT NULL,
  `idDepartamento` int(11) NOT NULL,
  `idNoDocente` int(11) NOT NULL,
  `Estado` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

CREATE TABLE `domicilios` (
  `idDomicilio` int(11) NOT NULL,
  `idDatosP` bigint(11) NOT NULL,
  `Calle` varchar(100) NOT NULL,
  `Numero` varchar(100) DEFAULT NULL,
  `Dpto` varchar(100) DEFAULT NULL,
  `Piso` varchar(100) DEFAULT NULL,
  `Npuerta` int(11) DEFAULT NULL,
  `Localidad` varchar(100) NOT NULL,
  `Cpostal` int(10) NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `domicilios`
--

INSERT INTO `domicilios` (`idDomicilio`, `idDatosP`, `Calle`, `Numero`, `Dpto`, `Piso`, `Npuerta`, `Localidad`, `Cpostal`, `Estado`) VALUES
(16, 10, 'Matienzo', '1647', '', '', NULL, 'San Miguel de Tucuman', 4000, 'A'),
(17, 11, 'Matienzo', '1647', '1010', '', NULL, 'San Miguel de Tucuman', 4000, 'A'),
(18, 12, 'Matienzo', '1647', 'Yerba Buena', '', NULL, 'San Miguel de Tucuman', 4000, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias`
--

CREATE TABLE `licencias` (
  `idLicencia` int(11) NOT NULL,
  `idDocente` bigint(20) NOT NULL,
  `Actuacion` varchar(20) NOT NULL,
  `Desde` date NOT NULL,
  `Hasta` date NOT NULL,
  `ConSueldo` char(10) NOT NULL,
  `Detalle` varchar(150) NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1546785942),
('m010101_100001_init_notifications', 1566956044),
('m130524_201442_init', 1546785946);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nodocentes`
--

CREATE TABLE `nodocentes` (
  `idNoDocente` int(11) NOT NULL,
  `idDatosP` bigint(20) NOT NULL,
  `idDepartamento` int(10) DEFAULT NULL,
  `Categoria` varchar(40) NOT NULL,
  `Ocupacion` varchar(100) NOT NULL,
  `Observacion` varchar(150) NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nodocentes`
--

INSERT INTO `nodocentes` (`idNoDocente`, `idDatosP`, `idDepartamento`, `Categoria`, `Ocupacion`, `Observacion`, `Estado`) VALUES
(2, 11, NULL, 'Alla', 'ACa', 'ella', ''),
(3, 11, 2, 'Alla10', 'ACa', 'ella10', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resoluciones`
--

CREATE TABLE `resoluciones` (
  `idResolucion` int(11) NOT NULL,
  `idDepartamento` int(10) DEFAULT NULL,
  `Resolucion` varchar(50) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `resoluciones`
--

INSERT INTO `resoluciones` (`idResolucion`, `idDepartamento`, `Resolucion`, `FechaInicio`, `FechaVencimiento`, `Estado`) VALUES
(7, NULL, '5646-645645', '0000-00-00', '0000-00-00', ''),
(8, NULL, '5646-645645', '0000-00-00', '0000-00-00', ''),
(9, 2, '5646-64564510', '2020-12-04', '2020-12-04', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretaria`
--

CREATE TABLE `secretaria` (
  `idSecretaria` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `Apellido` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FechaNac` date NOT NULL,
  `DNI` bigint(11) NOT NULL,
  `Cuil` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TelFijo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Celular` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Estado` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `secretaria`
--

INSERT INTO `secretaria` (`idSecretaria`, `idUser`, `Apellido`, `Nombre`, `FechaNac`, `DNI`, `Cuil`, `Email`, `TelFijo`, `Celular`, `Estado`) VALUES
(1, 2, 'pernita', 'Franks', '2020-12-02', 35053399, '350500', 'ojeador6@gmail.com', '64646', '6546546', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotitulos`
--

CREATE TABLE `tipotitulos` (
  `idTipoTitulo` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipotitulos`
--

INSERT INTO `tipotitulos` (`idTipoTitulo`, `Descripcion`, `Estado`) VALUES
(5, 'Postgrado', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulos`
--

CREATE TABLE `titulos` (
  `idTitulo` int(11) NOT NULL,
  `idDatosP` int(10) NOT NULL,
  `idTipoTitulo` bigint(20) NOT NULL,
  `Legajo` bigint(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Fecha` date NOT NULL,
  `Codigo` varchar(50) NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `titulos`
--

INSERT INTO `titulos` (`idTitulo`, `idDatosP`, `idTipoTitulo`, `Legajo`, `Nombre`, `Fecha`, `Codigo`, `Estado`) VALUES
(2, 0, 5, 453453453, 'Postrado matematica', '0000-00-00', '454646', ''),
(3, 0, 5, 453453453, 'Postrado matematica', '0000-00-00', '454646', ''),
(4, 0, 5, 453453453, 'Postrado matematica', '0000-00-00', '454646', ''),
(5, 10, 5, 453453453, 'Postrado matematica 1', '2020-12-04', '454646', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Rol` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idDepartamento` int(10) DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `Rol`, `idDepartamento`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'franks', 'Administrador', NULL, 'zLms1PZfCtgjcHJ2GcVOri6si7910uMs', '$2y$13$XGMFNOwI2SzOVEWZ.rSCn.2NFxnnHghWvUzqlQmMpEtgUm2765DIC', NULL, 'ojeador6@gmail.com', 10, 1546786023, 1546786023),
(2, 'administrador', 'Administrador', NULL, 'IGFkg-Gli5k0B6OKmbpj5kPowgkborri', '$2y$13$y/0JCfUexgKIjImveNiuG.QY8nkEkSbhaXLA0zk7Lt2bM41Lp34iq', NULL, 'mwaccesorios.73@gmail.com', 10, 1606279097, 1606279097),
(6, 'administrador10', 'Administrador', NULL, 'zdgggKb76J-tWY-00fZpVoDLvUr5EHjv', '$2y$13$tkqq7XndR5JCy2LwiYnURej45R3BKeo1ysvVmwX76DaQ6Qdljrycm', NULL, 'admin@gmail.com', 10, 1606873660, 1606873660),
(7, 'Esteban', 'Secretaria/o', 2, '01x6562xXnbZPhzZ69AuQB0SiIx8BMFO', '$2y$13$70l/ZCgLyAY45AKuhH0v4uxgyW7pFWiDtCkVPtEQWrIS3r2kZGQUS', NULL, 'esteban@gmail.com', 10, 1607048414, 1607048414);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areaasignatura`
--
ALTER TABLE `areaasignatura`
  ADD PRIMARY KEY (`idAreaAsignatura`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`idArea`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`idAsignatura`);

--
-- Indices de la tabla `asignaturasdocentes`
--
ALTER TABLE `asignaturasdocentes`
  ADD PRIMARY KEY (`idAsignaturaDocente`);

--
-- Indices de la tabla `cargoayudantes`
--
ALTER TABLE `cargoayudantes`
  ADD PRIMARY KEY (`idCargoAyudante`);

--
-- Indices de la tabla `cargodocentes`
--
ALTER TABLE `cargodocentes`
  ADD PRIMARY KEY (`idDocente`);

--
-- Indices de la tabla `datospersonalestitulo`
--
ALTER TABLE `datospersonalestitulo`
  ADD PRIMARY KEY (`idDatosPTitulos`);

--
-- Indices de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD PRIMARY KEY (`idDatosP`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `departamentosnodocentes`
--
ALTER TABLE `departamentosnodocentes`
  ADD PRIMARY KEY (`idDepartamentoNoDocente`);

--
-- Indices de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD PRIMARY KEY (`idDomicilio`);

--
-- Indices de la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD PRIMARY KEY (`idLicencia`);

--
-- Indices de la tabla `nodocentes`
--
ALTER TABLE `nodocentes`
  ADD PRIMARY KEY (`idNoDocente`);

--
-- Indices de la tabla `resoluciones`
--
ALTER TABLE `resoluciones`
  ADD PRIMARY KEY (`idResolucion`);

--
-- Indices de la tabla `secretaria`
--
ALTER TABLE `secretaria`
  ADD PRIMARY KEY (`idSecretaria`);

--
-- Indices de la tabla `tipotitulos`
--
ALTER TABLE `tipotitulos`
  ADD PRIMARY KEY (`idTipoTitulo`);

--
-- Indices de la tabla `titulos`
--
ALTER TABLE `titulos`
  ADD PRIMARY KEY (`idTitulo`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areaasignatura`
--
ALTER TABLE `areaasignatura`
  MODIFY `idAreaAsignatura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `idArea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `idAsignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `asignaturasdocentes`
--
ALTER TABLE `asignaturasdocentes`
  MODIFY `idAsignaturaDocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cargoayudantes`
--
ALTER TABLE `cargoayudantes`
  MODIFY `idCargoAyudante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cargodocentes`
--
ALTER TABLE `cargodocentes`
  MODIFY `idDocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `datospersonalestitulo`
--
ALTER TABLE `datospersonalestitulo`
  MODIFY `idDatosPTitulos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  MODIFY `idDatosP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `idDepartamento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `departamentosnodocentes`
--
ALTER TABLE `departamentosnodocentes`
  MODIFY `idDepartamentoNoDocente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  MODIFY `idDomicilio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `licencias`
--
ALTER TABLE `licencias`
  MODIFY `idLicencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nodocentes`
--
ALTER TABLE `nodocentes`
  MODIFY `idNoDocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `resoluciones`
--
ALTER TABLE `resoluciones`
  MODIFY `idResolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `secretaria`
--
ALTER TABLE `secretaria`
  MODIFY `idSecretaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipotitulos`
--
ALTER TABLE `tipotitulos`
  MODIFY `idTipoTitulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `titulos`
--
ALTER TABLE `titulos`
  MODIFY `idTitulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
