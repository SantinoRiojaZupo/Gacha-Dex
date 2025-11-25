<?php
require_once __DIR__ . '/config/conexion.php';
session_start();

header('Content-Type: application/json; charset=utf-8');

function error($msg) {
    echo json_encode(['error' => $msg]);
    exit;
}

//  Chequear conexión
if (!isset($conexion) || !($conexion instanceof mysqli)) {
    error('No DB connection ($conexion no encontrado)');
}

//  Chequear sesión
if (!isset($_SESSION['user_id'])) {
    error('Debes iniciar sesión');
}

//  Validar datos

if (!isset($_POST['Is_Shiny'])) {
    error('Is_Shiny ausente');
}

$idUser    = (int) $_SESSION['user_id'];
$idPokedex = (int) $_POST['Id_Pokedex'];
$isShiny   = (int) $_POST['Is_Shiny'];
$pokemonName =  $_POST['PokemonName'];

//  Insertar captura
$sql = "INSERT INTO pokemoncatched (Id_User, Id_Pokedex, Is_Shiny, PokemonName)
        VALUES (?, ?, ?, ? )";
$stmt = $conexion->prepare($sql);

if (!$stmt) {
    error('Error preparando query: ' . $conexion->error);
}

if (!$stmt->bind_param("iiis", $idUser, $idPokedex, $isShiny , $pokemonName)) {
    error('Error en bind_param: ' . $stmt->error);
}

if (!$stmt->execute()) {
    error('Error al ejecutar INSERT: ' . $stmt->error);
}

$response = [
    'ok'        => true,
    'mensaje'   => 'Pokémon guardado correctamente',
    'insert_id' => $stmt->insert_id
];

$stmt->close();
$conexion->close();

echo json_encode($response, JSON_UNESCAPED_UNICODE);
exit;
