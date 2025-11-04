<?php
require_once __DIR__ . '/config/conexion.php';
header('Content-Type: application/json');
session_start();
$pokemonBuscado = $_GET['query'] ?? '';
$pokemonesEncontrados = [];
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "No has iniciado sesión"]);
    exit;
} else if (empty($pokemonBuscado)) {
    echo json_encode(["error" => "no escribiste nada"]);
    exit;
} else {
    $paramBusqueda = "%" . $pokemonBuscado . "%";
    $sql = 'SELECT Id_Pokedex, PokemonName FROM datapokemonall WHERE PokemonName LIKE ? LIMIT 5';
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "s", $pokemonBuscado);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$result) {
        echo json_encode(["error" => "Error en la consulta"]);
        exit;
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $pokemonesEncontrados[] = $row;
        }
        echo json_encode($pokemonesEncontrados);
        exit;
    }
}