-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2025 a las 03:12:52
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 8.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `GachaDex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DatePokemonAll`
--

CREATE TABLE `DatePokemonAll` (
  `PokemonName` varchar(255) NOT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Weaknesses` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Abilities` varchar(255) DEFAULT NULL,
  `Abilities_Hidden` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PokemonCatched`
--

CREATE TABLE `PokemonCatched` (
  `Id_User` int(11) NOT NULL,
  `PokemonName` varchar(255) NOT NULL,
  `Id_PokemonCatched` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

CREATE TABLE `Users` (
  `Id_User` int(11) NOT NULL,
  `Name_User` varchar(255) NOT NULL,
  `User_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `DatePokemonAll`
--
ALTER TABLE `DatePokemonAll`
  ADD PRIMARY KEY (`PokemonName`);

--
-- Indices de la tabla `PokemonCatched`
--
ALTER TABLE `PokemonCatched`
  ADD PRIMARY KEY (`Id_User`,`PokemonName`),
  ADD UNIQUE KEY `Id_PokemonCatched` (`Id_PokemonCatched`),
  ADD KEY `PokemonName` (`PokemonName`);

--
-- Indices de la tabla `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id_User`),
  ADD UNIQUE KEY `Name_User` (`Name_User`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `PokemonCatched`
--
ALTER TABLE `PokemonCatched`
  MODIFY `Id_PokemonCatched` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Users`
--
ALTER TABLE `Users`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `PokemonCatched`
--
ALTER TABLE `PokemonCatched`
  ADD CONSTRAINT `PokemonCatched_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `Users` (`Id_User`),
  ADD CONSTRAINT `PokemonCatched_ibfk_2` FOREIGN KEY (`PokemonName`) REFERENCES `DatePokemonAll` (`PokemonName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
