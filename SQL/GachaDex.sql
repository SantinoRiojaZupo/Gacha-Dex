-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2025 a las 17:30:42
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
('Arbok', 'Poison', '', 'Ground, Psychic', 'El dibujo que tiene en el vientre parece una cara terrorífica. Los rivales más débiles salen huyendo nada más verlo.', 'Intimidate', 'Shed Skin', 'Unnerve', 'https://archives.bulbagarden.net/media/upload/5/51/0024Arbok.png', 'Male/Female'),
('Beedrill', 'Bug', 'Poison', 'Fire, Flying, Psychic, Rock', 'Tiene tres aguijones venenosos, dos en las patas anteriores y uno en la parte baja del abdomen, con los que ataca a sus enemigos una y otra vez.', 'Swarm', '', 'Sniper', 'https://archives.bulbagarden.net/media/upload/f/f7/0015Beedrill.png', 'Male/Female'),
('Blastoise', 'Water', '', 'Grass, Electric', 'Aumenta de peso deliberadamente para contrarrestar la fuerza de los chorros de agua que dispara.', 'Torrent', '', 'Rain Dish', 'https://archives.bulbagarden.net/media/upload/0/0a/0009Blastoise.png', 'Male/Female'),
('Bulbasaur', 'Grass', 'Poison', 'Fire, Ice, Flying, Psychic', 'Tras nacer, crece alimentándose durante un tiempo de los nutrientes que contiene el bulbo de su lomo.', 'Overgrow', '', 'Chlorophyll', 'https://static.wikia.nocookie.net/pokemon/images/f/fb/0001Bulbasaur.png/revision/latest?cb=20240903144321%27,%27', 'Male/Female'),
('Butterfree', 'Bug', 'Flying', 'Fire, Electric, Ice, Flying, Rock(X4)', 'Adora el néctar de las flores. Una pequeña cantidad de polen le basta para localizar prados floridos.', 'Compound Eyes', '', 'Tinted Lens', 'https://archives.bulbagarden.net/media/upload/5/55/0012Butterfree.png', 'Male/Female'),
('Caterpie', 'Bug', '', 'Fire, Flying, Rock', 'Para protegerse, despide un hedor horrible por las antenas con el que repele a sus enemigos.', 'Shield Dust', '', 'Run Away', 'https://archives.bulbagarden.net/media/upload/5/5e/0010Caterpie.png', 'Male/Female'),
('Charizard', 'Fire', 'Flying', 'Water, Electric, Rock(X4)', 'Cuando se enfurece de verdad, la llama de la punta de su cola se vuelve de color azul claro.', 'Blaze', '', 'Solar Power', 'https://archives.bulbagarden.net/media/upload/3/38/0006Charizard.png', 'Male/Female'),
('Charmander', 'Fire', '', 'Water, Ground, Rock', 'La llama de su cola indica su fuerza vital. Si está débil, la llama arderá más tenue.', 'Blaze', '', 'Solar Power', 'https://archives.bulbagarden.net/media/upload/2/27/0004Charmander.png', 'Male/Female'),
('Charmeleon', 'Fire', '', 'Water, Ground, Rock', 'Al agitar su ardiente cola, eleva poco a poco la temperatura a su alrededor para sofocar a sus rivales.', 'Blaze', '', 'Solar Power', 'https://archives.bulbagarden.net/media/upload/0/05/0005Charmeleon.png', 'Male/Female'),
('Ekans', 'Poison', '', 'Ground, Psychic', 'Puede desencajar la mandíbula libremente para engullir grandes presas, aunque esto le dificulte el movimiento por pesar demasiado.', 'Intimidate', 'Shed Skin', 'Unnerve', 'https://archives.bulbagarden.net/media/upload/d/d2/0023Ekans.png', 'Male/Female'),
('Fearow', 'Normal', 'Flying', 'Electric, Ice, Rock', 'Este Pokémon ha existido desde tiempos remotos. Al menor atisbo de peligro, alza el vuelo y huye.', 'Keen Eye', '', 'Sniper', 'https://archives.bulbagarden.net/media/upload/2/2d/0021Spearow.png', 'Male/Female'),
('Ivysaur', 'Grass', 'Poison', 'Fire, Ice, Flying, Psychic', 'Cuanta más luz solar recibe, más aumenta su fuerza y más se desarrolla el capullo que tiene en el lomo.', 'Overgrow', '', 'Chlorophyll', 'https://archives.bulbagarden.net/media/upload/thumb/8/81/0002Ivysaur.png/250px-0002Ivysaur.png', 'Male/Female'),
('Kakuna', 'Bug', 'Poison', 'Fire, Flying, Psychic, Rock', 'Aunque es casi incapaz de moverse, en caso de sentirse amenazado puede envenenar a los enemigos con su aguijón.', 'Shed Skin', '', '', 'https://archives.bulbagarden.net/media/upload/f/f3/0014Kakuna.png', 'Male/Female'),
('Metapod', 'Bug', '', 'Fire, Flying, Rock', 'Como en este estado solo puede endurecer su coraza, permanece inmóvil a la espera de evolucionar.', 'Shed Skin', '', '', 'https://archives.bulbagarden.net/media/upload/d/da/0011Metapod.png', 'Male/Female'),
('Nidoking', 'Poison', 'Ground', 'Water, Ice, Ground, Psychic', 'Una vez que se desboca, no hay quien lo pare. Solo se calma ante Nidoqueen, su compañera de toda la vida.', 'Poison Point', 'Rivalry', 'Sheer Force', 'https://archives.bulbagarden.net/media/upload/2/21/0034Nidoking.png', 'Male'),
('Nidoqueen', 'Poison', 'Ground', 'Water, Ice, Ground, Psychic', 'Su defensa destaca sobre la capacidad ofensiva. Usa las escamas del cuerpo como una coraza para proteger a su prole de cualquier ataque.', 'Poison Point', 'Rivalry', 'Sheer Force', 'https://archives.bulbagarden.net/media/upload/9/9d/0031Nidoqueen.png', 'Female'),
('Nidoran(Female)', 'Poison', '', 'Ground, Psychic', 'Posee un olfato más fino que los Nidoran?. Usa los bigotes para percibir la dirección del viento y buscar comida a sotavento de sus depredadores.', 'Poison Point', 'Rivalry', 'Hustle', 'https://archives.bulbagarden.net/media/upload/b/b2/0029Nidoran.png', 'Female'),
('Nidoran(Male)', 'Poison', '', 'Ground, Psychic', 'Mantiene sus grandes orejas levantadas, siempre alerta. Si advierte peligro, ataca inoculando una potente toxina con su cuerno frontal.', 'Poison Point', 'Rivalry', 'Hustle', 'https://archives.bulbagarden.net/media/upload/8/8c/0032Nidoran.png', 'Male'),
('Nidorina', 'Poison', '', 'Ground, Psychic', 'Se cree que el cuerno de la frente se le ha atrofiado para evitar herir a sus crías al alimentarlas.', 'Poison Point', 'Rivalry', 'Hustle', 'https://archives.bulbagarden.net/media/upload/e/ea/0030Nidorina.png', 'Female'),
('Nidorino', 'Poison', '', 'Ground, Psychic', 'Dondequiera que va, parte rocas con su cuerno, más duro que un diamante, en busca de una Piedra Lunar.', 'Poison Point', 'Rivalry', 'Hustle', 'https://archives.bulbagarden.net/media/upload/8/8c/0032Nidoran.png', 'Male'),
('Pidgeot', 'Normal', 'Flying', 'Electric, Ice, Rock', 'Este Pokémon vuela a una velocidad de 2 mach en busca de presas. Sus grandes garras son armas muy peligrosas.', 'Keen Eye', 'Tangled Feet', 'Big Pecks', 'https://archives.bulbagarden.net/media/upload/7/73/0018Pidgeot.png', 'Male/Female'),
('Pidgeotto', 'Normal', 'Flying', 'Electric, Ice, Rock', 'Su extraordinaria vitalidad y resistencia le permiten cubrir grandes distancias del territorio que habita en busca de presas.', 'Keen Eye', 'Tangled Feet', 'Big Pecks', 'https://archives.bulbagarden.net/media/upload/8/82/0017Pidgeotto.png', 'Male/Female'),
('Pidgey', 'Normal', 'Flying', 'Electric, Ice, Rock', 'Su docilidad es tal que suelen defenderse levantando arena en lugar de contraatacar.', 'Keen Eye', 'Tangled Feet', 'Big Pecks', 'https://archives.bulbagarden.net/media/upload/0/0c/0016Pidgey.png', 'Male/Female'),
('Pikachu', 'Electric', '', 'Ground', 'Cuando se enfada, este Pokémon descarga la energía que almacena en el interior de las bolsas de las mejillas.', 'Static', '', 'Lightning Rod', 'https://archives.bulbagarden.net/media/upload/4/4a/0025Pikachu.png', 'Male/Female'),
('Raichu', 'Electric', '', 'Ground', 'Su cola actúa como toma de tierra y descarga electricidad al suelo, lo que le protege de los calambrazos.', 'Static', '', 'Lightning Rod', 'https://archives.bulbagarden.net/media/upload/b/b0/0026Raichu.png', 'Male/Female'),
('Raticate', 'Normal', '', 'Fighting', 'Gracias a las pequeñas membranas de las patas traseras, puede nadar por los ríos para capturar presas.', 'Run Away', 'Guts', 'Hustle', 'https://archives.bulbagarden.net/media/upload/2/2c/0020Raticate.png', 'Male/Female'),
('Rattata', 'Normal', '', 'Fighting', 'Es propenso a hincar los incisivos en cualquier cosa que se le ponga por delante. Si se ve alguno, seguramente haya cuarenta cerca.', 'Run Away', 'Guts', 'Hustle', 'https://archives.bulbagarden.net/media/upload/a/aa/0019Rattata.png', 'Male/Female'),
('Sandshrew', 'Ground', '', 'Water, Grass, Ice', 'Excava madrigueras profundas en las que vive. Cuando lo ataca algún enemigo, se hace una bola y aguanta pacientemente sus embates.', 'Sand Veil', '', 'Sand Rush', 'https://archives.bulbagarden.net/media/upload/e/e9/0027Sandshrew.png', 'Male/Female'),
('Sandslash', 'Ground', '', 'Water, Grass, Ice', 'Corre de un lado a otro a toda velocidad al tiempo que ataca hábilmente con las púas que tiene en la espalda y con sus afiladas garras.', 'Sand Veil', '', 'Sand Rush', 'https://archives.bulbagarden.net/media/upload/e/e9/0027Sandshrew.png', 'Male/Female'),
('Spearow', 'Normal', 'Flying', 'Electric, Ice, Rock', 'A la hora de proteger su territorio, compensa su incapacidad para volar a gran altura con una increíble velocidad.', 'Keen Eye', '', 'Sniper', 'https://archives.bulbagarden.net/media/upload/2/2d/0021Spearow.png', 'Male/Female'),
('Squirtle', 'Water', '', 'Grass, Electric', 'Tras nacer, se le hincha el lomo y se le forma un caparazón. Escupe poderosa espuma por la boca.', 'Torrent', '', 'Rain Dish', 'https://archives.bulbagarden.net/media/upload/5/54/0007Squirtle.png', 'Male/Female'),
('Venusaur', 'Grass', 'Poison', 'Fire, Ice, Flying, Psychic', 'Puede convertir la luz del sol en energía. Por esa razón, es más poderoso en verano.', 'Overgrow', '', 'Chlorophyll', 'https://archives.bulbagarden.net/media/upload/thumb/6/6b/0003Venusaur.png/250px-0003Venusaur.png', 'Male/Female'),
('Wartortle', 'Water', '', 'Grass, Electric', 'Tiene una cola larga y peluda que simboliza la longevidad y lo hace popular entre los mayores.', 'Torrent', '', 'Rain Dish', 'https://archives.bulbagarden.net/media/upload/0/0f/0008Wartortle.png', 'Male/Female'),
('Weedle', 'Bug', 'Poison', 'Fire, Flying, Psychic, Rock', 'El aguijón de la cabeza es muy puntiagudo. Se alimenta de hojas oculto en la espesura de bosques y praderas.', 'Shield Dust', '', 'Run Away', 'https://archives.bulbagarden.net/media/upload/3/36/0013Weedle.png', 'Male/Female');

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
