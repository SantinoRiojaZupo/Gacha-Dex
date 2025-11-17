<?php
require_once __DIR__ . '/config/conexion.php';
session_start();
header('Content-Type: application/json');

//  Verificar sesión
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Inicia Sesión']);
    exit;
}

//  Rangos por generación
$rangosGen = [
    1 => [1, 151],
    2 => [152, 251],
    3 => [252, 386],
    4 => [387, 493],
    5 => [494, 649],
    6 => [650, 721],
    7 => [722, 809],
    8 => [810, 905],
    9 => [906, 1025]
];

//  Legendarios por generación
$legendariosPorGen = [
    1 => [144, 145, 146, 150, 151],
    2 => [243, 244, 245, 249, 250, 251],
    3 => [377, 378, 379, 380, 381, 382, 383, 384, 385, 386],
    4 => [480, 481, 482, 483, 484, 485, 486, 487, 488, 489, 490, 491, 492, 493],
    5 => [494,638, 639, 640, 641, 642, 643, 644, 645, 646, 647, 648, 649],
    6 => [716, 717, 718,719,720,721],
    7 => [772, 773, 785, 786, 787, 788, 789, 790, 791, 792, 800, 801, 802, 807, 808, 809],
    8 => [888, 889, 890, 891, 892,893, 894, 895, 896, 897, 898,905],
    9 => [ 1001, 1002, 1003, 1004, 1007, 1008, 1014, 1015,1016,1017,1024,1025]
];

//  Obtener generación seleccionada
$gen = isset($_POST['gen']) ? intval($_POST['gen']) : 0;
if ($gen === 0) {
    $from = 1;
    $to = 1025;
} else {
    [$from, $to] = $rangosGen[$gen];
}





$sql = "SELECT Pity, Rolls FROM users WHERE Id_User = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$userData = $stmt->get_result()->fetch_assoc();
$pity = intval($userData['Pity'] ?? 0);
$Rolls = intval($userData['Rolls'] ?? 0);

// --- Probabilidades ---
$rangeSize = $to - $from + 1;
$pityFactor = $rangeSize / 1025;
$probShinyBase = 0.01;         // 3% base
$probLegendarioBase = 0.03;    // 3% base
$probShiny = $probShinyBase + ($pity * 0.001 * $pityFactor);
$probLegendario = $probLegendarioBase + ($pity * 0.002 * $pityFactor);

// --- Calcular banderas por separado ---
$randomShiny = mt_rand() / mt_getrandmax();
$randomLegend = mt_rand() / mt_getrandmax();

$isShiny = $randomShiny < $probShiny;
$isLegendario = $randomLegend < $probLegendario;

// --- Asignar Pokémon según resultado ---
if ($isLegendario) {
    $resultado = $isShiny ? "shiny_legendario" : "legendario";
    $listaLegend = ($gen !== 0 && isset($legendariosPorGen[$gen]))
        ? $legendariosPorGen[$gen]
        : array_merge(...array_values($legendariosPorGen));
    $idPokemon = $listaLegend[array_rand($listaLegend)];
    $pity = 0;
    $Rolls = $Rolls - 1;
} else {
    // No legendario → cualquier Pokémon normal del rango
    $listaLegend = array_merge(...array_values($legendariosPorGen));
    $placeholders = implode(',', array_fill(0, count($listaLegend), '?'));
    $sql = "SELECT Id_Pokedex FROM datapokemonall 
            WHERE Id_Pokedex BETWEEN ? AND ? 
            AND Id_Pokedex NOT IN ($placeholders)
            ORDER BY RAND() LIMIT 1";

    $params = array_merge([$from, $to], $listaLegend);
    $types = str_repeat('i', count($params));
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $res = $stmt->get_result();
    $pokemonData = $res->fetch_assoc();


    if (!$pokemonData) {
        $stmt = $conexion->prepare("SELECT Id_Pokedex FROM datapokemonall WHERE Id_Pokedex BETWEEN ? AND ? ORDER BY RAND() LIMIT 1");
        $stmt->bind_param("ii", $from, $to);
        $stmt->execute();
        $pokemonData = $stmt->get_result()->fetch_assoc();
    }

    $idPokemon = $pokemonData['Id_Pokedex'] ?? mt_rand($from, $to);
    $Rolls --;
    $resultado = $isShiny ? "shiny" : "normal";
    $pity = $isShiny ? 0 : $pity + 1;
            
}

// --- Obtener datos del Pokémon ---
$stmt = $conexion->prepare("SELECT Id_Pokedex, PokemonName, image FROM datapokemonall WHERE Id_Pokedex = ?");
$stmt->bind_param("i", $idPokemon);
$stmt->execute();
$pokemon = $stmt->get_result()->fetch_assoc();

if (!$pokemon) {
    echo json_encode(['error' => 'No se encontró Pokémon válido']);
    exit;
}
$nombrePokemon = $pokemon['PokemonName'];

// --- Asignar imagen e indicador shiny ---
$pokemon['Image'] = $isShiny
    ? "https://img.pokemondb.net/sprites/home/shiny/2x/{$nombrePokemon}.jpg"
    : "https://img.pokemondb.net/sprites/home/normal/2x/${nombrePokemon}.jpg";

$pokemon['Is_Shiny'] = $isShiny ? 1 : 0;

// --- Actualizar pity del usuario ---
$stmt = $conexion->prepare("UPDATE users SET Pity = ?, Rolls = ? WHERE Id_User = ?");
$stmt->bind_param("iii", $pity, $Rolls ,$_SESSION['user_id']);
$stmt->execute();

// --- Respuesta final ---
echo json_encode([
    'ok' => true,
    'mensaje' => 'Roll ejecutado correctamente',
    'pokemon' => $pokemon,
    'idPokemon' => $idPokemon,
    'resultado' => $resultado,
    'pity' => $pity,
    'Rolls' => $Rolls
]);
