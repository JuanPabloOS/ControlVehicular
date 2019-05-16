-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2019 a las 17:34:50
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controlvehicular`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores`
--

CREATE TABLE `conductores` (
  `CURP` char(18) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Firma` blob NOT NULL,
  `Donador` tinyint(1) NOT NULL,
  `TipoSangre` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Restricciones` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TelefonoEmergencia` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias`
--

CREATE TABLE `licencias` (
  `idLicencia` int(10) NOT NULL,
  `Conductor` char(18) COLLATE utf8_unicode_ci NOT NULL,
  `Expedicion` date NOT NULL,
  `Tipo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `Vencimiento` date NOT NULL,
  `Lugar` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Expide` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multas`
--

CREATE TABLE `multas` (
  `Folio` int(12) NOT NULL,
  `Licencia` int(10) NOT NULL,
  `Vehiculo` int(10) NOT NULL,
  `idOficial` int(10) NOT NULL,
  `Monto` double(7,2) NOT NULL,
  `Lugar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Fecha` date NOT NULL,
  `Motivo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE `propietarios` (
  `RFC` char(13) COLLATE utf8_unicode_ci NOT NULL,
  `CURP` char(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tenencias`
--

CREATE TABLE `tenencias` (
  `Folio` int(18) NOT NULL,
  `Vehiculo` int(10) DEFAULT NULL,
  `Annio` year(4) NOT NULL,
  `Monto` double(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `idVehiculo` int(10) NOT NULL,
  `Propietario` char(13) COLLATE utf8_unicode_ci NOT NULL,
  `Placa` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Uso` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Annio` year(4) NOT NULL,
  `Color` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Puertas` smallint(1) NOT NULL,
  `Modelo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Marca` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Transmision` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capCarga` double(8,2) DEFAULT NULL,
  `Serie` varchar(17) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numMotor` int(18) DEFAULT NULL,
  `Linea` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Sublinea` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Cilindraje` int(2) DEFAULT NULL,
  `Combustible` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Origen` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verificaciones`
--

CREATE TABLE `verificaciones` (
  `Folio` int(12) NOT NULL,
  `Vehiculo` int(10) NOT NULL,
  `Fecha` date NOT NULL,
  `Periodo` year(4) NOT NULL,
  `Dictamen` varchar(13) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD PRIMARY KEY (`CURP`);

--
-- Indices de la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD PRIMARY KEY (`idLicencia`),
  ADD KEY `Conductor` (`Conductor`);

--
-- Indices de la tabla `multas`
--
ALTER TABLE `multas`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `Licencia` (`Licencia`),
  ADD KEY `Vehiculo` (`Vehiculo`);

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`RFC`),
  ADD UNIQUE KEY `CURP` (`CURP`);

--
-- Indices de la tabla `tenencias`
--
ALTER TABLE `tenencias`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `Vehiculo` (`Vehiculo`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`idVehiculo`),
  ADD UNIQUE KEY `Placa` (`Placa`),
  ADD KEY `Propietario` (`Propietario`);

--
-- Indices de la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `Vehiculo` (`Vehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `licencias`
--
ALTER TABLE `licencias`
  MODIFY `idLicencia` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `multas`
--
ALTER TABLE `multas`
  MODIFY `Folio` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tenencias`
--
ALTER TABLE `tenencias`
  MODIFY `Folio` int(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `idVehiculo` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  MODIFY `Folio` int(12) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD CONSTRAINT `licencias_ibfk_1` FOREIGN KEY (`Conductor`) REFERENCES `conductores` (`CURP`);

--
-- Filtros para la tabla `multas`
--
ALTER TABLE `multas`
  ADD CONSTRAINT `multas_ibfk_1` FOREIGN KEY (`Licencia`) REFERENCES `licencias` (`idLicencia`),
  ADD CONSTRAINT `multas_ibfk_2` FOREIGN KEY (`Vehiculo`) REFERENCES `vehiculos` (`idVehiculo`);

--
-- Filtros para la tabla `tenencias`
--
ALTER TABLE `tenencias`
  ADD CONSTRAINT `tenencias_ibfk_1` FOREIGN KEY (`Vehiculo`) REFERENCES `vehiculos` (`idVehiculo`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`Propietario`) REFERENCES `propietarios` (`RFC`);

--
-- Filtros para la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  ADD CONSTRAINT `verificaciones_ibfk_1` FOREIGN KEY (`Vehiculo`) REFERENCES `vehiculos` (`idVehiculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
