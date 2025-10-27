<?php
require_once 'config/conexion.php';
if (!$conexion) {
  echo json_encode(["error" => "No se pudo conectar a la base de datos"]);
  exit;
}

$idpokemon=$_POST["idpokemon"];
$sql1 = "SELECT PokemonName, Type, Second_type, Weaknesses, Description, Abilities, Second_Abilities, Abilities_Hidden, image,Id_Pokedex FROM datapokemonall where Id_Pokedex=?";
$stmt = mysqli_prepare($conexion, $sql1);
mysqli_stmt_bind_param($stmt, "i", $idpokemon);
mysqli_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$arr = [];
$idpokedex = 0;
if (mysqli_num_rows($result) > 0) {
  while ($fila = mysqli_fetch_assoc($result)) {
    $idpokedex = $fila['Id_Pokedex'];
    $fila['image'] = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/" . $idpokedex . ".png";

    $arr[] = $fila;
  }
}
if ($arr) {
  echo json_encode($arr);
} else {
  echo json_encode(["msj" => "mal ahi amigo"]);
}
?>