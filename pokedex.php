<?php
session_start();
require_once __DIR__ . '/config/conexion.php';

header('Content-Type: application/json; charset=utf-8');

// ⚠️ Verificar login
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["ok" => false, "error" => "No logueado"]);
    exit;
}

$idusuario = $_SESSION['user_id'];

// ✅ Función generación (igual al inventario)
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

// ✅ Consulta estandarizada
$sql = "
SELECT 
    d.Id_Pokedex AS id_pokedex,
    d.PokemonName AS nombre,
    d.Type AS tipo,
    d.Second_Type AS tipo_secundario,
    d.Image AS imagen_normal,
    CASE 
        WHEN c.Id_Pokedex IS NOT NULL THEN 1
        ELSE 0
    END AS atrapado
FROM datapokemonall d
LEFT JOIN (
    SELECT Id_Pokedex, Id_User
    FROM pokemoncatched
    WHERE Id_User = ?
    GROUP BY Id_Pokedex
) c ON d.Id_Pokedex = c.Id_Pokedex
ORDER BY d.Id_Pokedex ASC;
";

$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "i", $idusuario);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

// ✅ Formar respuesta
$pokedex = [];

while ($fila = mysqli_fetch_assoc($res)) {
    $id = (int)$fila['id_pokedex'];
    $fila['generacion'] = obtenerGeneracion($id);
    $fila['imagen'] = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/{$id}.png";
    unset($fila['imagen_normal']);
    $pokedex[] = $fila;
}

// ✅ JSON final uniforme
echo json_encode([
    "ok" => true,
    "pokedex" => $pokedex
], JSON_UNESCAPED_UNICODE);

