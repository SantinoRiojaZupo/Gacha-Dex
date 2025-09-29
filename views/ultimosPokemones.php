<?php
// -----------------------------------------
// ultimosPokemones.php
// Devuelve los últimos 10 pokémon atrapados
// por el usuario logueado
// -----------------------------------------

require_once "../config/conexion.php";
session_start();

header('Content-Type: application/json');

// -----------------------------------------
// 1. Verificar sesión activa
// -----------------------------------------
if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        'ok'    => false,
        'error' => 'Inicia Sesión'
    ]);
    exit;
}

$userId = $_SESSION['user_id'];

// -----------------------------------------
// 2. Consulta SQL: últimos 10 pokémon atrapados
// Se usa Id_PokemonCatched para el orden
// -----------------------------------------
$sql = "
    SELECT 
        pc.Id_PokemonCatched, 
        d.PokemonName, 
        d.Image
    FROM pokemoncatched pc
    INNER JOIN datapokemonall d 
        ON pc.Id_Pokedex = d.Id_Pokedex
    WHERE pc.Id_User = ?
    ORDER BY pc.Id_PokemonCatched DESC
    LIMIT 10
";

// -----------------------------------------
// 3. Preparar y ejecutar consulta
// -----------------------------------------
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

// -----------------------------------------
// 4. Guardar resultados en array
// -----------------------------------------
$pokemones = [];
while ($row = mysqli_fetch_assoc($res)) {
    $pokemones[] = $row;
}

// -----------------------------------------
// 5. Devolver JSON con resultados
// -----------------------------------------
echo json_encode([
    'ok'       => true,
    'pokemones'=> $pokemones
], JSON_UNESCAPED_UNICODE);

?>
