-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2014 a las 16:31:17
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `lared`
--
CREATE DATABASE IF NOT EXISTS `lared` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lared`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `idpost` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `post` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idpost`),
  UNIQUE KEY `idusuario_2` (`idusuario`),
  KEY `idusuario` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`idpost`, `idusuario`, `post`, `fecha`) VALUES
(1, 5, 'tralaralirto', '2014-02-05'),
(2, 9, 'Tralari', '2014-02-06'),
(3, 3, 'tralarotoooooo', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(25) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `usuario`, `password`, `nombre`, `email`) VALUES
(3, 'prueba', '60ad727e651c046804b469f824e07123', '', 'probando@laprueba.com'),
(4, '', '', '', ''),
(5, '', '', '', ''),
(6, 'qwe', 'asd', '', 'zxc'),
(7, 'asd', 'qwe', 'asdw', 'qwev'),
(8, 'dwadaw', 'adwadw', 'adwadw', 'wadadw'),
(9, 'asd', '7815696ecbf1c96e6894b779456d330e', 'asd', 'asd@asd.com'),
(10, '', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(11, '', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(12, 'asd', 'd41d8cd98f00b204e9800998ecf8427e', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
