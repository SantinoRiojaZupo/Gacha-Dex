<?php
session_start();
require_once 'config/conexion.php';
if (!$conexion) {
  echo json_encode(["error" => "No se pudo conectar a la base de datos"]);
  exit;
}
$user_id=$_SESSION["user_id"];
$idpokemon=$_POST["idpokemon"];
$sql1 = "SELECT variant_pokemon.PokemonName FROM datapokemonall inner join variant_pokemon on datapokemonall.Id_Pokedex=variant_pokemon.Id_Pokedex where datapokemonall.Id_Pokedex=?;";
$stmt = mysqli_prepare($conexion, $sql1);
mysqli_stmt_bind_param($stmt, "i", $idpokemon);
mysqli_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$fila = mysqli_fetch_assoc( $result );
if (!empty($fila)) {
$sql1 = "SELECT Id_Variant,variant_pokemon.PokemonName, variant_pokemon.Type,  variant_pokemon.Second_type, variant_pokemon.Weaknesses, variant_pokemon.Description, variant_pokemon.Abilities, variant_pokemon.Second_Abilities, variant_pokemon.Abilities_Hidden, variant_pokemon.image, variant_pokemon.Id_Pokedex FROM datapokemonall inner join pokemoncatched on datapokemonall.Id_Pokedex=pokemoncatched.Id_Pokedex  and Id_User=?  
inner join variant_pokemon on datapokemonall.Id_Pokedex=variant_pokemon.Id_Pokedex where datapokemonall.Id_Pokedex=?;";
$stmt = mysqli_prepare($conexion, $sql1);
mysqli_stmt_bind_param($stmt, "ii",$user_id, $idpokemon);
mysqli_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$arr = [];
$idpokedex = 0;
if (mysqli_num_rows($result) >= 0) {
  while ($fila = mysqli_fetch_assoc($result)) {
    $idpokedex = $fila['Id_Pokedex'];
    $nombre = strtolower($fila['PokemonName']);
   // $fila['image'] = "https://img.pokemondb.net/artwork/large/" . $nombre . ".jpg";
   if($idpokedex<10){
    $fila['image'] = "https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/". "00" .$idpokedex .".png";
   }
    else if($idpokedex<100){
    $fila['image'] = "https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/". "0" .$idpokedex .".png";
   }
   else{
    $fila['image'] = "https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/" .$idpokedex .".png";
   }
     
    $arr[] = $fila;
  }
}
if ($arr) {
  echo json_encode($arr);
} else {
  echo json_encode($result);
}
}
else{
  $sql1 = "SELECT PokemonName, Type,  Second_type, Weaknesses, Description, Abilities, Second_Abilities, Abilities_Hidden, image, datapokemonall.Id_Pokedex FROM datapokemonall inner join pokemoncatched on datapokemonall.Id_Pokedex=pokemoncatched.Id_Pokedex  and Id_User=?  where datapokemonall.Id_Pokedex=?;";
$stmt = mysqli_prepare($conexion, $sql1);
mysqli_stmt_bind_param($stmt, "ii",$user_id, $idpokemon);
mysqli_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$arr = [];
$idpokedex = 0;
if (mysqli_num_rows($result) >= 0) {
  while ($fila = mysqli_fetch_assoc($result)) {
    $idpokedex = $fila['Id_Pokedex'];
    $nombre = strtolower($fila['PokemonName']);
   // $fila['image'] = "https://img.pokemondb.net/artwork/large/" . $nombre . ".jpg";
   if($idpokedex<10){
    $fila['image'] = "https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/". "00" .$idpokedex .".png";
   }
    else if($idpokedex<100){
    $fila['image'] = "https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/". "0" .$idpokedex .".png";
   }
   else{
    $fila['image'] = "https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/" .$idpokedex .".png";
   }
     
    $arr[] = $fila;
  }
}
if ($arr) {
  echo json_encode($arr);
} else {
  echo json_encode($result);
}
}
?>