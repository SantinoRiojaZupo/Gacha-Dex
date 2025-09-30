<?php
require_once "../config/conexion.php";
session_start();

header('Content-Type: application/json');

// Verificar sesión
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Inicia Sesión']);
    exit;
}

// Obtener generación desde el frontend
$gen = isset($_POST['gen']) ? intval($_POST['gen']) : 0;

// Rangos de pokédex por generación
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

// Definir rango según generación (0 = todas)
if ($gen === 0) {
    $from = 1;
    $to   = 1025;
} else {
    [$from, $to] = $rangosGen[$gen];
}

// Calcular tamaño del rango y factor para pity
$rangeSize = $to - $from + 1;
$pityFactor = $rangeSize / 1025; // cuanto más pequeño el rango, más lento sube el pity

    $legendarios = [144, 145, 146, 150, 151];

// Obtener un Pokémon random en SQL
$sql= "SELECT Id_Pokedex, PokemonName, Image FROM DATAPOKEMONALL WHERE Id_Pokedex BETWEEN ? AND ? ORDER BY RAND() LIMIT 1";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt,"ii",$from,$to);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$pokemon = mysqli_fetch_assoc($res);

// Obtener pity actual del usuario
$sqlUser = "SELECT Pity FROM users WHERE Id_User = ?";
$stmtUser = $conexion->prepare($sqlUser);
$stmtUser->bind_param("i", $_SESSION['user_id']);
$stmtUser->execute();
$resUser = $stmtUser->get_result();
$userData = $resUser->fetch_assoc();
$pity = intval($userData['Pity']);

// Probabilidades base
$probShinyBase = 0.01; // 1%
$probLegendarioBase = 0.03; // 3%

// Ajustar con pity y factor de generación
$probShiny = $probShinyBase + ($pity * 0.001 * $pityFactor);
$probLegendario = $probLegendarioBase + ($pity * 0.002 * $pityFactor);

// Tirar RNG
$random = mt_rand() / mt_getrandmax(); // número entre 0 y 1
$resultado = "normal";

if ($random < $probShiny) {
    $resultado = "shiny";
    $pity = 0; // reset
} elseif ($random < ($probShiny + $probLegendario)) {
    $resultado = "legendario";
    $pity = 0; // reset
    
    // Solo los legendarios que existen por ahora
    $idLegendario = $legendarios[array_rand($legendarios)];

    $sqlPoke = "SELECT Id_Pokedex, PokemonName, Image 
                FROM datapokemonall 
                WHERE Id_Pokedex = ?";
    $stmt = $conexion->prepare($sqlPoke);
    $stmt->bind_param("i", $idLegendario);
    $stmt->execute();
    $res = $stmt->get_result();
    $pokemon = $res->fetch_assoc();
} else {    
    $pity++; // no tocó nada especial
    // placeholders para todos los legendarios
    $placeholders = implode(',', array_fill(0, count($legendarios), '?'));

    // consulta normal excluyendo legendarios
    $sql = "SELECT Id_Pokedex, PokemonName, Image 
            FROM datapokemonall 
            WHERE Id_Pokedex BETWEEN ? AND ? 
            AND Id_Pokedex NOT IN ($placeholders)
            ORDER BY RAND() 
            LIMIT 1";

    $params = array_merge([$from, $to], $legendarios); 
    $types = str_repeat('i', count($params)); 

    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, $types, ...$params); 
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $pokemon = mysqli_fetch_assoc($res);
}
    


// Actualizar pity en la DB
$sqlUpdate = "UPDATE users SET Pity = ? WHERE Id_User = ?";
$stmtUpdate = $conexion->prepare($sqlUpdate);
$stmtUpdate->bind_param("ii", $pity, $_SESSION['user_id']);
$stmtUpdate->execute();

if (!$pokemon) {
    echo json_encode(['error' => 'No se encontró ningún Pokémon en este rango']);
    exit;
}

// Respuesta JSON
echo json_encode([
    'ok' => true,
    'mensaje' => 'Roll ejecutado correctamente',
    'pokemon' => $pokemon,
    'img_url' => $pokemon['Image'],
    'idPokemon' => $pokemon['Id_Pokedex'],
    'resultado' => $resultado,
    // 'pity' => $pity,
    // 'rangeSize' => $rangeSize // opcional, para debug o frontend
]);

?>