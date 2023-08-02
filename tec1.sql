-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2023 a las 23:43:34
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tec1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `herramienta` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `rubro` varchar(100) DEFAULT NULL,
  `sub_rubro` varchar(100) DEFAULT NULL,
  `proveedor` varchar(100) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`herramienta`, `cantidad`, `rubro`, `sub_rubro`, `proveedor`, `ubicacion`) VALUES
('Cinta métrica', 25, 'Herramientas de medición', 'Construcción', 'Ferretería ABC', 'Almacén 2'),
('Destornillador', 8, 'Herramientas manuales', 'Reparaciones', 'Ferretería XYZ', 'Almacén 2'),
('Llave ajustable', 12, 'Herramientas manuales', 'Plomería', 'Ferretería XYZ', 'Almacén 2'),
('Martillo', 10, 'Herramientas manuales', 'Construcción', 'Ferretería ABC', 'Almacén 1'),
('Nivel de burbuja', 20, 'Herramientas de medición', 'Construcción', 'Herramientas SA', 'Almacén 4'),
('Pala', 6, 'Herramientas manuales', 'Jardinería', 'Ferretería XYZ', 'Almacén 3'),
('Sierra eléctrica', 5, 'Herramientas eléctricas', 'Carpintería', 'Herramientas SA', 'Almacén 1'),
('Taladro inalámbrico', 8, 'Herramientas eléctricas', 'Construcción', 'Ferretería ABC', 'Almacén 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `dia` date NOT NULL,
  `profesor` varchar(100) NOT NULL,
  `alumno` varchar(100) NOT NULL,
  `salon` varchar(100) DEFAULT NULL,
  `curso` varchar(100) DEFAULT NULL,
  `cantidad_solicitada` int(11) NOT NULL,
  `herramienta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `dia`, `profesor`, `alumno`, `salon`, `curso`, `cantidad_solicitada`, `herramienta`) VALUES
(1, '2023-07-25', 'kulikosqii', 'espindola juan', 'l2', '7mo', 6, 'Destornillador'),
(2, '2023-07-27', 'aa', 'aa', 'a1', '11', 1, 'Destornillador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user_name`, `password`) VALUES
(1, 'tobias', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`herramienta`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `herramienta` (`herramienta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`herramienta`) REFERENCES `inventario` (`herramienta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
