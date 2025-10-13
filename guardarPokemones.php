<?php
// guardarPokemones.php
ob_start();                 // capturamos cualquier salida accidental
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/config/conexion.php';
session_start();

header('Content-Type: application/json; charset=utf-8');

function finish($resp) {
    $buf = ob_get_clean();
    if (!empty($buf)) $resp['debug'] = $buf;
    echo json_encode($resp, JSON_UNESCAPED_UNICODE);
    exit;
}

$response = ['ok' => false];

// 0) chequear conexion (ajustá si tu variable de conexión tiene otro nombre)
if (!isset($conexion) || !($conexion instanceof mysqli)) {
    $response['error'] = 'No DB connection (variable $conexion no encontrada)';
    finish($response);
}

// 1) sesión
if (!isset($_SESSION['user_id'])) {
    $response['error'] = 'Debes iniciar sesión';
    finish($response);
}

// 2) validar POST
if (!isset($_POST['Id_Pokedex']) || !is_numeric($_POST['Id_Pokedex'])) {
    $response['error'] = 'Id_Pokedex inválido o ausente';
    finish($response);
}

$idUser = (int) $_SESSION['user_id'];
$idPokedex = (int) $_POST['Id_Pokedex'];
$is_Shiny = (int) $_POST['Is_Shiny']

// 3) insertar

$sql = "INSERT INTO pokemoncatched (Id_User, Id_Pokedex, Is_Shiny) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conexion, $sql);
if (!$stmt) {
    $response['error'] = 'Error preparando query: ' . mysqli_error($conexion);
    finish($response);
}

mysqli_stmt_bind_param($stmt, "iii", $idUser, $idPokedex, $is_Shiny);
$executed = mysqli_stmt_execute($stmt);
if (!$executed) {
    $response['error'] = 'Error al ejecutar INSERT: ' . mysqli_error($conexion);
    $response['errno'] = mysqli_errno($conexion);
    finish($response);
}

// 4) éxito
$response['ok'] = true;
$response['mensaje'] = 'Pokémon guardado correctamente';
$response['insert_id'] = mysqli_insert_id($conexion);

mysqli_stmt_close($stmt);
mysqli_close($conexion);

finish($response);