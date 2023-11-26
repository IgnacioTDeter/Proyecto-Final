-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2023 a las 04:05:49
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
-- Base de datos: `panol`
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
(80, 1, 30, 'Desgastada'),
(81, 2, 30, NULL),
(82, 3, 30, NULL),
(83, 4, 30, NULL),
(84, 5, 30, NULL),
(85, 6, 30, NULL),
(86, 7, 30, NULL),
(87, 8, 30, NULL),
(88, 9, 30, NULL),
(89, 10, 30, NULL),
(90, 11, 30, 'Funcional'),
(91, 111, 30, 'Funcional'),
(92, 222, 30, 'Funcional'),
(93, 1, 31, NULL),
(94, 2, 31, NULL),
(95, 3, 31, NULL),
(96, 4, 31, NULL),
(97, 5, 31, NULL),
(98, 6, 31, NULL),
(99, 7, 31, NULL),
(100, 8, 31, NULL),
(101, 9, 31, NULL),
(102, 10, 31, NULL),
(103, 123123, 31, 'Funcional'),
(104, 55, 30, 'Funcional'),
(105, 33, 30, 'Funcional'),
(106, 1, 32, NULL),
(107, 2, 32, NULL),
(108, 3, 32, NULL),
(109, 4, 32, NULL),
(110, 5, 32, NULL),
(111, 6, 32, NULL),
(112, 7, 32, NULL),
(113, 8, 32, NULL),
(114, 9, 32, NULL),
(115, 10, 32, NULL),
(116, 11, 32, NULL),
(117, 12, 32, NULL),
(118, 13, 32, NULL),
(119, 14, 32, NULL),
(120, 15, 32, NULL),
(121, 16, 32, NULL),
(122, 17, 32, NULL),
(123, 18, 32, NULL),
(124, 19, 32, NULL),
(125, 20, 32, NULL),
(126, 21, 32, NULL),
(127, 22, 32, NULL),
(128, 23, 32, NULL),
(129, 24, 32, NULL),
(130, 25, 32, NULL),
(131, 26, 32, NULL),
(132, 27, 32, NULL),
(133, 28, 32, NULL),
(134, 29, 32, NULL),
(135, 30, 32, NULL),
(136, 31, 32, NULL),
(137, 32, 32, NULL),
(138, 33, 32, NULL),
(139, 34, 32, NULL),
(140, 35, 32, NULL),
(141, 36, 32, NULL),
(142, 37, 32, NULL),
(143, 38, 32, NULL),
(144, 39, 32, NULL),
(145, 40, 32, NULL),
(146, 41, 32, NULL),
(147, 42, 32, NULL),
(148, 43, 32, NULL),
(149, 44, 32, NULL),
(150, 45, 32, NULL),
(151, 46, 32, NULL),
(152, 47, 32, NULL),
(153, 48, 32, NULL),
(154, 49, 32, NULL),
(155, 50, 32, NULL),
(156, 2, 33, NULL),
(157, 3, 33, NULL),
(158, 4, 33, NULL),
(159, 5, 33, NULL),
(160, 6, 33, NULL),
(161, 7, 33, NULL),
(162, 8, 33, NULL),
(163, 9, 33, NULL),
(164, 1, 33, NULL),
(165, 2, 33, NULL),
(166, 3, 33, NULL),
(167, 4, 33, NULL),
(168, 5, 33, NULL),
(169, 6, 33, NULL),
(170, 7, 33, NULL),
(171, 8, 33, NULL),
(172, 9, 33, NULL),
(173, 1, 33, NULL),
(174, 2, 33, NULL),
(175, 3, 33, NULL),
(176, 4, 33, NULL),
(177, 5, 33, NULL),
(178, 6, 33, NULL),
(179, 7, 33, NULL),
(180, 8, 33, NULL),
(181, 9, 33, NULL),
(182, 1, 33, NULL),
(183, 2, 33, NULL),
(184, 3, 33, NULL),
(185, 4, 33, NULL),
(186, 5, 33, NULL),
(187, 6, 33, NULL),
(188, 7, 33, NULL),
(189, 8, 33, NULL),
(190, 9, 33, NULL),
(191, 1, 33, NULL),
(192, 2, 33, NULL),
(193, 3, 33, NULL),
(194, 4, 33, NULL),
(195, 5, 33, NULL),
(196, 12, 34, NULL),
(197, 1, 34, NULL),
(198, 3, 34, NULL),
(199, 4, 34, NULL),
(200, 5, 34, NULL),
(201, 6, 34, NULL),
(202, 7, 34, NULL),
(203, 8, 34, NULL),
(204, 9, 34, NULL),
(205, 1, 34, NULL),
(206, 2, 34, NULL),
(207, 3, 34, NULL),
(208, 4, 34, NULL),
(209, 5, 34, NULL),
(210, 6, 34, NULL),
(211, 7, 34, NULL),
(212, 8, 34, NULL),
(213, 9, 34, NULL),
(214, 2, 34, NULL),
(215, 3, 34, NULL),
(216, 4, 34, NULL),
(217, 5, 34, NULL),
(218, 6, 34, NULL),
(219, 7, 34, NULL),
(220, 8, 34, NULL),
(221, 9, 34, NULL),
(222, 1, 34, NULL),
(223, 2, 34, NULL),
(224, 3, 34, NULL),
(225, 4, 34, NULL),
(226, 5, 34, NULL),
(227, 6, 34, NULL),
(228, 7, 34, NULL),
(229, 8, 34, NULL),
(230, 9, 34, NULL),
(231, 1, 34, NULL),
(232, 2, 34, NULL),
(233, 3, 34, NULL),
(234, 4, 34, NULL),
(235, 5, 34, NULL),
(236, 12, 35, NULL),
(237, 3, 35, NULL),
(238, 4, 35, NULL),
(239, 5, 35, NULL),
(240, 6, 35, NULL),
(241, 7, 35, NULL),
(242, 7, 35, NULL),
(243, 8, 35, NULL),
(244, 9, 35, NULL),
(245, 1, 35, NULL),
(246, 2, 35, NULL),
(247, 3, 35, NULL),
(248, 4, 35, NULL),
(249, 5, 35, NULL),
(250, 6, 35, NULL),
(251, 7, 35, NULL),
(252, 8, 35, NULL),
(253, 9, 35, NULL),
(254, 0, 35, NULL),
(255, 1, 35, NULL),
(256, 2, 35, NULL),
(257, 3, 35, NULL),
(258, 4, 35, NULL),
(259, 5, 35, NULL),
(260, 6, 35, NULL),
(261, 7, 35, NULL),
(262, 8, 35, NULL),
(263, 9, 35, NULL),
(264, 1, 35, NULL),
(265, 2, 35, NULL),
(266, 3, 35, NULL),
(267, 4, 35, NULL),
(268, 5, 35, NULL),
(269, 6, 35, NULL),
(270, 7, 35, NULL),
(271, 8, 35, NULL),
(272, 9, 35, NULL),
(273, 1, 35, NULL),
(274, 2, 35, NULL),
(275, 3, 35, NULL),
(276, 4, 35, NULL),
(277, 5, 35, NULL),
(278, 6, 35, NULL),
(279, 7, 35, NULL),
(280, 7, 35, NULL),
(281, 123, 30, 'Funcional'),
(282, 777, 31, 'Funcional'),
(284, 2, 30, 'Funcional'),
(285, 3, 30, 'Funcional'),
(286, 4, 30, 'Funcional'),
(287, 3233, 32, 'Funcional'),
(288, 3333, 32, 'Funcional'),
(289, 33333, 32, 'Funcional'),
(290, 777, 30, 'Funcional'),
(291, 7777, 30, 'Funcional'),
(292, 77777, 30, 'Funcional'),
(293, 7777777, 30, 'Funcional'),
(294, 32423, 30, 'Funcional'),
(295, 77799, 30, 'Funcional');

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
(12, 10, NULL, 'Herramienta', 1, 'en_proceso', NULL, NULL),
(13, 10, NULL, 'Destornillador', 2, NULL, NULL, '2'),
(14, 11, NULL, 'Martillo', 1, NULL, NULL, '1'),
(15, 11, NULL, 'Martillo ', 1, NULL, NULL, NULL),
(16, 12, NULL, 'Martillo', 1, NULL, NULL, '1'),
(17, 13, NULL, 'Martillo', 1, NULL, NULL, '1'),
(18, 14, NULL, 'Martillo', 11, NULL, NULL, NULL),
(19, 17, NULL, 'Martillo', 1, NULL, NULL, NULL),
(20, 18, NULL, 'Martillo', 111, NULL, NULL, NULL),
(21, 23, NULL, 'Destornillador', 10, NULL, NULL, '3'),
(22, 24, NULL, 'Destornillador', 2, NULL, NULL, '2'),
(23, 24, NULL, 'Martillo', 4, NULL, NULL, NULL),
(24, 25, NULL, 'Llaves', 20, 'en_proceso', NULL, '10'),
(25, 26, NULL, 'Pistola de calor', 12, NULL, NULL, NULL),
(26, 26, NULL, 'Cintra Metrica', 8, NULL, NULL, NULL),
(27, 27, NULL, 'Llaves', 23, NULL, NULL, NULL),
(28, 28, NULL, 'Pistola de calor', 13, NULL, NULL, NULL),
(29, 29, NULL, 'Destornillador', 3, NULL, NULL, NULL),
(30, 29, NULL, 'Martillo', 1, NULL, NULL, NULL),
(31, 31, NULL, 'Destornillador', 2, NULL, NULL, NULL),
(32, 32, NULL, 'Martillo', 1, NULL, NULL, NULL),
(33, 33, NULL, 'Llaves', 2, NULL, NULL, NULL),
(34, 34, NULL, 'Llaves', 2, NULL, NULL, NULL),
(35, 35, NULL, 'Llaves', 2, NULL, NULL, NULL),
(36, 36, NULL, 'Llaves', 2, NULL, NULL, NULL),
(37, 37, NULL, 'Martillo ', 1, NULL, NULL, '1');

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
(6, 'Manual', 'Herramienta de Mano', 'Destornillador'),
(7, 'Carpinteria', 'Herramienta de Mano', 'Llaves'),
(8, 'Elecetricidad ', 'Herramienta de Mano', 'Taladros'),
(9, 'Manual', 'Herramienta electrica', 'Pistola de calor'),
(10, 'Herramienta de medicion', ',', 'Cintra metrica');

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
(51, 'Mateo', '3°3°', 'Se rompió un destornillador', '2023-11-12'),
(53, 'Mateo', '4°4°', 'sa', '2023-11-12');

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
('Martillo', 6, 'Carpinteria', 'Herramienta de Mano', '', '', NULL, 30),
('Destornillador', 5, 'Carpinteria', 'Herramienta de Mano', '', '', NULL, 31),
('Llaves', 17, 'Carpinteria', 'Herramienta de Mano', '', '', NULL, 32),
('Taladros', 40, 'Elecetricidad ', 'Herramienta de Mano', '', 'Ubicacion ', NULL, 33),
('Pistola de calor', 15, 'Elecetricidad ', 'Herramienta de Mano', '', 'Ubicacion A', NULL, 34),
('Cintra metrica', 37, 'Herramienta de medicion', ',', '', 'Ubicacion B', NULL, 35);

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
(24, '2023-11-12', 'Mateo', 'Pedro', 'L3', '4°4°', 'en_proceso'),
(25, '2023-11-12', 'Mateo', 'Pedro', 'L3', '3°3°', NULL),
(26, '2023-11-12', 'Porrazo', 'Miguel', 'L1', '1°1', 'en_proceso'),
(27, '2023-11-12', 'Lemos', 'Juan', 'L2', '5°1°', NULL),
(28, '2023-11-12', 'Hernan', 'Lucas', 'L4', '4°4', NULL),
(29, '2023-11-12', 'Jacob', 'Hernan', 'L3', '4°2°', NULL),
(31, '2023-11-12', 'Mateo', 'Pedro', 'L3', '4°1°', NULL),
(32, '2023-11-12', 'Hernan', 'Julian', 'L1', '3°2°', NULL),
(37, '2023-11-12', 'Mateo', 'lkjhoj', 'L3', '3°3°', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol` varchar(255) DEFAULT NULL,
  `gmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user_name`, `password`, `rol`, `gmail`) VALUES
(38, 'Lemos', '$2y$10$00yrE1c0aUxzNAtdGFltteK6aMJYJA3PQ4oy47GuOqA6ERJ8AWLYG', 'admin', 'pedro@gmail.com'),
(39, 'Porrazo', '$2y$10$n.K4DRtDJr5faLNl8AhSpuoIzyURWSUToflht7D.FFq7PGH1xDoaq', 'profesor', 'porrazo@gmail.com'),
(40, 'Pedro', '$2y$10$9CRgUPOAJfUwUckMSHSiQOckaU8KMdUnseSld2JrdiocAys0fMpIK', 'panol', 'pedro@gmail.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT de la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `formulario_herramientas`
--
ALTER TABLE `formulario_herramientas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
