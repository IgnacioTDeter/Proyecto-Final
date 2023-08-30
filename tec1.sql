-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-08-2023 a las 04:05:07
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
-- Estructura de tabla para la tabla `detalles_pedidos`
--

CREATE TABLE `detalles_pedidos` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_herramienta` int(11) DEFAULT NULL,
  `herramienta` varchar(255) DEFAULT NULL,
  `cantidad_solicitada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalles_pedidos`
--

INSERT INTO `detalles_pedidos` (`id`, `id_pedido`, `id_herramienta`, `herramienta`, `cantidad_solicitada`) VALUES
(3, 5, 1, 'martillo', 1),
(4, 5, 1, 'martillo', 2),
(5, 6, 2, 'destornillador', 1),
(6, 6, 2, 'destornillador', 1),
(7, 7, NULL, 'prueba final', 2),
(8, 7, NULL, 'prueba final', 1),
(9, 7, NULL, 'prueba final', 1),
(10, 7, 1, 'martillo', 2),
(11, 7, 2, 'destornillador', 3),
(12, 8, NULL, 'maritllo', 59),
(13, 8, 2, 'destornillador ', 59),
(14, 9, NULL, 'maritllo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_herramienta` int(11) NOT NULL,
  `herramienta` varchar(255) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `rubro` varchar(255) DEFAULT NULL,
  `sub_rubro` varchar(255) DEFAULT NULL,
  `proveedor` varchar(255) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `id_detalle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_herramienta`, `herramienta`, `cantidad`, `rubro`, `sub_rubro`, `proveedor`, `ubicacion`, `id_detalle`) VALUES
(1, 'martillo', 10, 'manual', 'golpe', 'tobias suarez', 'l1', NULL),
(2, 'destornillador', 10, 'manual', 'destornillador', 'tobias suarez', 'l1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
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
(3, '2023-08-02', 'tobias', 'Alumno', NULL, NULL, NULL),
(4, '2023-08-10', '1', '1', '1', '1', NULL),
(5, '0000-00-00', '1', '1', '1', '1', NULL),
(6, '1111-11-11', '1', '1', '1', '1', NULL),
(7, '2023-08-10', 'prueba final', 'prueba final', 'prueba final', 'prueba final', NULL),
(8, '0000-00-00', '59', '59', '59', '59', NULL),
(9, '1111-11-11', 'aa', 'a', 'a', '22', NULL);

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
-- Indices de la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_herramienta` (`id_herramienta`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_herramienta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
