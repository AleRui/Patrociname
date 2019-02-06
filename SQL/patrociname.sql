-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-11-2018 a las 00:09:51
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `patrociname`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `searcher`
--

CREATE TABLE `searcher` (
  `idSearcher` int(11) NOT NULL,
  `mailSearcher` varchar(80) NOT NULL,
  `passSearcher` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `searcher`
--

INSERT INTO `searcher` (`idSearcher`, `mailSearcher`, `passSearcher`) VALUES
(1, 'buscador1@buscador.com', '202cb962ac59075b964b07152d234b70'),
(2, 'buscador2@bucados.com', '202cb962ac59075b964b07152d234b70'),
(123, 'prueba@prueba.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sponsor`
--

CREATE TABLE `sponsor` (
  `idSponsor` int(11) NOT NULL,
  `mailSponsor` varchar(80) NOT NULL,
  `passSponsor` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sponsor`
--

INSERT INTO `sponsor` (`idSponsor`, `mailSponsor`, `passSponsor`) VALUES
(123, 'sponsor1@sponsor.com', '202cb962ac59075b964b07152d234b70'),
(124, 'sponsor2@sponsor.com', '550a141f12de6341fba65b0ad0433500');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sponsorbundle`
--

CREATE TABLE `sponsorbundle` (
  `idSponsorBundle` int(11) NOT NULL,
  `idSearcher` int(11) NOT NULL,
  `sponsorWay` varchar(255) NOT NULL,
  `sponsoringCost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sponsorbundle`
--

INSERT INTO `sponsorbundle` (`idSponsorBundle`, `idSearcher`, `sponsorWay`, `sponsoringCost`) VALUES
(1, 123, 'Publicidad en camiseta del Club', '450.05'),
(2, 123, 'Publicidad en Vallas', '600.00'),
(4, 123, 'Publicidad en competiciones', '150.00'),
(5, 123, 'paquete de patrocinio total', '2300.00'),
(6, 123, 'publicidad en actos', '50.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sponsorbuysponsoring`
--

CREATE TABLE `sponsorbuysponsoring` (
  `idSponsorBundle` int(11) NOT NULL,
  `idSponsor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sponsorbuysponsoring`
--

INSERT INTO `sponsorbuysponsoring` (`idSponsorBundle`, `idSponsor`) VALUES
(1, 123),
(2, 123);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `searcher`
--
ALTER TABLE `searcher`
  ADD PRIMARY KEY (`idSearcher`);

--
-- Indices de la tabla `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`idSponsor`);

--
-- Indices de la tabla `sponsorbundle`
--
ALTER TABLE `sponsorbundle`
  ADD PRIMARY KEY (`idSponsorBundle`,`idSearcher`),
  ADD KEY `setIdSearcher` (`idSearcher`);

--
-- Indices de la tabla `sponsorbuysponsoring`
--
ALTER TABLE `sponsorbuysponsoring`
  ADD PRIMARY KEY (`idSponsorBundle`,`idSponsor`),
  ADD KEY `setFKidSposnor` (`idSponsor`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sponsorbundle`
--
ALTER TABLE `sponsorbundle`
  ADD CONSTRAINT `setIdSearcher` FOREIGN KEY (`idSearcher`) REFERENCES `searcher` (`idSearcher`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sponsorbuysponsoring`
--
ALTER TABLE `sponsorbuysponsoring`
  ADD CONSTRAINT `setFKidSponsorBundle` FOREIGN KEY (`idSponsorBundle`) REFERENCES `sponsorbundle` (`idSponsorBundle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `setFKidSposnor` FOREIGN KEY (`idSponsor`) REFERENCES `sponsor` (`idSponsor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
