<?php
require_once "../config/conexion.php";

header('Content-Type: application/json');

$from = isset($_POST['from']) ? intval($_POST['from']) : 1;
$to   = isset($_POST['to']) ? intval($_POST['to']) : 1025;

$stmt = $pdo->prepare("SELECT * FROM DATEPOKEMONALL WHERE Id_Pokedex BETWEEN ? AND ?");
$stmt->execute([$from, $to]);

$pokemons = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($pokemons);
?>