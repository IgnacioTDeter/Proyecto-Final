-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2023 at 10:16 PM
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
-- Database: `panol`
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
(105, 33, 30, 'Funcional');

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
(12, 10, NULL, 'Herramienta', 1, 'en_proceso', NULL, NULL),
(13, 10, NULL, 'Destornillador', 2, NULL, NULL, '2'),
(14, 11, NULL, 'Martillo', 1, NULL, NULL, '1'),
(15, 11, NULL, 'Martillo ', 1, NULL, NULL, NULL),
(16, 12, NULL, 'Martillo', 1, NULL, NULL, '1'),
(17, 13, NULL, 'Martillo', 1, NULL, NULL, '1'),
(18, 14, NULL, 'Martillo', 11, NULL, NULL, NULL),
(19, 17, NULL, 'Martillo', 1, NULL, NULL, NULL),
(20, 18, NULL, 'Martillo', 111, NULL, NULL, NULL);

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
(40, 'Porrazo', '3°1°', 'Vino sin el mango', '0000-00-00'),
(41, 'a', 'a', 'uwu\r\n', '0000-00-00'),
(42, 'a', 'a', 'annanananananan', '0000-00-00'),
(43, '1', '1', 'ananana+\r\n', '0000-00-00'),
(44, '1', '1', 'hgjhgjgjhgj\r\n', '0000-00-00'),
(45, '1', '1', '11111111111111\r\n', '0000-00-00');

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
('Martillo', -111, 'Carpinteria', 'Herramienta de Mano', '', '', NULL, 30),
('Destornillador', 10, 'Carpinteria', 'Herramienta de Mano', '', '', NULL, 31);

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
(14, '2023-11-08', '11', '11', '11', '11', NULL),
(15, '2023-11-08', 'd', 'd', 'd', 'd', NULL),
(16, '2023-11-08', '1', '1', '1', '11', NULL),
(17, '2023-11-08', '1', '11', '1', '11', NULL),
(18, '2023-11-08', '1', '111', '1', '1', NULL),
(19, '2023-11-08', '1111', '111', '1', '11', NULL);

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
(8, 'Joaquin', '$2y$10$JwiCYh3egwq.Ym5LOwV8y.F.64xTcjqi/MVZiPO97QtTjx4l8a/oa', 'panol', 'tobias.suarez.t1vl@gmail.com'),
(15, 'Lucas', '$2y$10$PQ3LJfLjgqSV2JEu7/uSdeHswQKmQAFWRe3CV6naP0Mebk.feS9Hu', 'panol', 'tobiassuarez04@gmail.com'),
(32, 'Agos', '$2y$10$070qEAscrmXHCDxWC.9DxuyPuMmF.tkNU2c4R/YemGjx.s.qiAIo2', 'panol', 'Agos@gmail.com'),
(33, 'test', '$2y$10$M2a1GN8em6vSc8wwzqMVwe8vg1oBGjAGVicdP3UnFkdeA.sLipUCm', 'panol', 'test2@gmail.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `formulario_herramientas`
--
ALTER TABLE `formulario_herramientas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `informes`
--
ALTER TABLE `informes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
