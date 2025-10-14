<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/config/conexion.php';

if (!$conexion) {
    echo json_encode(["error" => "No se pudo conectar a la base de datos"]);
    exit;
}

if (!isset($_POST["PokemonCatched"])) {
    echo json_encode(["error" => "Falta parámetro PokemonCatched"]);
    exit;
}

$user_id = $_SESSION["user_id"];
$idPokemon = intval($_POST["PokemonCatched"]);

$sql = "UPDATE pokemoncatched 
        SET Favorite_Pokemon = CASE 
            WHEN Favorite_Pokemon = 1 THEN 0  -- alterna entre 1 y 0
            ELSE 1 
        END
        WHERE id_PokemonCatched = $idPokemon";

if (mysqli_query($conexion, $sql)) {
    echo json_encode(["ok" => true, "msj" => "Estado de favorito actualizado"]);
} else {
    echo json_encode(["error" => "Error al actualizar favorito", "detalle" => mysqli_error($conexion)]);
}
?>
