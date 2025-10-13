<?php
require_once __DIR__ . '/config/conexion.php';
session_start();
header('Content-Type: application/json; charset=utf-8');

// 🔒 Verificar sesión
if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        'ok' => false,
        'error' => 'Inicia sesión antes de continuar.'
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$userid = $_SESSION['user_id'];

// 🧩 Función para calcular la generación según el ID del pokémon
function obtenerGeneracion($id) {
    $rangos = [
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

    foreach ($rangos as $gen => [$min, $max]) {
        if ($id >= $min && $id <= $max) return $gen;
    }
    return null;
}

// 🔍 Consulta
$sql = "
    SELECT 
        d.Id_Pokedex AS id_pokedex,
        d.PokemonName AS nombre,
        d.Type AS tipo,
        d.Second_Type AS tipo_secundario,
        d.Image AS imagen_normal,
        c.Is_Shiny AS shiny
    FROM pokemoncatched c
    INNER JOIN datapokemonall d ON c.Id_Pokedex = d.Id_Pokedex
    WHERE c.Id_User = ?
";

$stmt = mysqli_prepare($conexion, $sql);
if (!$stmt) {
    echo json_encode([
        'ok' => false,
        'error' => 'Error al preparar la consulta: ' . mysqli_error($conexion)
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

mysqli_stmt_bind_param($stmt, "i", $userid);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

if (!$res) {
    echo json_encode([
        'ok' => false,
        'error' => 'Error al ejecutar la consulta: ' . mysqli_error($conexion)
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// 🧾 Construir resultado
$pokemones = [];
while ($fila = mysqli_fetch_assoc($res)) {
    $id = (int)$fila['id_pokedex'];
    $fila['generacion'] = obtenerGeneracion($id);

    // 🟡 Imagen shiny o normal
    if ((int)$fila['shiny'] === 1) {
        $fila['imagen'] = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/{$id}.png";
    } else {
        $fila['imagen'] = $fila['imagen_normal'] ?: `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/{$id}.png`;
    }

    unset($fila['imagen_normal']);
    $pokemones[] = $fila;
}

// ✅ Salida JSON final
echo json_encode([
    'ok' => true,
    'pokemones' => $pokemones
], JSON_UNESCAPED_UNICODE);