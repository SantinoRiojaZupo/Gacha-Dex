-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2025 a las 13:30:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gachadex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variant_pokemon`
--

CREATE TABLE `variant_pokemon` (
  `Id_Variant` int(11) NOT NULL,
  `Id_Pokedex` int(11) NOT NULL,
  `PokemonName` varchar(255) NOT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Second_Type` varchar(255) DEFAULT NULL,
  `Weaknesses` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Abilities` varchar(255) DEFAULT NULL,
  `Second_Abilities` varchar(255) DEFAULT NULL,
  `Abilities_Hidden` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `variant_pokemon`
--
ALTER TABLE `variant_pokemon`
  ADD PRIMARY KEY (`Id_Variant`,`Id_Pokedex`),
  ADD KEY `Id_Pokedex` (`Id_Pokedex`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `variant_pokemon`
--
ALTER TABLE `variant_pokemon`
  MODIFY `Id_Variant` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `variant_pokemon`
--
ALTER TABLE `variant_pokemon`
  ADD CONSTRAINT `variant_pokemon_ibfk_1` FOREIGN KEY (`Id_Pokedex`) REFERENCES `datapokemonall` (`Id_Pokedex`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
