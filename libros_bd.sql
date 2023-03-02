-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 01:17 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

create database libros_bd;
use libros_bd;

--
-- Database: `libros_bd`
--


-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carrito`
--

INSERT INTO `carrito` (`id`, `client_email`, `created_at`) VALUES
(9, 'samuelbolivar@gmail.com', '2023-03-02 13:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `carrito_producto`
--

CREATE TABLE `carrito_producto` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `q` float DEFAULT NULL,
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carrito_producto`
--

INSERT INTO `carrito_producto` (`id`, `product_id`, `q`, `cart_id`) VALUES
(14, 7, 3, 9),
(15, 8, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Autor` varchar(255) NOT NULL,
  `Editorial` varchar(255) NOT NULL,
  `Fecha_publicacion` date NOT NULL,
  `Genero` varchar(255) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Imagen` varchar(255) NOT NULL,
  `Descripción` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`id`, `Titulo`, `Autor`, `Editorial`, `Fecha_publicacion`, `Genero`, `Precio`, `Imagen`, `Descripción`) VALUES
(7, 'Quixote', 'Cervantes', 'SISI', '2003-01-30', 'Fantasía', '120.00', '', 'La verdad que sí'),
(8, 'La Gran Ola', 'Elvira', 'Norman', '2015-03-01', 'Terror', '49.00', '', 'SI');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(40) NOT NULL,
  `correo` varchar(120) NOT NULL,
  `password` varchar(280) NOT NULL,
  `fechaReg` date NOT NULL,
  `direccion` varchar(120) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`nombre`, `correo`, `password`, `fechaReg`, `direccion`, `id`) VALUES
('admin', 'admin@admin.es', '21232f297a57a5a743894a0e4a801fc3', '2023-03-02', 'Calle Admin', 19),
('samu3ak', 'samuelbolivar@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-03-02', 'Calle La Vid', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrito_producto`
--
ALTER TABLE `carrito_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carrito_producto`
--
ALTER TABLE `carrito_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
