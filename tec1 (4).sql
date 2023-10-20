-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2023 a las 00:32:34
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
(69, 2513, 27, NULL),
(70, 1, 28, NULL),
(71, 2, 28, NULL),
(72, 3, 28, NULL),
(73, 4, 28, NULL),
(74, 7098, 29, NULL),
(75, 987, 29, NULL),
(76, 907, 29, NULL),
(77, 9, 29, NULL),
(78, 86, 29, NULL);

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
(6, 5, NULL, 'Martillo ', 2, NULL, NULL, NULL),
(7, 6, NULL, 'Destornillador', 1, NULL, NULL, NULL),
(8, 7, NULL, 'Destornillador', 3, NULL, NULL, NULL),
(9, 8, NULL, 'Destornillador', 1, 'no_entregado', NULL, NULL),
(10, 9, NULL, 'Martillo', 1, 'en_proceso', NULL, '1'),
(11, 9, NULL, 'Destornillador', 1, 'devuelto', NULL, NULL),
(12, 10, NULL, 'Herramienta', 1, NULL, NULL, NULL),
(13, 10, NULL, 'Destornillador', 2, NULL, NULL, NULL),
(14, 11, NULL, 'Martillo', 1, NULL, NULL, '1'),
(15, 11, NULL, 'Martillo ', 1, NULL, NULL, NULL);

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
(5, 'Carpinteria', 'Herramienta de Mano', 'Martillo'),
(6, 'Manual', 'Herramienta de Mano', 'Destornillador');

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
(39, 'Mateo', '33', 'Se rompio un martillo', '0000-00-00'),
(40, 'Porrazo', '3°1°', 'Vino sin el mango', '0000-00-00');

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
('Martillo', 2, 'Carpinteria', 'Herramienta de Mano', 'ñlkj', 'ARGENTINA', NULL, 27),
('Martillo', 2, 'Carpinteria', 'Herramienta de Mano', '', '', NULL, 28),
('Destornillador', 2, 'Carpinteria', 'Herramienta de Mano', 'Pedro', 'EEUU', NULL, 29);

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
(9, '2023-10-10', 'Porrazo', 'Pedro', 'L3', '3°1°', NULL),
(10, '2023-10-10', 'Mateo', 'Pedro', '3', '4°4', NULL),
(11, '2023-10-10', 'Mateo', 'lkjhoj', 'l3', 'l9', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user_name`, `password`, `rol`) VALUES
(8, 'Joaquin', 'nacho', 'panol'),
(15, 'Lucas', '123', 'admin'),
(16, 'Pelado', '123', 'panol');

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalles_inventario`
--
ALTER TABLE `detalles_inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `formulario_herramientas`
--
ALTER TABLE `formulario_herramientas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
