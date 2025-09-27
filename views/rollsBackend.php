<?php
require_once "../config/conexion.php";
session_start();

// header('Content-Type: application/json');

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

// Obtener un Pokémon random en SQL
$sql= "SELECT Id_Pokedex, PokemonName, Image FROM DATAPOKEMONALL WHERE Id_Pokedex BETWEEN ? AND ? ORDER BY RAND() LIMIT 1";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt,"ii",$from,$to);
mysqli_stmt_execute($stmt);

$res =mysqli_stmt_get_result($stmt);
$pokemon = mysqli_fetch_assoc($res);

// $pokemon = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$pokemon) {
    echo json_encode(['error' => 'No se encontró ningún Pokémon en este rango']);
    exit;
}

// ✅ OPCIONAL: guardar la captura en la DB
/*
$stmtInsert = $pdo->prepare("INSERT INTO capturas (user_id, pokemon_id) VALUES (?, ?)");
$stmtInsert->execute([$_SESSION['user_id'], $pokemon['Id_Pokedex']]);
*/

echo json_encode([
    'ok' => true,
    'mensaje' => 'Roll ejecutado correctamente',
    'pokemon' => $pokemon,
    'img_url' => $pokemon['Image'] // Usa el campo Image de la base de datos
]);