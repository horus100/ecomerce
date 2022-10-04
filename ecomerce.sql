-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-07-2022 a las 00:27:01
-- Versión del servidor: 5.7.33
-- Versión de PHP: 8.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecomerce`
--
CREATE DATABASE IF NOT EXISTS `ecomerce` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ecomerce`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID`, `Nombre`) VALUES
(1, 'Electrodomesticos'),
(2, 'Categoria Nueva'),
(3, 'Categoria Nueva 10'),
(4, 'Tecnologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `ID` int(11) NOT NULL,
  `ID_Cliente` int(11) NOT NULL,
  `ID_Venta` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `departamento` varchar(300) NOT NULL,
  `provincia` varchar(250) NOT NULL,
  `distrito` varchar(300) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `referencia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `ID_Categoria` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `Descripcion_corta` varchar(60) NOT NULL,
  `Descripcion_larga` text NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio_und` decimal(10,2) NOT NULL,
  `Imagen` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `ID_Categoria`, `Nombre`, `Descripcion_corta`, `Descripcion_larga`, `Cantidad`, `Precio_und`, `Imagen`) VALUES
(1, 1, 'Artefacto', '', 'Es un artefacto', 0, '10.20', 'https://cdn.pixabay.com/photo/2018/02/16/02/03/pocket-watch-3156771__340.jpg'),
(3, 1, 'Licuadora', '', 'Es un artefacto', 10, '30.00', 'https://cdn.pixabay.com/photo/2012/04/25/00/54/blender-41486_960_720.png'),
(14, 4, 'Celular', 'Celular Modelo C 150', 'Es un celular de ultima generacion, con IA y memoria ram de 16 GM', 5, '250.00', 'https://cdn.pixabay.com/photo/2017/04/03/15/52/mobile-phone-2198770__340.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `Celular` varchar(15) NOT NULL,
  `Correo` varchar(200) NOT NULL,
  `Pw` varchar(255) NOT NULL,
  `Rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `Nombre`, `Apellido`, `DNI`, `Celular`, `Correo`, `Pw`, `Rol`) VALUES
(4, 'Usuario', 'nuevo4', '12345678', '10', 'correo1@mail.com', '$2y$10$OeWiWA5VyknWfvCr40Xvre5SM9k6Tf5HuJwhqPmT5hXN10GG1dKnK', ''),
(5, 'Usuario', '1', '12345678', '12', 'gmail@mail.com', '$2y$10$8PL.ZFMxIAbr0nQUf9GHp.uZ.yZbh9s4XnrEChyO/Z0KgMc6zfRxu', ''),
(6, 'Usuario', '10', '12345678', '100', 'hola100@mail.com', '$2y$10$HXqF7wjg8Drrx3YphuoMyOJoJ9nFUBuNqx4YIMyBfEJkJwUsDmk7i', ''),
(7, 'admin', 'admin', '12', '1', 'admin@admin.com', '$2y$10$kDBtHUF2RhBgElhPR8JxWeXdlrM7aFGDc0KaDD2E6tv9EY3QWjGLS', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID` int(11) NOT NULL,
  `ID_Cliente` int(11) NOT NULL,
  `Monto` decimal(10,2) NOT NULL,
  `Fecha` date NOT NULL,
  `Estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ID`, `ID_Cliente`, `Monto`, `Fecha`, `Estado`) VALUES
(65, 7, '10.20', '2022-05-31', 'Pendiente'),
(66, 7, '10.20', '2022-06-01', 'Pendiente'),
(67, 7, '30.00', '2022-06-01', 'Pendiente'),
(68, 7, '30.00', '2022-06-01', 'Pendiente'),
(69, 7, '30.00', '2022-06-01', 'Pendiente'),
(70, 7, '102.00', '2022-06-01', 'Pendiente'),
(71, 7, '102.00', '2022-06-01', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_productos`
--

CREATE TABLE `venta_productos` (
  `ID` int(11) NOT NULL,
  `ID_Venta` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  `Cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta_productos`
--

INSERT INTO `venta_productos` (`ID`, `ID_Venta`, `ID_Producto`, `Cantidad`) VALUES
(63, 65, 1, 1),
(64, 66, 1, 1),
(65, 67, 3, 1),
(66, 68, 3, 1),
(67, 69, 3, 1),
(68, 70, 1, 10),
(69, 71, 1, 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Cliente` (`ID_Cliente`),
  ADD KEY `ID_Venta` (`ID_Venta`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Categoria` (`ID_Categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Cliente` (`ID_Cliente`);

--
-- Indices de la tabla `venta_productos`
--
ALTER TABLE `venta_productos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Venta` (`ID_Venta`),
  ADD KEY `ID_Producto` (`ID_Producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `venta_productos`
--
ALTER TABLE `venta_productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `envios_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `envios_ibfk_2` FOREIGN KEY (`ID_Venta`) REFERENCES `ventas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`ID_Categoria`) REFERENCES `categoria` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta_productos`
--
ALTER TABLE `venta_productos`
  ADD CONSTRAINT `venta_productos_ibfk_1` FOREIGN KEY (`ID_Venta`) REFERENCES `ventas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_productos_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `productos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
