-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-05-2019 a las 16:41:56
-- Versión del servidor: 10.1.38-MariaDB-0ubuntu0.18.04.2
-- Versión de PHP: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `rols`
--

CREATE TABLE `rols` (
  `idRol` int(11) NOT NULL,
  `namRol` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rols`
--

INSERT INTO `rols` (`idRol`, `namRol`) VALUES
(1, 'searcher'),
(2, 'sponsor'),
(3, 'admin');

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
(3, 'nuevo@nueva.com', '202cb962ac59075b964b07152d234b70'),
(4, 'nuevo@nuevooo.com', '202cb962ac59075b964b07152d234b70'),
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
  `sponsoringCost` decimal(10,2) NOT NULL,
  `sponsorIma` varchar(255) DEFAULT NULL,
  `sponsorDateCreated` datetime NOT NULL,
  `sponsorDuration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sponsorbundle`
--

INSERT INTO `sponsorbundle` (`idSponsorBundle`, `idSearcher`, `sponsorWay`, `sponsoringCost`, `sponsorIma`, `sponsorDateCreated`, `sponsorDuration`) VALUES
(1, 123, 'Publicidad en camiseta del Club al año', '450.00', 'assets/sponsorImas/t-shirt_one.png', '2019-05-06 17:33:20', 3),
(2, 123, 'Publicidad Sudaddera con duracion', '234.00', 'assets/sponsorImas/saudadera.jpg', '2019-05-30 11:25:57', 13),
(3, 123, 'Publicidad en Gorras', '200.00', 'assets/sponsorImas/cap.jpg', '2019-01-07 19:35:41', 8),
(4, 123, 'Publicidad en Sudadera', '2500.00', 'assets/sponsorImas/saudadera.jpg', '2019-05-30 10:44:05', 24),
(5, 123, 'nueva publicidad', '435.00', '', '2019-05-30 16:41:02', 4),
(8, 1, 'la publicidad', '1234.00', 'assets/sponsorImas/vallas_publicitarias.jpg', '2019-04-22 22:26:38', 18);

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
(1, 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `idUsr` int(11) NOT NULL,
  `emaUsr` varchar(254) NOT NULL,
  `pswUsr` varchar(128) NOT NULL,
  `rolUsr` int(11) NOT NULL,
  `fnamUsr` varchar(80) DEFAULT NULL,
  `lnamUsr` varchar(80) DEFAULT NULL,
  `tlfUsr` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idUsr`, `emaUsr`, `pswUsr`, `rolUsr`, `fnamUsr`, `lnamUsr`, `tlfUsr`) VALUES
(123, 'prueba', '202cb962ac59075b964b07152d234b70', 1, 'PruebaNombre', 'PruebaApellido', '611622633');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`idRol`);

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
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUsr`),
  ADD KEY `putRolInUser` (`rolUsr`);

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

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `putRolInUser` FOREIGN KEY (`rolUsr`) REFERENCES `rols` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
