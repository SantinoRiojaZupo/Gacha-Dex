-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2025 a las 05:27:06
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
-- Estructura de tabla para la tabla `datapokemonall`
--

CREATE TABLE `datapokemonall` (
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
-- Volcado de datos para la tabla `datapokemonall`
--

INSERT INTO `datapokemonall` (`Id_Pokedex`, `PokemonName`, `Type`, `Second_Type`, `Weaknesses`, `Description`, `Abilities`, `Second_Abilities`, `Abilities_Hidden`, `Image`, `Gender`) VALUES
(1, 'Bulbasaur', 'Grass', 'Poison', 'Fire, Ice, Flying, Psychic', 'Tras nacer, crece alimentándose durante un tiempo de los nutrientes que contiene el bulbo de su lomo.', 'Overgrow', '', 'Chlorophyll', 'https://static.wikia.nocookie.net/pokemon/images/f/fb/0001Bulbasaur.png/revision/latest?cb=20240903144321%27,%27', 'Male/Female'),
(2, 'Ivysaur', 'Grass', 'Poison', 'Fire, Ice, Flying, Psychic', 'Cuanta más luz solar recibe, más aumenta su fuerza y más se desarrolla el capullo que tiene en el lomo.', 'Overgrow', '', 'Chlorophyll', 'https://archives.bulbagarden.net/media/upload/thumb/8/81/0002Ivysaur.png/250px-0002Ivysaur.png', 'Male/Female'),
(3, 'Venusaur', 'Grass', 'Poison', 'Fire, Ice, Flying, Psychic', 'Puede convertir la luz del sol en energía. Por esa razón, es más poderoso en verano.', 'Overgrow', '', 'Chlorophyll', 'https://archives.bulbagarden.net/media/upload/thumb/6/6b/0003Venusaur.png/250px-0003Venusaur.png', 'Male/Female'),
(4, 'Charmander', 'Fire', '', 'Water, Ground, Rock', 'La llama de su cola indica su fuerza vital. Si está débil, la llama arderá más tenue.', 'Blaze', '', 'Solar Power', 'https://archives.bulbagarden.net/media/upload/2/27/0004Charmander.png', 'Male/Female'),
(5, 'Charmeleon', 'Fire', '', 'Water, Ground, Rock', 'Al agitar su ardiente cola, eleva poco a poco la temperatura a su alrededor para sofocar a sus rivales.', 'Blaze', '', 'Solar Power', 'https://archives.bulbagarden.net/media/upload/0/05/0005Charmeleon.png', 'Male/Female'),
(6, 'Charizard', 'Fire', 'Flying', 'Water, Electric, Rock(X4)', 'Cuando se enfurece de verdad, la llama de la punta de su cola se vuelve de color azul claro.', 'Blaze', '', 'Solar Power', 'https://archives.bulbagarden.net/media/upload/3/38/0006Charizard.png', 'Male/Female'),
(7, 'Squirtle', 'Water', '', 'Grass, Electric', 'Tras nacer, se le hincha el lomo y se le forma un caparazón. Escupe poderosa espuma por la boca.', 'Torrent', '', 'Rain Dish', 'https://archives.bulbagarden.net/media/upload/5/54/0007Squirtle.png', 'Male/Female'),
(8, 'Wartortle', 'Water', '', 'Grass, Electric', 'Tiene una cola larga y peluda que simboliza la longevidad y lo hace popular entre los mayores.', 'Torrent', '', 'Rain Dish', 'https://archives.bulbagarden.net/media/upload/0/0f/0008Wartortle.png', 'Male/Female'),
(9, 'Blastoise', 'Water', '', 'Grass, Electric', 'Aumenta de peso deliberadamente para contrarrestar la fuerza de los chorros de agua que dispara.', 'Torrent', '', 'Rain Dish', 'https://archives.bulbagarden.net/media/upload/0/0a/0009Blastoise.png', 'Male/Female'),
(10, 'Caterpie', 'Bug', '', 'Fire, Flying, Rock', 'Para protegerse, despide un hedor horrible por las antenas con el que repele a sus enemigos.', 'Shield Dust', '', 'Run Away', 'https://archives.bulbagarden.net/media/upload/5/5e/0010Caterpie.png', 'Male/Female'),
(11, 'Metapod', 'Bug', '', 'Fire, Flying, Rock', 'Como en este estado solo puede endurecer su coraza, permanece inmóvil a la espera de evolucionar.', 'Shed Skin', '', '', 'https://archives.bulbagarden.net/media/upload/d/da/0011Metapod.png', 'Male/Female'),
(12, 'Butterfree', 'Bug', 'Flying', 'Fire, Electric, Ice, Flying, Rock(X4)', 'Adora el néctar de las flores. Una pequeña cantidad de polen le basta para localizar prados floridos.', 'Compound Eyes', '', 'Tinted Lens', 'https://archives.bulbagarden.net/media/upload/5/55/0012Butterfree.png', 'Male/Female'),
(13, 'Weedle', 'Bug', 'Poison', 'Fire, Flying, Psychic, Rock', 'El aguijón de la cabeza es muy puntiagudo. Se alimenta de hojas oculto en la espesura de bosques y praderas.', 'Shield Dust', '', 'Run Away', 'https://archives.bulbagarden.net/media/upload/3/36/0013Weedle.png', 'Male/Female'),
(14, 'Kakuna', 'Bug', 'Poison', 'Fire, Flying, Psychic, Rock', 'Aunque es casi incapaz de moverse, en caso de sentirse amenazado puede envenenar a los enemigos con su aguijón.', 'Shed Skin', '', '', 'https://archives.bulbagarden.net/media/upload/f/f3/0014Kakuna.png', 'Male/Female'),
(15, 'Beedrill', 'Bug', 'Poison', 'Fire, Flying, Psychic, Rock', 'Tiene tres aguijones venenosos, dos en las patas anteriores y uno en la parte baja del abdomen, con los que ataca a sus enemigos una y otra vez.', 'Swarm', '', 'Sniper', 'https://archives.bulbagarden.net/media/upload/f/f7/0015Beedrill.png', 'Male/Female'),
(16, 'Pidgey', 'Normal', 'Flying', 'Electric, Ice, Rock', 'Su docilidad es tal que suelen defenderse levantando arena en lugar de contraatacar.', 'Keen Eye', 'Tangled Feet', 'Big Pecks', 'https://archives.bulbagarden.net/media/upload/0/0c/0016Pidgey.png', 'Male/Female'),
(17, 'Pidgeotto', 'Normal', 'Flying', 'Electric, Ice, Rock', 'Su extraordinaria vitalidad y resistencia le permiten cubrir grandes distancias del territorio que habita en busca de presas.', 'Keen Eye', 'Tangled Feet', 'Big Pecks', 'https://archives.bulbagarden.net/media/upload/8/82/0017Pidgeotto.png', 'Male/Female'),
(18, 'Pidgeot', 'Normal', 'Flying', 'Electric, Ice, Rock', 'Este Pokémon vuela a una velocidad de 2 mach en busca de presas. Sus grandes garras son armas muy peligrosas.', 'Keen Eye', 'Tangled Feet', 'Big Pecks', 'https://archives.bulbagarden.net/media/upload/7/73/0018Pidgeot.png', 'Male/Female'),
(19, 'Rattata', 'Normal', '', 'Fighting', 'Es propenso a hincar los incisivos en cualquier cosa que se le ponga por delante. Si se ve alguno, seguramente haya cuarenta cerca.', 'Run Away', 'Guts', 'Hustle', 'https://archives.bulbagarden.net/media/upload/a/aa/0019Rattata.png', 'Male/Female'),
(20, 'Raticate', 'Normal', '', 'Fighting', 'Gracias a las pequeñas membranas de las patas traseras, puede nadar por los ríos para capturar presas.', 'Run Away', 'Guts', 'Hustle', 'https://archives.bulbagarden.net/media/upload/2/2c/0020Raticate.png', 'Male/Female'),
(21, 'Spearow', 'Normal', 'Flying', 'Electric, Ice, Rock', 'A la hora de proteger su territorio, compensa su incapacidad para volar a gran altura con una increíble velocidad.', 'Keen Eye', '', 'Sniper', 'https://archives.bulbagarden.net/media/upload/2/2d/0021Spearow.png', 'Male/Female'),
(22, 'Fearow', 'Normal', 'Flying', 'Electric, Ice, Rock', 'Este Pokémon ha existido desde tiempos remotos. Al menor atisbo de peligro, alza el vuelo y huye.', 'Keen Eye', '', 'Sniper', 'https://archives.bulbagarden.net/media/upload/9/92/0022Fearow.png', 'Male/Female'),
(23, 'Ekans', 'Poison', '', 'Ground, Psychic', 'Puede desencajar la mandíbula libremente para engullir grandes presas, aunque esto le dificulte el movimiento por pesar demasiado.', 'Intimidate', 'Shed Skin', 'Unnerve', 'https://archives.bulbagarden.net/media/upload/d/d2/0023Ekans.png', 'Male/Female'),
(24, 'Arbok', 'Poison', '', 'Ground, Psychic', 'El dibujo que tiene en el vientre parece una cara terrorífica. Los rivales más débiles salen huyendo nada más verlo.', 'Intimidate', 'Shed Skin', 'Unnerve', 'https://archives.bulbagarden.net/media/upload/5/51/0024Arbok.png', 'Male/Female'),
(25, 'Pikachu', 'Electric', '', 'Ground', 'Cuando se enfada, este Pokémon descarga la energía que almacena en el interior de las bolsas de las mejillas.', 'Static', '', 'Lightning Rod', 'https://archives.bulbagarden.net/media/upload/4/4a/0025Pikachu.png', 'Male/Female'),
(26, 'Raichu', 'Electric', '', 'Ground', 'Su cola actúa como toma de tierra y descarga electricidad al suelo, lo que le protege de los calambrazos.', 'Static', '', 'Lightning Rod', 'https://archives.bulbagarden.net/media/upload/b/b0/0026Raichu.png', 'Male/Female'),
(27, 'Sandshrew', 'Ground', '', 'Water, Grass, Ice', 'Excava madrigueras profundas en las que vive. Cuando lo ataca algún enemigo, se hace una bola y aguanta pacientemente sus embates.', 'Sand Veil', '', 'Sand Rush', 'https://archives.bulbagarden.net/media/upload/e/e9/0027Sandshrew.png', 'Male/Female'),
(28, 'Sandslash', 'Ground', '', 'Water, Grass, Ice', 'Corre de un lado a otro a toda velocidad al tiempo que ataca hábilmente con las púas que tiene en la espalda y con sus afiladas garras.', 'Sand Veil', '', 'Sand Rush', 'https://archives.bulbagarden.net/media/upload/a/a4/0028Sandslash.png', 'Male/Female'),
(29, 'Nidoran(Female)', 'Poison', '', 'Ground, Psychic', 'Posee un olfato más fino que los Nidoran?. Usa los bigotes para percibir la dirección del viento y buscar comida a sotavento de sus depredadores.', 'Poison Point', 'Rivalry', 'Hustle', 'https://archives.bulbagarden.net/media/upload/b/b2/0029Nidoran.png', 'Female'),
(30, 'Nidorina', 'Poison', '', 'Ground, Psychic', 'Se cree que el cuerno de la frente se le ha atrofiado para evitar herir a sus crías al alimentarlas.', 'Poison Point', 'Rivalry', 'Hustle', 'https://archives.bulbagarden.net/media/upload/e/ea/0030Nidorina.png', 'Female'),
(31, 'Nidoqueen', 'Poison', 'Ground', 'Water, Ice, Ground, Psychic', 'Su defensa destaca sobre la capacidad ofensiva. Usa las escamas del cuerpo como una coraza para proteger a su prole de cualquier ataque.', 'Poison Point', 'Rivalry', 'Sheer Force', 'https://archives.bulbagarden.net/media/upload/9/9d/0031Nidoqueen.png', 'Female'),
(32, 'Nidoran(Male)', 'Poison', '', 'Ground, Psychic', 'Mantiene sus grandes orejas levantadas, siempre alerta. Si advierte peligro, ataca inoculando una potente toxina con su cuerno frontal.', 'Poison Point', 'Rivalry', 'Hustle', 'https://archives.bulbagarden.net/media/upload/8/8c/0032Nidoran.png', 'Male'),
(33, 'Nidorino', 'Poison', '', 'Ground, Psychic', 'Dondequiera que va, parte rocas con su cuerno, más duro que un diamante, en busca de una Piedra Lunar.', 'Poison Point', 'Rivalry', 'Hustle', 'https://archives.bulbagarden.net/media/upload/1/1e/0033Nidorino.png', 'Male'),
(34, 'Nidoking', 'Poison', 'Ground', 'Water, Ice, Ground, Psychic', 'Una vez que se desboca, no hay quien lo pare. Solo se calma ante Nidoqueen, su compañera de toda la vida.', 'Poison Point', 'Rivalry', 'Sheer Force', 'https://archives.bulbagarden.net/media/upload/2/21/0034Nidoking.png', 'Male'),
(35, 'Clefairy', 'Fairy', '', 'Poison, Steel', 'En las noches de luna llena, Clefairy de diversos lugares se reúnen para bailar bajo su luz, la cual los hace flotar.', 'Cute Charm', 'Magic Guard', 'Friend Guard', 'https://archives.bulbagarden.net/media/upload/b/b7/0035Clefairy.png', 'Male/Female'),
(36, 'Clefable', 'Fairy', '', 'Poison, Steel', 'Se dice que este Pokémon emparentado con las hadas vive en zonas tranquilas en lo profundo de las montañas, ya que odia que lo vean.', 'Cute Charm', 'Magic Guard', 'Unaware', 'https://archives.bulbagarden.net/media/upload/a/a4/0036Clefable.png', 'Male/Female'),
(37, 'Vulpix', 'Fire', '', 'Water, Ground, Rock', 'Si lo ataca un enemigo más fuerte que él, finge estar herido para confundirlo y huir en cuanto baja la guardia.', 'Flash Fire', '', 'Drought', 'https://archives.bulbagarden.net/media/upload/0/06/0037Vulpix.png', 'Male/Female'),
(38, 'Ninetales', 'Fire', '', 'Water, Ground, Rock', 'Cuentan algunas leyendas que cada una de sus nueve colas posee su propio y único poder sobrenatural.', 'Flash Fire', '', 'Drought', 'https://archives.bulbagarden.net/media/upload/3/3e/0038Ninetales.png', 'Male/Female'),
(39, 'Jigglypuff', 'Normal', 'Fairy', 'Poison, Steel', 'Cuando le tiemblan sus redondos y adorables ojos, entona una melodía agradable y misteriosa con la que duerme a sus enemigos.', 'Cute Charm', 'Competitive', 'Friend Guard', 'https://archives.bulbagarden.net/media/upload/3/3a/0039Jigglypuff.png', 'Male/Female'),
(40, 'Wigglytuff', 'Normal', 'Fairy', 'Poison, Steel', 'Tiene un pelaje muy fino. Se recomienda no enfadarlo, o se inflará y golpeará con todo su cuerpo.', 'Cute Charm', 'Competitive', 'Frisk', 'https://archives.bulbagarden.net/media/upload/e/e2/0040Wigglytuff.png', 'Male/Female'),
(41, 'Zubat', 'Poison', 'Flying', 'Electric, Ice, Psychic, Rock', 'Emite ondas ultrasónicas por la boca para escrutar el entorno, lo que le permite volar con pericia por cuevas angostas.', 'Inner Focus', '', 'Infiltrator', 'https://archives.bulbagarden.net/media/upload/4/4c/0041Zubat.png', 'Male/Female'),
(42, 'Golbat', 'Poison', 'Flying', 'Electric, Ice, Psychic, Rock', 'Le encanta chuparles la sangre a los seres vivos. En ocasiones comparte la preciada colecta con otros congéneres hambrientos.', 'Inner Focus', '', 'Infiltrator', '', 'Male/Female'),
(43, 'Oddish', 'Grass', 'Poison', 'Fire, Ice, Flying, Psychic', 'Su nombre científico es Oddium viandantis. Se dice que, cuando cae la noche, puede llegar a desplazarse hasta 300 m con sus dos raíces.', 'Chlorophyll', '', 'Run Away', 'https://archives.bulbagarden.net/media/upload/1/16/0043Oddish.png', 'Male/Female'),
(44, 'Gloom', 'Grass', 'Poison', 'Fire, Ice, Flying, Psychic', 'El fluido que le cae lentamente de la boca no es saliva, sino una especie de néctar que utiliza para atraer a sus presas.', 'Chlorophyll', '', 'Stench', 'https://archives.bulbagarden.net/media/upload/e/e0/0044Gloom.png', 'Male/Female'),
(45, 'Vileplume', 'Grass', 'Poison', 'Fire, Ice, Flying, Psychic', 'El capullo florece de golpe con un chasquido, tras lo cual comienza a desprender un polen alergénico y venenoso.', 'Chlorophyll', '', 'Effect Spore', 'https://archives.bulbagarden.net/media/upload/8/89/0045Vileplume.png', 'Male/Female'),
(46, 'Paras', 'Bug', 'Grass', 'Fire(X4), Ice, Poison, Flying(X4), Bug, Rock', 'Escarba en el suelo para extraer nutrientes de las raíces de los árboles, que las setas del lomo absorben después casi por completo.', 'Effect Spore', 'Dry Skin', 'Damp', 'https://archives.bulbagarden.net/media/upload/8/8a/0046Paras.png', 'Male/Female'),
(47, 'Parasect', 'Bug', 'Grass', 'Fire(X4), Ice, Poison, Flying(X4), Bug, Rock', 'Tras largo tiempo absorbiendo la energía del huésped, la seta parásita del lomo es la que parece controlar la voluntad de este Pokémon.', 'Effect Spore', 'Dry Skin', 'Damp', 'https://archives.bulbagarden.net/media/upload/7/7b/0047Parasect.png', 'Male/Female'),
(48, 'Venonat', 'Bug', 'Poison', 'Fire, Flying, Psychic, Rock', 'Rezuma veneno por todo su cuerpo. De noche, atrapa y come pequeños Pokémon insecto atraídos por la luz.', 'Compound Eyes', 'Tinted Lens', 'Run Away', 'https://archives.bulbagarden.net/media/upload/2/2c/0048Venonat.png', 'Male/Female'),
(49, 'Venomoth', 'Bug', 'Poison', 'Fire, Flying, Psychic, Rock', 'Tiene las alas cubiertas de escamas. Cada vez que las bate, esparce un polvillo sumamente venenoso.', 'Shield Dust', 'Tinted Lens', 'Wonder Skin', 'https://archives.bulbagarden.net/media/upload/0/0e/0049Venomoth.png', 'Male/Female'),
(50, 'Diglett', 'Ground', '', 'Water, Grass, Ice', 'Vive 1 m por debajo del suelo, donde se alimenta de raíces. A veces también aparece en la superficie.', 'Sand Veil', 'Arena Trap', 'Sand Force', 'https://archives.bulbagarden.net/media/upload/a/a6/0050Diglett.png', 'Male/Female'),
(51, 'Dugtrio', 'Ground', '', 'Water, Grass, Ice', 'Sus tres cabezas suben y bajan para remover la tierra cercana y facilitar así la excavación.', 'Sand Veil', 'Arena Trap', 'Sand Force', 'https://archives.bulbagarden.net/media/upload/8/88/0051Dugtrio.png', 'Male/Female'),
(52, 'Meowth', 'Normal', '', 'Fighting', 'Durante el día, se dedica a dormir. De noche, vigila su territorio con un brillo en los ojos.', 'Pickup', 'Technician', 'Unnerve', 'https://archives.bulbagarden.net/media/upload/d/d6/0052Meowth.png', 'Male/Female'),
(53, 'Persian', 'Normal', '', 'Fighting', 'Aunque es muy admirado por el pelaje, es difícil de entrenar como mascota porque enseguida suelta arañazos.', 'Limber', 'Technician', 'Unnerve', 'https://archives.bulbagarden.net/media/upload/b/b0/0053Persian.png', 'Male/Female'),
(54, 'Psyduck', 'Water', '', 'Grass, Electric', 'Padece continuamente dolores de cabeza. Cuando son muy fuertes, empieza a usar misteriosos poderes.', 'Damp', 'Cloud Nine', 'Swift Swim', 'https://archives.bulbagarden.net/media/upload/3/3f/0054Psyduck.png', 'Male/Female'),
(55, 'Golduck', 'Water', '', 'Grass, Electric', 'Cuando nada a toda velocidad usando sus largas extremidades palmeadas, su frente comienza a brillar.', 'Damp', 'Cloud Nine', 'Swift Swim', 'https://archives.bulbagarden.net/media/upload/e/ed/0055Golduck.png', 'Male/Female'),
(56, 'Mankey', 'Fighting', '', 'Flying, Psychic, Fairy', 'Vive en grupos en las copas de los árboles. Si pierde de vista a su manada, se siente solo y se enfada.', 'Vital Spirit', 'Anger Point', 'Defiant', 'https://archives.bulbagarden.net/media/upload/f/fa/0056Mankey.png', 'Male/Female'),
(57, 'Primeape', 'Fighting', '', 'Flying, Psychic, Fairy', 'Se pone furioso si nota que alguien lo está mirando. Persigue a cualquiera que establezca contacto visual con él.', 'Vital Spirit', 'Anger Point', 'Defiant', 'https://archives.bulbagarden.net/media/upload/2/2c/0057Primeape.png', 'Male/Female'),
(58, 'Growlithe', 'Fire', '', 'Water, Ground, Rock', 'De naturaleza valiente y honrada, se enfrenta sin miedo a enemigos más grandes y fuertes.', 'Intimidate', 'Flash Fire', 'Justified', 'https://archives.bulbagarden.net/media/upload/6/6a/0058Growlithe.png', 'Male/Female'),
(59, 'Arcanine', 'Fire', '', 'Water, Ground, Rock', 'Cuenta un antiguo pergamino que la gente se quedaba fascinada al verlo correr por las praderas.', 'Intimidate', 'Flash Fire', 'Justified', 'https://archives.bulbagarden.net/media/upload/4/42/0059Arcanine.png', 'Male/Female'),
(60, 'Poliwag', 'Water', '', 'Grass, Electric', 'La espiral que tiene en el vientre son sus vísceras, visibles a través de la piel. Cuando acaba de comer, se ven de manera aún más nítida.', 'Water Absorb', 'Damp', 'Swift Swim', 'https://archives.bulbagarden.net/media/upload/e/e4/0060Poliwag.png', 'Male/Female'),
(61, 'Poliwhirl', 'Water', '', 'Grass, Electric', 'Aunque puede vivir en tierra firme gracias a que sus extremidades inferiores se han desarrollado, por algún motivo prefiere el medio acuático.', 'Water Absorb', 'Damp', 'Swift Swim', 'https://archives.bulbagarden.net/media/upload/f/fd/0061Poliwhirl.png', 'Male/Female'),
(62, 'Poliwrath', 'Water', 'Fighting', 'Grass, Electric, Flying, Psychic, Fairy', 'Aunque puede nadar de forma hábil y enérgica utilizando todos sus músculos, por algún motivo prefiere vivir en tierra firme.', 'Water Absorb', 'Damp', 'Swift Swim', 'https://archives.bulbagarden.net/media/upload/8/80/0062Poliwrath.png', 'Male/Female'),
(63, 'Abra', 'Psychic', '', 'Bug, Ghost, Dark', 'Es capaz de usar sus poderes psíquicos aun estando dormido. Al parecer, el contenido del sueño influye en sus facultades.', 'Synchronize', 'Inner Focus', 'Magic Guard', 'https://archives.bulbagarden.net/media/upload/b/bd/0063Abra.png', 'Male/Female'),
(64, 'Kadabra', 'Psychic', '', 'Bug, Ghost, Dark', 'Duerme suspendido en el aire gracias a sus poderes psíquicos. La cola, de una flexibilidad extraordinaria, hace las veces de almohada.', 'Synchronize', 'Inner Focus', 'Magic Guard', 'https://archives.bulbagarden.net/media/upload/a/af/0064Kadabra.png', 'Male/Female'),
(65, 'Alakazam', 'Psychic', '', 'Bug, Ghost, Dark', 'Posee una capacidad intelectual fuera de lo común que le permite recordar todo lo sucedido desde el instante de su nacimiento.', 'Synchronize', 'Inner Focus', 'Magic Guard', 'https://archives.bulbagarden.net/media/upload/b/bb/0065Alakazam.png', 'Male/Female'),
(66, 'Machop', 'Fighting', '', 'Flying, Psychic, Fairy', 'Es una masa de músculos y, pese a su pequeño tamaño, tiene fuerza de sobra para levantar en brazos a 100 personas.', 'Guts', 'No Guard', 'Steadfast', 'https://archives.bulbagarden.net/media/upload/0/02/0066Machop.png', 'Male/Female'),
(67, 'Machoke', 'Fighting', '', 'Flying, Psychic, Fairy', 'Su musculoso cuerpo es tan fuerte que usa un cinto antifuerza para controlar sus movimientos.', 'Guts', 'No Guard', 'Steadfast', 'https://archives.bulbagarden.net/media/upload/2/22/0067Machoke.png', 'Male/Female'),
(68, 'Machamp', 'Fighting', '', 'Flying, Psychic, Fairy', 'Mueve sus cuatro brazos a tal velocidad que resultan imposibles de ver. Puede asestar hasta mil puñetazos en dos segundos.', 'Guts', 'No Guard', 'Steadfast', 'https://archives.bulbagarden.net/media/upload/8/82/0068Machamp.png', 'Male/Female'),
(69, 'Bellsprout', 'Grass', 'Poison', 'Fire, Ice, Flying, Psychic', 'Si detecta algún movimiento a su alrededor, sea cuando sea, reacciona enseguida extendiendo sus finas lianas en esa dirección.', 'Chlorophyll', '', 'Gluttony', 'https://archives.bulbagarden.net/media/upload/6/66/0069Bellsprout.png', 'Male/Female'),
(70, 'Weepinbell', 'Grass', 'Poison', 'Fire, Ice, Flying, Psychic', 'Rezuma un fluido neutralizante que impide que su propio ácido lo disuelva.', 'Chlorophyll', '', 'Gluttony', 'https://archives.bulbagarden.net/media/upload/c/c1/0070Weepinbell.png', 'Male/Female'),
(71, 'Victreebel', 'Grass', 'Poison', 'Fire, Ice, Flying, Psychic', 'Deja que sus presas se le acerquen a la boca, atraídas por el aroma a néctar. Una vez dentro, las disuelve con su ácido.', 'Chlorophyll', '', 'Gluttony', 'https://archives.bulbagarden.net/media/upload/e/e9/0071Victreebel.png', 'Male/Female'),
(72, 'Tentacool', 'Water', 'Poison', 'Electric, Ground, Psychic', 'Cuando baja la marea, se pueden encontrar Tentacool deshidratados junto a la orilla.', 'Clear Body', 'Liquid Ooze', 'Rain Dish', 'https://archives.bulbagarden.net/media/upload/6/6e/0072Tentacool.png', 'Male/Female'),
(73, 'Tentacruel', 'Water', 'Poison', 'Electric, Ground, Psychic', 'En muy raras ocasiones, cuando se produce una aparición masiva de Tentacruel, los Pokémon pez de los alrededores se esfuman sin dejar rastro.', 'Clear Body', 'Liquid Ooze', 'Rain Dish', 'https://archives.bulbagarden.net/media/upload/c/cb/0073Tentacruel.png', 'Male/Female'),
(74, 'Geodude', 'Rock', 'Ground', 'Water(X4), Grass(X4), Ice, Fighting, Ground, Steel', 'En reposo parece una roca normal, pero responde agitando los puños con agresividad si se pisa por error.', 'Rock Head', 'Sturdy', 'Sand Veil', 'https://archives.bulbagarden.net/media/upload/9/97/0074Geodude.png', 'Male/Female'),
(75, 'Graveler', 'Rock', 'Ground', 'Water(X4), Grass(X4), Ice, Fighting, Ground, Steel', 'Camina muy lentamente, por lo que se desplaza rodando, sin importarle lo que pueda haber en su camino.', 'Rock Head', 'Sturdy', 'Sand Veil', 'https://archives.bulbagarden.net/media/upload/d/d4/0075Graveler.png', 'Male/Female'),
(76, 'Golem', 'Rock', 'Ground', 'Water(X4), Grass(X4), Ice, Fighting, Ground, Steel', 'Está cubierto por un duro caparazón formado por losas de piedra. Lo muda una vez al año para aumentar de tamaño.', 'Rock Head', 'Sturdy', 'Sand Veil', 'https://archives.bulbagarden.net/media/upload/3/38/0076Golem.png', 'Male/Female'),
(77, 'Ponyta', 'Fire', '', 'Water, Ground, Rock', 'Apenas una hora después de nacer, ya le crecen la cola y la crin de fuego, que le confieren un aspecto magnífico.', 'Run Away', 'Flash Fire', 'Flame Body', 'https://archives.bulbagarden.net/media/upload/c/c0/0077Ponyta.png', 'Male/Female'),
(78, 'Rapidash', 'Fire', '', 'Water, Ground, Rock', 'Su crin de fuego centellea cuando galopa como una flecha a velocidades que llegan a alcanzar los 240 km/h.', 'Run Away', 'Flash Fire', 'Flame Body', 'https://archives.bulbagarden.net/media/upload/a/a9/0078Rapidash.png', 'Male/Female'),
(79, 'Slowpoke', 'Water', 'Psychic', 'Grass, Electric, Bug, Ghost, Dark', 'Increíblemente lento y torpe. Tarda cinco segundos en sentir dolor si lo atacan.', 'Oblivious', 'Own Tempo', 'Regenerator', 'https://archives.bulbagarden.net/media/upload/1/19/0079Slowpoke.png', 'Male/Female'),
(80, 'Slowbro', 'Water', 'Psychic', 'Grass, Electric, Bug, Ghost, Dark', 'Según parece, cuando Slowpoke fue a pescar al mar, un Shellder le mordió la cola y así evolucionó a Slowbro.', 'Oblivious', 'Own Tempo', 'Regenerator', 'https://archives.bulbagarden.net/media/upload/a/a3/0080Slowbro.png', 'Male/Female'),
(81, 'Magnemite', 'Electric', 'Steel', 'Fire, Fighting, Ground(X4)', 'Las unidades laterales crean ondas electromagnéticas que contrarrestan la gravedad y le permiten flotar.', 'Magnet Pull', 'Sturdy', 'Analytic', 'https://archives.bulbagarden.net/media/upload/a/a2/0081Magnemite.png', 'N/A'),
(82, 'Magneton', 'Electric', 'Steel', 'Fire, Fighting, Ground(X4)', 'Tres Magnemite se enlazan mediante una intensa fuerza magnética. Provoca un fuerte pitido en los oídos a quien se le acerque.', 'Magnet Pull', 'Sturdy', 'Analytic', 'https://archives.bulbagarden.net/media/upload/d/d9/0082Magneton.png', 'N/A'),
(83, 'Farfetch-d', 'Normal', 'Flying', 'Electric, Ice, Rock', 'No puede vivir sin el puerro que lleva, así que lo protege de sus atacantes con todas sus fuerzas.', 'Keen Eye', 'Inner Focus', 'Defiant', 'https://archives.bulbagarden.net/media/upload/9/99/0083Farfetch%27d.png', 'Male/Female'),
(84, 'Doduo', 'Normal', 'Flying', 'Electric, Ice, Rock', 'Sus cabezas gemelas comparten la misma información genética y combaten juntas al unísono.', 'Run Away', 'Early Bird', 'Tangled Feet', 'https://archives.bulbagarden.net/media/upload/b/b9/0084Doduo.png', 'Male/Female'),
(85, 'Dodrio', 'Normal', 'Flying', 'Electric, Ice, Rock', 'Ahora cuenta con tres corazones y tres pares de pulmones. No alcanza las velocidades de Doduo, pero es capaz de correr durante más tiempo.', 'Run Away', 'Early Bird', 'Tangled Feet', 'https://archives.bulbagarden.net/media/upload/9/97/0085Dodrio.png', 'Male/Female'),
(86, 'Seel', 'Water', '', 'Grass, Electric', 'La protuberancia que tiene en la cabeza es tan dura que la usa para abrirse paso a cabezazos por el hielo de los icebergs.', 'Thick Fat', 'Hydration', 'Ice Body', 'https://archives.bulbagarden.net/media/upload/2/22/0086Seel.png', 'Male/Female'),
(87, 'Dewgong', 'Water', '', 'Grass, Electric', 'Duerme en aguas poco profundas durante el día y, por la noche, cuando baja la temperatura del agua, nada en busca de comida.', 'Thick Fat', 'Hydration', 'Ice Body', 'https://archives.bulbagarden.net/media/upload/2/2b/0087Dewgong.png', 'Male/Female'),
(88, 'Grimer', 'Poison', '', 'Ground, Psychic', 'Formados a partir de lodo, los Grimer se juntan en lugares sucios para aumentar el número de gérmenes de su cuerpo.', 'Stench', 'Sticky Hold', 'Poison Touch', 'https://archives.bulbagarden.net/media/upload/e/eb/0088Grimer.png', 'Male/Female'),
(89, 'Muk', 'Poison', '', 'Ground, Psychic', 'Está cubierto por un repugnante lodo. Es tan tóxico que hasta su rastro es venenoso.', 'Stench', 'Sticky Hold', 'Poison Touch', 'https://archives.bulbagarden.net/media/upload/4/41/0089Muk.png', 'Male/Female'),
(90, 'Shellder', 'Water', '', 'Grass, Electric', 'Está metido en una concha más dura que el diamante, pero tiene un cuerpo muy blando.', 'Shell Armor', 'Skill Link', 'Overcoat', 'https://archives.bulbagarden.net/media/upload/3/3e/0090Shellder.png', 'Male/Female'),
(91, 'Cloyster', 'Water', '', 'Grass, Electric', 'A los Cloyster que viven en las fuertes corrientes marinas les crecen largas y afiladas púas en la concha.', 'Shell Armor', 'Skill Link', 'Overcoat', 'https://archives.bulbagarden.net/media/upload/9/90/0091Cloyster.png', 'Male/Female'),
(92, 'Gastly', 'Ghost', 'Poison', 'Ground, Psychic, Ghost, Dark', 'Su estrategia consiste en envolver al rival con su cuerpo gaseoso y envenenarlo a través de la piel.', 'Levitate', '', '', 'https://archives.bulbagarden.net/media/upload/c/c2/0092Gastly.png', 'Male/Female'),
(93, 'Haunter', 'Ghost', 'Poison', 'Ground, Psychic, Ghost, Dark', 'Le gusta acechar en la oscuridad y tocarles el hombro a sus víctimas con su mano gaseosa. Estas se quedan temblando para siempre.', 'Levitate', '', '', 'https://archives.bulbagarden.net/media/upload/d/d1/0093Haunter.png', 'Male/Female'),
(94, 'Gengar', 'Ghost', 'Poison', 'Ground, Psychic, Ghost, Dark', 'Para quitarle la vida a su presa, se desliza en su sombra y espera su oportunidad en silencio.', 'Levitate', '', '', 'https://archives.bulbagarden.net/media/upload/4/47/0094Gengar.png', 'Male/Female'),
(95, 'Onix', 'Rock', 'Ground', 'Water(X4), Grass(X4), Ice, Fighting, Ground, Steel', 'Al abrirse paso bajo tierra, va absorbiendo todo lo que encuentra. Eso hace que su cuerpo sea así de sólido.', 'Rock Head', ' Sturdy', 'Weak Armor', 'https://archives.bulbagarden.net/media/upload/b/b7/0095Onix.png', 'Male/Female'),
(96, 'Drowzee', 'Psychic', '', 'Bug, Ghost, Dark', 'Recuerda todos los sueños que engulle. Raramente come sueños de adultos porque los de los niños están más ricos.', 'Insomnia', 'Forewarn', 'Inner Focus', 'https://archives.bulbagarden.net/media/upload/e/e4/0096Drowzee.png', 'Male/Female'),
(97, 'Hypno', 'Psychic', '', 'Bug, Ghost, Dark', 'Cuando mira al enemigo, usa diversos poderes psíquicos como la hipnosis.', 'Insomnia', 'Forewarn', 'Inner Focus', 'https://archives.bulbagarden.net/media/upload/4/4c/0097Hypno.png', 'Male/Female'),
(98, 'Krabby', 'Water', '', 'Grass, Electric', 'Es fácil encontrarlo cerca del mar. Las largas pinzas que tiene vuelven a crecer si se las quitan de su sitio.', 'Hyper Cutter', 'Shell Armor', 'Sheer Force', 'https://archives.bulbagarden.net/media/upload/e/ed/0098Krabby.png', 'Male/Female'),
(99, 'Kingler', 'Water', '', 'Grass, Electric', 'La pinza mayor posee una fuerza devastadora, pero es tan pesada que le cuesta usarla con precisión.', 'Hyper Cutter', 'Shell Armor', 'Sheer Force', 'https://archives.bulbagarden.net/media/upload/a/ae/0099Kingler.png', 'Male/Female'),
(100, 'Voltorb', 'Electric', '', 'Ground', 'Se mueve rodando. Si el terreno es irregular, una chispa provocada por algún bache lo hará explotar.', 'Soundproof', 'Static', 'Aftermath', 'https://archives.bulbagarden.net/media/upload/5/55/0100Voltorb.png', 'N/A'),
(101, 'Electrode', 'Electric', '', 'Ground', 'Cuanta más energía almacena, mayor velocidad alcanza, aunque aumenta también el riesgo de que explote.', 'Soundproof', 'Static', 'Aftermath', 'https://archives.bulbagarden.net/media/upload/d/db/0101Electrode.png', 'N/A'),
(102, 'Exeggcute', 'Grass', 'Psychic', 'Fire, Ice, Poison, Flying, Bug(X4), Ghost, Dark', 'Si alguien confunde a una de sus cabezas con un huevo y la toca, se reagrupa con las otras para atacar todas juntas.', 'Chlorophyll', '', 'Harvest', 'https://archives.bulbagarden.net/media/upload/6/60/0102Exeggcute.png', 'Male/Female'),
(103, 'Exeggutor', 'Grass', 'Psychic', 'Fire, Ice, Poison, Flying, Bug(X4), Ghost, Dark', 'Se lo llama la Selva Andante. Cada fruto tiene una cara distinta y voluntad propia.', 'Chlorophyll', '', 'Harvest', 'https://archives.bulbagarden.net/media/upload/a/ae/0103Exeggutor.png', 'Male/Female'),
(104, 'Cubone', 'Ground', '', 'Water, Grass, Ice', 'Cuando llora al acordarse de su madre fallecida, su llanto resuena en el cráneo que lleva en la cabeza.', 'Rock Head', 'Lightning Rod', 'Battle Armor', 'https://archives.bulbagarden.net/media/upload/1/19/0104Cubone.png', 'Male/Female'),
(105, 'Marowak', 'Ground', '', 'Water, Grass, Ice', 'Ha evolucionado tras fortalecerse y superar su pena. Ahora lucha con arrojo blandiendo su hueso a modo de arma.', 'Rock Head', 'Lightning Rod', 'Battle Armor', 'https://archives.bulbagarden.net/media/upload/a/a1/0105Marowak.png', 'Male/Female'),
(106, 'Hitmonlee', 'Fighting', '', 'Flying, Psychic, Fairy', 'Endurece los músculos de las plantas de los pies en el momento en el que impactan contra su rival para potenciar al máximo sus patadas.', 'Limber', 'Reckless', 'Unburden', 'https://archives.bulbagarden.net/media/upload/0/00/0106Hitmonlee.png', 'Male'),
(107, 'Hitmonchan', 'Fighting', '', 'Flying, Psychic, Fairy', 'Acorrala a sus enemigos con combinaciones de puñetazos con ambos puños, para luego darles el golpe de gracia con un directo a 500 km/h.', 'Keen Eye', 'Iron Fist', 'Inner Focus', 'https://archives.bulbagarden.net/media/upload/c/c0/0107Hitmonchan.png', 'Male'),
(108, 'Lickitung', 'Normla', '', 'Fighting', 'Si sus lametones no se tratan a tiempo, su saliva pegajosa y urticante puede provocar picores persistentes.', 'Own Tempo', 'Oblivious', 'Cloud Nine', 'https://archives.bulbagarden.net/media/upload/f/f2/0108Lickitung.png', 'Male/Female'),
(109, 'Koffing', 'Poison', '', 'Ground, Psychic', 'Su cuerpo, con forma de globo y poco grosor, encierra gases muy tóxicos que pueden ocasionar explosiones espontáneas de gran magnitud.', 'Levitate', 'Neutralizing Gas', 'Stench', 'https://archives.bulbagarden.net/media/upload/1/16/0109Koffing.png', 'Male/Female'),
(110, 'Weezing', 'Poison', '', 'Ground, Psychic', 'Diluir sus venenosos gases internos lo máximo posible permite fabricar perfumes de alta gama.', 'Levitate', 'Neutralizing Gas', 'Stench', 'https://archives.bulbagarden.net/media/upload/7/72/0110Weezing.png', 'Male/Female'),
(111, 'Rhyhorn', 'Ground', 'Rock', 'Water(X4), Grass(X4), Ice, Fighting, Ground, Steel', 'Puede controlar un territorio de hasta 10 km de radio, pero, cuando se pone a correr, parece olvidársele dónde empieza y dónde acaba.', 'Lightning Rod', 'Rock Head', 'Reckless', 'https://archives.bulbagarden.net/media/upload/7/7f/0111Rhyhorn.png', 'Male/Female'),
(112, 'Rhydon', 'Ground', 'Rock', 'Water(X4), Grass(X4), Ice, Fighting, Ground, Steel', 'Hace chocar el cuerno con el de sus congéneres para afilarlo. Es capaz de horadar diamantes en bruto con él.', 'Lightning Rod', 'Rock Head', 'Reckless', 'https://archives.bulbagarden.net/media/upload/7/79/0112Rhydon.png', 'Male/Female'),
(113, 'Chansey', 'Normal', '', 'Fighting', 'Un generoso Pokémon que pone huevos muy nutritivos y se los da a personas o Pokémon heridos.', 'Natural Cure', 'Serene Grace', 'Healer', 'https://archives.bulbagarden.net/media/upload/c/c0/0113Chansey.png', 'Female'),
(114, 'Tangela', 'Grass', '', 'Fire, Ice, Poison, Flying, Bug ', 'Sus lianas no dejan de crecer aunque se le desprendan. Aún se desconoce qué aspecto tiene sin ellas.', 'Chlorophyll', 'Leaf Guard', 'Regeneratorhttps://archives.bulbagarden.net/media/upload/2/22/0114Tangela.png', '', 'Male/Female'),
(115, 'Kangaskhan', 'Normal', '', 'Fighting', 'Aunque lleve una cría en el marsupio, su juego de pies no pierde ligereza. Abruma al rival con ráfagas de ágiles puñetazos.', 'Early Bird', 'Scrappy', 'Inner Focus', 'https://archives.bulbagarden.net/media/upload/e/e5/0115Kangaskhan.png', 'Female'),
(116, 'Horsea', 'Water', '', 'Grass, Electric', 'Si es atacado por un enemigo, por muy grande que sea, nada veloz a un lugar seguro gracias a su fornida aleta dorsal.', 'Swift Swim', 'Sniper', 'Damp', 'https://archives.bulbagarden.net/media/upload/1/14/0116Horsea.png', 'Male/Female'),
(117, 'Seadra', 'Water', '', 'Grass, Electric', 'En esta especie, es el macho quien se ocupa de cuidar a las crías, a las que defiende con sus púas venenosas de cualquiera que se les acerque.', 'Poison Point', 'Sniper', 'Damp', 'https://archives.bulbagarden.net/media/upload/2/22/0117Seadra.png', 'Male/Female'),
(118, 'Goldeen', 'Water', '', 'Grass, Electric', 'Sus aletas pectorales, caudal y dorsal ondean gráciles en el agua. Por eso se le llama el Bailarín Acuático.', 'Swift Swim', 'Water Veil', 'Lightning Rod', 'https://archives.bulbagarden.net/media/upload/b/b6/0118Goldeen.png', 'Male/Female'),
(119, 'Seaking', 'Water', '', 'Grass, Electric', 'En otoño gana algo de peso para atraer a posibles parejas y se cubre de llamativos colores.', 'Swift Swim', 'Water Veil', 'Lightning Rod', 'https://archives.bulbagarden.net/media/upload/7/76/0119Seaking.png', 'Male/Female'),
(120, 'Staryu', 'Water', '', 'Grass, Electric', 'A finales de verano, se pueden ver grupos de Staryu en la orilla de la playa sincronizando el brillo de sus núcleos a ritmo regular.', 'Illuminate', 'Natural Cure', 'Analytic', 'https://archives.bulbagarden.net/media/upload/3/38/0120Staryu.png', 'N/A'),
(121, 'Starmie', 'Water', 'Psychic', 'Grass, Electric', 'Su órgano central, conocido como núcleo, brilla con los colores del arcoíris cuando se dispone a liberar sus potentes poderes psíquicos.', 'Illuminate', 'Natural Cure', 'Analytic', 'https://archives.bulbagarden.net/media/upload/a/aa/0121Starmie.png', 'N/A'),
(122, 'Mr. Mime', 'Psychic', 'Fairy', 'Poison, Ghost, Steel', 'Un experto de la pantomima capaz de crear paredes invisibles pero sólidas solo con sus gestos.', 'Soundproof', 'Filter', 'Technician', 'https://archives.bulbagarden.net/media/upload/f/fb/0122Mr._Mime.png', 'Male/Female'),
(123, 'Scyther', 'Bug', 'Flying', 'Fire, Electric, Ice, Flying, Rock(X4)', 'Avanza por la hierba con sus afiladas guadañas, más rápido de lo que el ojo humano puede percibir.', 'Swarm', 'Technician', 'Steadfast', 'https://archives.bulbagarden.net/media/upload/8/81/0123Scyther.png', 'Male/Female'),
(124, 'Jynx', 'Ice', 'Psychic', 'Fire, Bug, Rock, Ghost, Dark, Steel', 'En cierta parte de Galar se conocía a Jynx como la Reina del Hielo y se reverenciaba con cierto temor.', 'Oblivious', 'Forewarn', 'Dry Skin', 'https://archives.bulbagarden.net/media/upload/0/07/0124Jynx.png', 'Female'),
(125, 'Electabuzz', 'Electric', '', 'Ground', 'Su cuerpo descarga electricidad constantemente, por lo que eriza el cabello a cualquiera que se le acerque.', 'Static', '', 'Vital Spirit', 'https://archives.bulbagarden.net/media/upload/5/5c/0125Electabuzz.png', 'Male/Female'),
(126, 'Magmar', 'Fire', '', 'Water, Ground, Rock', 'Fue descubierto junto al cráter de un volcán. Escupe llamaradas y su temperatura corporal alcanza los 1200?ºC.', 'Flame Body', '', 'Vital Spirit', 'https://archives.bulbagarden.net/media/upload/7/72/0126Magmar.png', 'Male/Female'),
(127, 'Pinsir', 'Bug', '', 'Fire, Flying, Rock', 'Los Pinsir se juzgan entre ellos por la robustez de la cornamenta. Cuanto más imponente sea, más agradará a sus congéneres del sexo opuesto.', 'Hyper Cutter', 'Mold Breaker', 'Moxie', 'https://archives.bulbagarden.net/media/upload/a/a9/0127Pinsir.png', 'Male/Female'),
(128, 'Tauros', 'Normal', '', 'Fighting', 'Cuando ve a un enemigo, se fustiga con las colas y carga ferozmente contra él.', 'Intimidate', 'Anger Point', 'Sheer Force', 'https://archives.bulbagarden.net/media/upload/a/ad/0128Tauros.png', 'Male'),
(129, 'Magikarp', 'Water', '', 'Grass, Electric', 'Un Pokémon desvalido y patético. A veces es capaz de saltar alto, pero rara vez más de 2 m.', 'Swift Swim', '', 'Rattled', 'https://archives.bulbagarden.net/media/upload/d/d1/0129Magikarp.png', 'Male/Female'),
(130, 'Gyarados', 'Water', 'Flying', 'Grass, Electric', 'Cuando aparece, monta en cólera. No deja de estar furioso hasta que lo destruye todo.', 'Intimidate', '', 'Moxie', 'https://archives.bulbagarden.net/media/upload/b/bc/0130Gyarados.png', 'Male/Female'),
(131, 'Lapras', 'Water', 'Ice', 'Grass, Electric, Fighting, Rock', 'Surca los mares transportando gente sobre el lomo. Al parecer, a veces entona un melodioso canto si está de buen humor.', 'Water Absorb', 'Shell Armor', 'Hydration', 'https://archives.bulbagarden.net/media/upload/9/99/0131Lapras.png', 'Male/Female'),
(132, 'Ditto', 'Normal', '', 'Fighting', 'Su habilidad para transformarse es perfecta, pero, si se le hace reír, perderá la fuerza y no podrá mantenerse transformado.', 'Limber', '', 'Imposter', 'https://archives.bulbagarden.net/media/upload/2/25/0132Ditto.png', 'Male/Female'),
(133, 'Eevee', 'Normal', '', 'Fighting', 'Es capaz de evolucionar de muchas maneras para adaptarse sin problemas a cualquier medio.', 'Run Away', 'Adaptability', 'Anticipation', 'https://archives.bulbagarden.net/media/upload/4/4c/0133Eevee.png', 'Male/Female'),
(134, 'Vaporeon', 'Water', '', 'Grass, Electric', 'Vive cerca del agua. Su cola termina en una aleta parecida a la de un pez, por lo que hay gente que lo confunde con una sirena.', 'Water Absorb', '', 'Hydration', 'https://archives.bulbagarden.net/media/upload/6/6d/0134Vaporeon.png', 'Male/Female'),
(135, 'Jolteon', 'Electric', '', 'Ground', 'Concentra la débil actividad eléctrica de sus células para lanzar dañinas descargas.', 'Volt Absorb', '', 'Quick Feet', 'https://archives.bulbagarden.net/media/upload/e/e3/0135Jolteon.png', 'Male/Female'),
(136, 'Flareon', 'Fire', '', 'Water, Ground, Rock', 'Calienta el aire que inhala en su saca de fuego y lo expulsa a 1700?ºC.', 'Flash Fire', '', 'Guts', 'https://archives.bulbagarden.net/media/upload/f/f1/0136Flareon.png', 'Male/Female'),
(137, 'Porygon', 'Normal', '', 'Fighting', 'Un Pokémon artificial que no respira, por lo que se le supone la capacidad de desenvolverse sin problemas en cualquier entorno.', 'Trace', 'Download', 'Analytic', 'https://archives.bulbagarden.net/media/upload/8/8e/0137Porygon.png', 'N/A'),
(138, 'Omanyte', 'Rock', 'Water', 'Grass(4X), Electric, Fighting, Ground', 'Varios ejemplares han escapado o bien han sido liberados tras su restauración, lo que comienza a suscitar una serie de problemas.', 'Swift Swim', 'Shell Armor', 'Weak Armor', 'https://archives.bulbagarden.net/media/upload/e/e6/0138Omanyte.png', 'Male/Female'),
(139, 'Omastar', 'Rock', 'Water', 'Grass(X4), Electric, Fighting, Ground', 'Se cree que se extinguió porque el excesivo tamaño y peso de su concha le impedían moverse con rapidez para capturar presas.', 'Swift Swim', 'Shell Armor', 'Weak Armor', 'https://archives.bulbagarden.net/media/upload/6/66/0139Omastar.png', 'Male/Female'),
(140, 'Kabuto', 'Rock', 'Water', 'Grass(4X), Electric, Fighting, Ground', 'Un Pokémon casi extinto. Cada tres días, muda el caparazón, que se va endureciendo de forma progresiva.', 'Swift Swim', 'Battle Armor', 'Weak Armor', 'https://archives.bulbagarden.net/media/upload/d/d2/0140Kabuto.png', 'Male/Female'),
(141, 'Kabutops', 'Rock', 'Water', 'Grass(X4), Electric, Fighting, Ground', 'Despedaza a las presas que atrapa para sorber sus fluidos y deja los restos para que otros Pokémon den buena cuenta de ellos.', 'Swift Swim', 'Battle Armor', 'Weak Armor', 'https://archives.bulbagarden.net/media/upload/4/41/0141Kabutops.png', 'Male/Female'),
(142, 'Aerodactyl', 'Rock', 'Flying', 'Water, Electric, Ice, Rock, Steel', 'Un feroz Pokémon de la época prehistórica al que no bastan todos los avances tecnológicos actuales para regenerar a la perfección.', 'Rock Head', 'Pressure', 'Unnerve', 'https://archives.bulbagarden.net/media/upload/2/2c/0142Aerodactyl.png', 'Male/Female'),
(143, 'Snorlax', 'Normal', '', 'Fighting', 'Este Pokémon es un glotón que lo único que hace aparte de comer es dormir. Puede ingerir hasta 400 kg de comida en un solo día.', 'Immunity', 'Thick Fat', 'Gluttony', 'https://archives.bulbagarden.net/media/upload/3/3f/0143Snorlax.png', 'Male/Female'),
(144, 'Articuno', 'Ice', 'Flying', 'Fire, Electric, Rock(X4), Steel', 'Una de las aves legendarias. Es capaz de generar ventiscas congelando la humedad del aire.', 'Pressure', '', 'Snow Cloak', 'https://archives.bulbagarden.net/media/upload/d/d0/0144Articuno.png', 'N/A'),
(145, 'Zapdos', 'Electric', 'Flying', 'Ice, Rock', 'Una de las aves legendarias. Según dicen, vive en los nubarrones y controla los rayos a su antojo.', 'Pressure', '', 'Static', 'https://archives.bulbagarden.net/media/upload/c/c6/0145Zapdos.png', 'N/A'),
(146, 'Moltres', 'Fire', 'Flying', 'Water, Electric, Rock(X4)', 'Una de las aves legendarias. Dicen que su presencia anuncia la llegada de la primavera.', 'Pressure', '', 'Flame Body', 'https://archives.bulbagarden.net/media/upload/2/21/0146Moltres.png', 'N/A'),
(147, 'Dratini', 'Dragon', '', 'Ice, Dragon, Fairy', 'Durante la etapa de crecimiento, muda muchas veces de piel y se protege mediante una cascada.', 'Shed Skin', '', 'Marvel Scale', 'https://archives.bulbagarden.net/media/upload/a/ae/0147Dratini.png', 'Male/Female'),
(148, 'Dragonair', 'Dragon', '', 'Ice, Dragon, Fairy', 'Dicen que, cuando su cuerpo desprende un aura, el tiempo empieza a cambiar inmediatamente.', 'Shed Skin', '', 'Marvel Scale', 'https://archives.bulbagarden.net/media/upload/0/0d/0148Dragonair.png', 'Male/Female'),
(149, 'Dragonite', 'Dragon', 'Flying', 'Ice(X4), Rock, Dragon, Fairy', 'Dicen que viven en una isla en algún lugar del océano que solo ellos habitan.', 'Inner Focus', '', 'Multiscale', 'https://archives.bulbagarden.net/media/upload/1/1c/0149Dragonite.png', 'Male/Female'),
(150, 'Mewtwo', 'Psychic', '', 'Bug, Ghost, Dark', 'Su ADN es casi el mismo que el de Mew. Sin embargo, su tamaño y carácter son muy diferentes.', 'Pressure', '', 'Unnerve', 'https://archives.bulbagarden.net/media/upload/8/89/0150Mewtwo.png', 'N/A'),
(151, 'Mew', 'Psychic', '', 'Bug, Ghost, Dark', 'Si se observa a través de un microscopio, puede distinguirse cuán corto, fino y delicado es el pelaje de este Pokémon.', 'Synchronize', '', '', 'https://archives.bulbagarden.net/media/upload/9/9a/0151Mew.png', 'N/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemoncatched`
--

CREATE TABLE `pokemoncatched` (
  `Id_PokemonCatched` int(11) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `Id_Pokedex` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `Id_User` int(11) NOT NULL,
  `Name_User` varchar(255) NOT NULL,
  `User_Password` varchar(255) NOT NULL,
  `Bio` varchar(255) DEFAULT NULL,
  `Profile_Photo` varchar(255) DEFAULT NULL,
  `Pity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datapokemonall`
--
ALTER TABLE `datapokemonall`
  ADD PRIMARY KEY (`Id_Pokedex`);

--
-- Indices de la tabla `pokemoncatched`
--
ALTER TABLE `pokemoncatched`
  ADD PRIMARY KEY (`Id_PokemonCatched`),
  ADD KEY `Id_User` (`Id_User`),
  ADD KEY `Id_Pokedex` (`Id_Pokedex`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id_User`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pokemoncatched`
--
ALTER TABLE `pokemoncatched`
  MODIFY `Id_PokemonCatched` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pokemoncatched`
--
ALTER TABLE `pokemoncatched`
  ADD CONSTRAINT `pokemoncatched_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `users` (`Id_User`),
  ADD CONSTRAINT `pokemoncatched_ibfk_2` FOREIGN KEY (`Id_Pokedex`) REFERENCES `datapokemonall` (`Id_Pokedex`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
