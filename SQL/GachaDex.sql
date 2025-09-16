-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2025 a las 14:22:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

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
-- Estructura de tabla para la tabla `datepokemonall`
--

CREATE TABLE `datepokemonall` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `datepokemonall`
--

INSERT INTO `datepokemonall` (`PokemonName`, `Type`, `Second_Type`, `Weaknesses`, `Description`, `Abilities`, `Second_Abilities`, `Abilities_Hidden`, `Image`, `Gender`) VALUES
('Bulbasaur', 'Grass', 'Poison', 'Fire, Ice, Flying, Psychic', 'Tras nacer, crece alimentándose durante un tiempo de los nutrientes que contiene el bulbo de su lomo.', 'Overgrow', '', 'Chlorophyll', 'https://static.wikia.nocookie.net/pokemon/images/f/fb/0001Bulbasaur.png/revision/latest?cb=20240903144321%27,%27', 'Male/Female'),
('Ivysaur', 'Grass', 'Poison', 'Fire, Ice, Flying, Psychic', 'Cuanta más luz solar recibe, más aumenta su fuerza y más se desarrolla el capullo que tiene en el lomo.', 'Overgrow', '', 'Chlorophyll', 'https://archives.bulbagarden.net/media/upload/thumb/8/81/0002Ivysaur.png/250px-0002Ivysaur.png', 'Male/Female'),
('Venusaur', 'Grass', 'Poison', 'Fire, Ice, Flying, Psychic', 'Puede convertir la luz del sol en energía. Por esa razón, es más poderoso en verano.', 'Overgrow', '', 'Chlorophyll', 'https://archives.bulbagarden.net/media/upload/thumb/6/6b/0003Venusaur.png/250px-0003Venusaur.png', 'Male/Female');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemoncatched`
--

CREATE TABLE `pokemoncatched` (
  `Id_User` int(11) NOT NULL,
  `PokemonName` varchar(255) NOT NULL,
  `Id_PokemonCatched` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `Id_User` int(11) NOT NULL,
  `Name_User` varchar(255) NOT NULL,
  `User_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datepokemonall`
--
ALTER TABLE `datepokemonall`
  ADD PRIMARY KEY (`PokemonName`);

--
-- Indices de la tabla `pokemoncatched`
--
ALTER TABLE `pokemoncatched`
  ADD PRIMARY KEY (`Id_User`,`PokemonName`),
  ADD UNIQUE KEY `Id_PokemonCatched` (`Id_PokemonCatched`),
  ADD KEY `PokemonName` (`PokemonName`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id_User`),
  ADD UNIQUE KEY `Name_User` (`Name_User`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pokemoncatched`
--
ALTER TABLE `pokemoncatched`
  MODIFY `Id_PokemonCatched` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pokemoncatched`
--
ALTER TABLE `pokemoncatched`
  ADD CONSTRAINT `PokemonCatched_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `users` (`Id_User`),
  ADD CONSTRAINT `PokemonCatched_ibfk_2` FOREIGN KEY (`PokemonName`) REFERENCES `datepokemonall` (`PokemonName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
