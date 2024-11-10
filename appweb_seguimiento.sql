-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2024 a las 20:11:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appweb_seguimiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aws_login`
--

CREATE TABLE `aws_login` (
  `aws_id` int(7) NOT NULL,
  `aws_nombre` varchar(32) NOT NULL,
  `aws_correo` varchar(32) NOT NULL,
  `aws_password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aws_login`
--

INSERT INTO `aws_login` (`aws_id`, `aws_nombre`, `aws_correo`, `aws_password`) VALUES
(1, 'aws', 'appseguimiento@gmai.com', 'aws1'),
(2, 'Pruebavideo', 'prueba@gmail.com', 'enters'),
(3, 'Pruebas02', 'correopreuba@gmail.com', '1234'),
(4, 'Prueba03', 'prue@gmail.com', '12345'),
(5, 'carlos', 'carlos@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aws_proyectos`
--

CREATE TABLE `aws_proyectos` (
  `aws_id` int(7) NOT NULL,
  `aws_nombrePro` varchar(25) NOT NULL,
  `aws_nombreDir` varchar(25) NOT NULL,
  `aws_fechaInicio` date NOT NULL,
  `aws_fechaFin` date NOT NULL,
  `aws_equipo` varchar(15) NOT NULL,
  `aws_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aws_login`
--
ALTER TABLE `aws_login`
  ADD PRIMARY KEY (`aws_id`);

--
-- Indices de la tabla `aws_proyectos`
--
ALTER TABLE `aws_proyectos`
  ADD PRIMARY KEY (`aws_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aws_login`
--
ALTER TABLE `aws_login`
  MODIFY `aws_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `aws_proyectos`
--
ALTER TABLE `aws_proyectos`
  MODIFY `aws_id` int(7) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
