-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2015 a las 18:43:53
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pendiente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` text NOT NULL,
  `Tipo` text NOT NULL,
  `P_Unitario` int(11) NOT NULL,
  `P_Proveedores` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id`, `Nombre`, `Tipo`, `P_Unitario`, `P_Proveedores`) VALUES
(1, 'Cuaderno', 'Lineas', 8, 7),
(3, 'sadasdas', 'asdsadas', 5, 4),
(4, 'asdfasd', 'sdsad', 8, 4),
(5, '', '', 0, 0),
(6, '', '', 0, 0),
(7, '', '', 0, 0),
(8, '', '', 0, 0),
(9, '', '', 0, 0),
(10, '', '', 0, 0),
(11, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` text NOT NULL,
  `Apellido` text NOT NULL,
  `Correo` text NOT NULL,
  `Celular` int(11) NOT NULL,
  `Ruc` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`Id`, `Nombre`, `Apellido`, `Correo`, `Celular`, `Ruc`) VALUES
(1, 'Moises', 'Andrade', 'dany_180991@hotmail.com', 991405312, 2147483647),
(8, 'Moise', 'Moreira', 'dany_180991@hotmail.com', 2147483647, 2147483647),
(9, 'Moises', 'Andrade', 'dany_180991@hotmail.com', 2147483647, 556465565),
(10, 'Moises', 'Andrade', 'dany_180991@hotmail.com', 2147483647, 2147483647),
(11, 'sas', 'sas', 'dany_180991@hotmail.com', 4234234, 4242424),
(12, 'asdasdasd', 'adsdasd', 'dany_180991@hotmail.com', 23542235, 523525),
(13, 'asdasdasd', 'adsdasd', 'dany_180991@hotmail.com', 23542235, 523525),
(14, 'fdgdgd', 'sfsdfsd', 'dany_180991@hotmail.com', 23542342, 234234234),
(15, 'sdfsfs', 'sdfsdf', 'dany_180991@hotmail.com', 23242, 241234123),
(16, 'sdaasdas', 'asdasda', 'dany_180991@hotmail.com', 124312421, 124124214),
(17, 'Dany', 'Andrade', 'dany_180991@hotmail.com', 2147483647, 2147483647),
(18, 'Eloisa', 'Andrade', 'dany_180991@hotmail.com', 2147483647, 2147483647),
(19, 'Eloisa', 'Andrade', 'dany_180991@hotmail.com', 2147483647, 2147483647),
(20, 'Moises', 'Andrade', 'dany_180991@hotmail.com', 991405312, 2147483647),
(21, 'Moises', 'Andrade', 'dany_180991@hotmail.com', 991405312, 2147483647),
(22, 'Moises', 'Andrade', 'dany_180991@hotmail.com', 991405312, 2147483647),
(23, 'Moises', 'Andrade', 'dany_180991@hotmail.com', 991405312, 2147483647),
(24, 'Moises', 'Andrade', 'dany_180991@hotmail.com', 991405312, 2147483647),
(25, 'Moises', 'Andrade', 'dany_180991@hotmail.com', 991405312, 2147483647),
(26, 'Moises ', 'Cevallos', 'dany_180991@hotmail.com', 989697458, 2147483647),
(27, 'Moises', 'Andrade', 'dany_180991@hotmail.com', 2147483647, 556465565),
(28, 'Moises', 'Andrade', 'dany_180991@hotmail.com', 2147483647, 556465565);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_compra`
--

CREATE TABLE IF NOT EXISTS `registro_compra` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Proveedor` text NOT NULL,
  `Tipo_Documento` text NOT NULL,
  `Fecha_Emision_Documento` text NOT NULL,
  `Nro_Documento` int(254) NOT NULL,
  `Valor_Factura` int(254) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `registro_compra`
--

INSERT INTO `registro_compra` (`Id`, `Proveedor`, `Tipo_Documento`, `Fecha_Emision_Documento`, `Nro_Documento`, `Valor_Factura`) VALUES
(1, 'Moises', 'FC', 'tres', 5000, 32),
(2, 'Juan', 'Factura', '20/04/2015', 345, 456);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_venta`
--

CREATE TABLE IF NOT EXISTS `registro_venta` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` text NOT NULL,
  `Valor_Venta` int(254) NOT NULL,
  `Tipo_Documento` text NOT NULL,
  `Nro_Documento` int(254) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `registro_venta`
--

INSERT INTO `registro_venta` (`Id`, `Fecha`, `Valor_Venta`, `Tipo_Documento`, `Nro_Documento`) VALUES
(1, '20/04/2014', 25, 'te', 25);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
