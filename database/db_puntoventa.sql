-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2021 a las 19:20:08
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_puntoventa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `proveedor` smallint(5) UNSIGNED NOT NULL,
  `linea` smallint(5) UNSIGNED NOT NULL,
  `grupo` smallint(5) UNSIGNED NOT NULL,
  `imagen` varchar(80) NOT NULL,
  `codigostock` varchar(50) NOT NULL,
  `fecha_cad` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegas`
--

CREATE TABLE `bodegas` (
  `id` int(11) NOT NULL,
  `numero` int(5) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `bodegas`
--

INSERT INTO `bodegas` (`id`, `numero`, `nombre`) VALUES
(1, 1, 'MATRIZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas`
--

CREATE TABLE `estadisticas` (
  `ventas` int(11) NOT NULL,
  `vendido` int(11) NOT NULL,
  `gastado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadisticas`
--

INSERT INTO `estadisticas` (`ventas`, `vendido`, `gastado`) VALUES
(0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas_mensuales`
--

CREATE TABLE `estadisticas_mensuales` (
  `enero` int(11) NOT NULL,
  `febrero` int(11) NOT NULL,
  `marzo` int(11) NOT NULL,
  `abril` int(11) NOT NULL,
  `mayo` int(11) NOT NULL,
  `junio` int(11) NOT NULL,
  `julio` int(11) NOT NULL,
  `agosto` int(11) NOT NULL,
  `septiembre` int(11) NOT NULL,
  `octubre` int(11) NOT NULL,
  `noviembre` int(11) NOT NULL,
  `diciembre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadisticas_mensuales`
--

INSERT INTO `estadisticas_mensuales` (`enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`) VALUES
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `existencias`
--

CREATE TABLE `existencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

CREATE TABLE `kardex` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(50) NOT NULL DEFAULT ' ',
  `cantidad` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tipo` varchar(5) NOT NULL DEFAULT ' ',
  `fecha` date NOT NULL,
  `user` varchar(50) NOT NULL DEFAULT ' ',
  `costou` decimal(10,2) NOT NULL DEFAULT '0.00',
  `preciou` decimal(10,2) NOT NULL DEFAULT '0.00',
  `proveedor` int(10) NOT NULL,
  `descuento_porcentaje` decimal(10,2) NOT NULL,
  `impuesto_porcentaje` decimal(10,2) NOT NULL,
  `serie` int(2) NOT NULL,
  `numero` int(10) NOT NULL,
  `fecha_proceso` date NOT NULL,
  `referencia` varchar(45) NOT NULL,
  `referencia1` varchar(45) NOT NULL,
  `referencia2` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `kardex`
--

INSERT INTO `kardex` (`id`, `codigo`, `cantidad`, `tipo`, `fecha`, `user`, `costou`, `preciou`, `proveedor`, `descuento_porcentaje`, `impuesto_porcentaje`, `serie`, `numero`, `fecha_proceso`, `referencia`, `referencia1`, `referencia2`) VALUES
(1, '44730', '10.00', 'A', '2021-01-06', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(2, '44730', '5.00', 'A-', '2021-01-10', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(3, '447390', '0.00', 'undef', '2021-03-07', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(4, '447390', '0.00', 'undef', '2021-03-07', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(5, '44730', '0.00', 'undef', '2021-03-07', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(6, '447390', '0.00', 'undef', '2021-03-07', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(7, '44130', '0.00', 'undef', '2021-06-04', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(8, '44730', '0.00', 'undef', '2021-06-28', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(9, '44730', '0.00', 'undef', '2021-06-28', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(10, '44730', '0.00', 'undef', '2021-06-29', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(11, '44730', '0.00', 'undef', '2021-06-29', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(12, '44730', '0.00', 'undef', '2021-06-29', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(13, '44730', '15.00', 'A', '2021-06-29', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(14, '44730', '0.00', '', '2021-06-29', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(15, '44730', '0.00', '', '2021-06-29', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(16, '44730', '0.00', '', '2021-06-29', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(17, '44730', '0.00', '', '2021-06-29', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(18, '44730', '0.00', '', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(19, '44730', '0.00', '', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(20, '44730', '0.00', '', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(21, '44130', '0.00', '', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(22, '44730', '40.00', 'A-', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(23, '44730', '0.00', '', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(24, '44730', '0.00', '', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(25, '44730', '0.00', '', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(26, '44730', '0.00', '', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(27, '44730', '0.00', '', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(28, '44730', '0.00', '', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(29, '44730', '10.00', 'A', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(30, '44730', '0.00', '', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(31, '44730', '0.00', '', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(32, '44730', '30.00', 'A', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(33, '44730', '10.00', 'A', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(34, '44730', '20.00', '', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(35, '44730', '70.00', '', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(36, '44730', '100.00', '', '2021-06-30', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(37, '44730', '150.00', '', '2021-07-01', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(38, '44730', '200.00', '', '2021-07-01', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(39, '44730', '250.00', '', '2021-07-01', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(40, '44730', '260.00', '', '2021-07-01', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(41, '44730', '300.00', '', '2021-07-01', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(42, '44730', '320.00', '', '2021-07-01', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(43, '44730', '340.00', '', '2021-07-01', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(44, '44730', '350.00', '', '2021-07-01', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(45, '44730', '400.00', '', '2021-07-01', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(46, '447390', '20.00', '', '2021-07-05', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(47, '44730', '420.00', '', '2021-07-05', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(48, '44730', '440.00', '', '2021-07-06', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(49, '44730', '500.00', '', '2021-07-09', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(50, '44730', '510.00', '', '2021-07-13', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(51, '447390', '40.00', '', '2021-07-13', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(52, '44730', '101.00', '', '2021-07-13', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(53, '44730', '101.00', '', '2021-07-13', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(54, '44730', '10.00', '', '2021-07-14', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(55, '44730', '50.00', '', '2021-07-14', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(56, '44730', '50.00', '', '2021-07-14', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(57, '44730', '50.00', '', '2021-07-14', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(58, '44730', '52.00', '', '2021-07-14', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(59, '44730', '50.00', '', '2021-07-14', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(60, '447390', '49.00', '', '2021-07-14', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(61, '44730', '119.00', '', '2021-07-15', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(62, '44730', '139.00', '', '2021-07-15', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(63, '44730', '189.00', '', '2021-07-15', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(64, '44730', '200.00', '', '2021-07-15', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(65, '44730', '220.00', '', '2021-07-15', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(66, '44730', '240.00', '', '2021-07-15', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', ''),
(67, '44730', '260.00', '', '2021-07-15', 'administrador', '0.00', '0.00', 0, '0.00', '0.00', 0, 0, '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas`
--

CREATE TABLE `lineas` (
  `id` int(10) UNSIGNED NOT NULL,
  `linea` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `grupo` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `descripcion` varchar(80) NOT NULL DEFAULT ' ',
  `marca_eliminada` char(2) NOT NULL DEFAULT 'NO'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numerito`
--

CREATE TABLE `numerito` (
  `numerito` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `numerito`
--

INSERT INTO `numerito` (`numerito`) VALUES
('50'),
(''),
(''),
(''),
('44730'),
(''),
(''),
('447390'),
(''),
(''),
('447390'),
(''),
('447390'),
(''),
(''),
(''),
('');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE `parametros` (
  `id` int(10) UNSIGNED NOT NULL,
  `entrada_x_compra` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `nombre_empresa` varchar(50) NOT NULL,
  `domicilio_empresa` varchar(50) NOT NULL,
  `caja1` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `caja2` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `caja3` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `caja4` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `nombre_emp_corto` varchar(25) NOT NULL DEFAULT ' '
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `domicilio` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `switch`
--

CREATE TABLE `switch` (
  `estate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `switch`
--

INSERT INTO `switch` (`estate`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE `tasks` (
  `ident` int(20) NOT NULL,
  `task` varchar(255) NOT NULL,
  `mount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `tel1` varchar(10) NOT NULL,
  `tel2` varchar(10) NOT NULL,
  `tel3` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`tel1`, `tel2`, `tel3`) VALUES
('0', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp`
--

CREATE TABLE `temp` (
  `id` int(8) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `proveedor` int(4) UNSIGNED NOT NULL DEFAULT '0',
  `num_fact_nota` varchar(15) NOT NULL DEFAULT ' ',
  `impuesto_porcentaje` decimal(10,2) NOT NULL DEFAULT '0.00',
  `desc_porcentaje` decimal(10,2) NOT NULL DEFAULT '0.00',
  `articulo` varchar(50) NOT NULL DEFAULT ' ',
  `costo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cantidad` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tipo` varchar(5) NOT NULL DEFAULT ' ',
  `descripcion_articulo` varchar(100) NOT NULL DEFAULT ' ',
  `descripcion_prov` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(50) NOT NULL DEFAULT ' ',
  `tipo` varchar(5) NOT NULL DEFAULT ' '
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `password` varchar(535) NOT NULL,
  `bodega` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `clave`, `password`, `bodega`) VALUES
(7, 'administrador', 'administrador', 'administrador', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD PRIMARY KEY (`ventas`);

--
-- Indices de la tabla `existencias`
--
ALTER TABLE `existencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`ident`);

--
-- Indices de la tabla `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  MODIFY `ventas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `existencias`
--
ALTER TABLE `existencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `kardex`
--
ALTER TABLE `kardex`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `lineas`
--
ALTER TABLE `lineas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `parametros`
--
ALTER TABLE `parametros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
  MODIFY `ident` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
