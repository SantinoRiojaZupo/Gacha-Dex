  <header class="header">

    <button class="menu-btn">☰ Menu</button>
    <div class="search-section">
      <input type="text" placeholder="Buscar Pokemon..." class="search-input">
      <button class="search-btn">Busca ya!</button>
    </div>
    <link rel="stylesheet" href="../CSS/estilosDetallespokemon.css" />
  </header>

  <div class="pokemon-card">
    <div class="pokemon-image">
      <img src="" alt="pokemon">
    </div>
    <div class="pokemon-info">
      <h1 class="pokemon-name">Pokemon</h1>
      <div class="pokemon-description">*Descripcion del pokemon*</div>
      <div class="pokemon-details">
        <p><strong>Tipo:</strong> <span class="tag">*Tipo*</span></p>
        <p><strong>Debilidades:</strong> <span class="tag">*Debilidades*</span></p>
        <p><strong>Habilidad/es:</strong> <span class="tag">*Habilidad/es*</span></p>
      </div>
    </div>
  </div>
  <?php
  require_once '../config/conexion.php';
  if (!$conexion) {
    echo json_encode(["error" => "No se pudo conectar a la base de datos"]);
    exit;
  }

  $sql1 = "SELECT PokemonName, Type, Second_type, Weaknesses, Description, Abilities, Second_Abilities, image FROM datapokemonall where Id_Pokedex=?";
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