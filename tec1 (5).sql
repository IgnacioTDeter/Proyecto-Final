-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2023 a las 04:06:16
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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
-- Estructura de tabla para la tabla `detalles_inventario`
--

CREATE TABLE `detalles_inventario` (
  `id` int(11) NOT NULL,
  `id_herramienta` int(11) NOT NULL,
  `id_stock` int(11) NOT NULL,
  `estado` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalles_inventario`
--

INSERT INTO `detalles_inventario` (`id`, `id_herramienta`, `id_stock`, `estado`) VALUES
(48, 4, 17, NULL),
(49, 5, 17, NULL),
(50, 6, 17, NULL),
(51, 234, 18, NULL),
(52, 235, 18, NULL),
(53, 236, 18, NULL),
(54, 545, 19, 'Baja'),
(55, 456, 19, NULL),
(56, 456, 19, NULL),
(57, 23542, 20, NULL),
(58, 34536, 22, NULL),
(59, 234652, 23, NULL),
(60, 34526, 23, NULL),
(61, 1235325, 23, NULL),
(62, 326231, 24, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pedidos`
--

CREATE TABLE `detalles_pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_herramienta` int(11) DEFAULT NULL,
  `herramienta` varchar(255) DEFAULT NULL,
  `cantidad_solicitada` int(11) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `inventario` int(11) DEFAULT NULL,
  `devoluciones` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalles_pedidos`
--

INSERT INTO `detalles_pedidos` (`id`, `id_pedido`, `id_herramienta`, `herramienta`, `cantidad_solicitada`, `estado`, `inventario`, `devoluciones`) VALUES
(1, 1, NULL, 'Martillo', 3, NULL, NULL, NULL),
(2, 1, NULL, 'Destornillador', 2, NULL, NULL, NULL),
(3, 2, NULL, 'Martillo', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario_herramientas`
--

CREATE TABLE `formulario_herramientas` (
  `id` int(11) NOT NULL,
  `rubro` varchar(255) DEFAULT NULL,
  `sub_rubro` varchar(255) DEFAULT NULL,
  `herramienta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `formulario_herramientas`
--

INSERT INTO `formulario_herramientas` (`id`, `rubro`, `sub_rubro`, `herramienta`) VALUES
(1, 'Carpinteria', 'Herramienta de mano', 'Martillo'),
(2, 'General', 'Herramienta de mano', 'Destornillador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE `informes` (
  `id` int(11) NOT NULL,
  `profesor` varchar(255) DEFAULT NULL,
  `curso` varchar(7) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `informes`
--

INSERT INTO `informes` (`id`, `profesor`, `curso`, `texto`, `fecha`) VALUES
(37, 'Pedro', '1°3°', 'Test', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `herramienta` varchar(255) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `rubro` varchar(255) DEFAULT NULL,
  `sub_rubro` varchar(255) DEFAULT NULL,
  `proveedor` varchar(255) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `id_detalle` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`herramienta`, `cantidad`, `rubro`, `sub_rubro`, `proveedor`, `ubicacion`, `id_detalle`, `id`) VALUES
('Martillo', 1, 'Nose', 'Nose', 'NOse', 'Nose', NULL, 17),
('1', 3, '', '', 'añlsfkj', 'ñalsfdj', NULL, 18),
('1', 3, '', '', 'añlsfkj', 'LAS BAHAMAS', NULL, 19),
('2', 1, 'Carpinteria', '', 'añlsfkj', 'ñalsfdj', NULL, 20),
('Destornillador', 1, 'General', '', '32', 'ñalsfdj', NULL, 21),
('Destornillador', 1, 'General', '', '32', 'ñalsfdj', NULL, 22),
('Martillo', 3, 'Carpinteria', 'Herramienta de mano', 'iouy', 'ñalsfdj', NULL, 23),
('Martillo', 1, 'Carpinteria', 'Herramienta de mano', 'añlsfkj', 'ñalsfdj', NULL, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(10) UNSIGNED NOT NULL,
  `dia` date DEFAULT NULL,
  `profesor` varchar(255) DEFAULT NULL,
  `alumno` varchar(255) DEFAULT NULL,
  `salon` varchar(255) DEFAULT NULL,
  `curso` varchar(255) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `dia`, `profesor`, `alumno`, `salon`, `curso`, `estado`) VALUES
(1, '2023-09-18', 'Pedro', 'Pedro', 'L8', '1°3°', NULL),
(2, '2023-09-18', 'asdf', 'Pedro', 'L8', '1°3°', NULL);

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
(1, 'admin', '123'),
(2, 'tobias', '123'),
(3, 'profes', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalles_inventario`
--
ALTER TABLE `detalles_inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stock` (`id_stock`);

--
-- Indices de la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_herramienta` (`id_herramienta`);

--
-- Indices de la tabla `formulario_herramientas`
--
ALTER TABLE `formulario_herramientas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `informes`
--
ALTER TABLE `informes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalles_inventario`
--
ALTER TABLE `detalles_inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `formulario_herramientas`
--
ALTER TABLE `formulario_herramientas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
