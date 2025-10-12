<?php
require_once __DIR__ . '/config/conexion.php';
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        'ok' => false,
        'error' => 'Inicia Sesión'
    ]);
    exit;
}

$userId = $_SESSION['user_id'];

// Últimos 10 Pokémon
$sql = "
    SELECT 
        pc.Id_PokemonCatched, 
        pc.Id_Pokedex, 
        d.PokemonName, 
        d.Image
    FROM pokemoncatched pc
    INNER JOIN datapokemonall d 
        ON pc.Id_Pokedex = d.Id_Pokedex
    WHERE pc.Id_User = ?
    ORDER BY pc.Id_PokemonCatched DESC
    LIMIT 10
";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

$pokemones = [];
while ($row = mysqli_fetch_assoc($res)) {
    $pokemones[] = $row;
}

// Obtener pity actual
$sqlPity = "SELECT Pity FROM users WHERE Id_User = ?";
$stmtPity = mysqli_prepare($conexion, $sqlPity);
mysqli_stmt_bind_param($stmtPity, "i", $userId);
$stmtPity->execute();
$resPity = mysqli_stmt_get_result($stmtPity);
$pityData = mysqli_fetch_assoc($resPity);
$pityActual = intval($pityData['Pity']);

echo json_encode([
    'ok'        => true,
    'pokemones' => $pokemones,
    'pity'      => $pityActual
], JSON_UNESCAPED_UNICODE);
