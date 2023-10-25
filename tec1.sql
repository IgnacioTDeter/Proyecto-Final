-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 09:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tec1`
--

-- --------------------------------------------------------

--
-- Table structure for table `detalles_inventario`
--

CREATE TABLE `detalles_inventario` (
  `id` int(11) NOT NULL,
  `id_herramienta` int(11) NOT NULL,
  `id_stock` int(11) NOT NULL,
  `estado` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detalles_inventario`
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
-- Table structure for table `detalles_pedidos`
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
-- Dumping data for table `detalles_pedidos`
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
-- Table structure for table `formulario_herramientas`
--

CREATE TABLE `formulario_herramientas` (
  `id` int(11) NOT NULL,
  `rubro` varchar(255) DEFAULT NULL,
  `sub_rubro` varchar(255) DEFAULT NULL,
  `herramienta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formulario_herramientas`
--

INSERT INTO `formulario_herramientas` (`id`, `rubro`, `sub_rubro`, `herramienta`) VALUES
(5, 'Carpinteria', 'Herramienta de Mano', 'Martillo'),
(6, 'Manual', 'Herramienta de Mano', 'Destornillador');

-- --------------------------------------------------------

--
-- Table structure for table `informes`
--

CREATE TABLE `informes` (
  `id` int(11) NOT NULL,
  `profesor` varchar(255) DEFAULT NULL,
  `curso` varchar(7) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informes`
--

INSERT INTO `informes` (`id`, `profesor`, `curso`, `texto`, `fecha`) VALUES
(39, 'Mateo', '33', 'Se rompio un martillo', '0000-00-00'),
(40, 'Porrazo', '3°1°', 'Vino sin el mango', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
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
-- Dumping data for table `inventario`
--

INSERT INTO `inventario` (`herramienta`, `cantidad`, `rubro`, `sub_rubro`, `proveedor`, `ubicacion`, `id_detalle`, `id`) VALUES
('Martillo', 2, 'Carpinteria', 'Herramienta de Mano', 'ñlkj', 'ARGENTINA', NULL, 27),
('Martillo', 2, 'Carpinteria', 'Herramienta de Mano', '', '', NULL, 28),
('Destornillador', 2, 'Carpinteria', 'Herramienta de Mano', 'Pedro', 'EEUU', NULL, 29);

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
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
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `dia`, `profesor`, `alumno`, `salon`, `curso`, `estado`) VALUES
(9, '2023-10-10', 'Porrazo', 'Pedro', 'L3', '3°1°', NULL),
(10, '2023-10-10', 'Mateo', 'Pedro', '3', '4°4', NULL),
(11, '2023-10-10', 'Mateo', 'lkjhoj', 'l3', 'l9', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol` varchar(255) DEFAULT NULL,
  `gmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `user_name`, `password`, `rol`, `gmail`) VALUES
(8, 'Joaquin', 'nacho', 'panol', ''),
(15, 'Lucas', '123', 'admin', ''),
(16, 'Pelado', '123', 'panol', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detalles_inventario`
--
ALTER TABLE `detalles_inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stock` (`id_stock`);

--
-- Indexes for table `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_herramienta` (`id_herramienta`);

--
-- Indexes for table `formulario_herramientas`
--
ALTER TABLE `formulario_herramientas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informes`
--
ALTER TABLE `informes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detalles_inventario`
--
ALTER TABLE `detalles_inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `formulario_herramientas`
--
ALTER TABLE `formulario_herramientas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `informes`
--
ALTER TABLE `informes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
