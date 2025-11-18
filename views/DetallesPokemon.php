<head>
  <link rel="stylesheet" href="../CSS/estilosDetallespokemon.css" />
  <style>
    /* Sobrescribe el fondo global */
    body {
      background-image: url('../imagenes/pokemonfondodetallado.jpg') !important;
      background-size: cover !important;
      background-position: center !important;
      background-repeat: no-repeat !important;
    }

    /* Asegura que el contenido principal quede por encima si hay overlays */
    .main-content {
      position: relative;
      z-index: 1;
    }
  </style>
</head>

<div class="detalles-page">
  <header class="header">
   <button id="botonMenuDP">Menú</button>
  <ul id="menuDP">
    <li id="dp1">Pagina Principal</li>
    <li id="dp2">Pokedex</li>
    <li id="dp3">Chat</li>
  </ul>
    <div class="search-section">
      <input type="text" placeholder="Buscar Pokemon..." id="buscarPokemonDP">
      <button class="search-btn" id="buscarPokemonDPbtn" onclick="buscarPokemon()">Busca ya!</button>
      <ul id="resultados" class="resultadosInvisibles"></ul>
    </div>

    <link rel="stylesheet" href="../CSS/estilosDetallespokemon.css" />
  </header>
  <button id="volver" onclick="volver()">volver</button>
</div>
<button id="anterior"></button>
<button id="posterior"></button>
<div class="detalles-page">
  <div class="pokemon-card">
    <div class="pokemon-image">
      <img id="0" src="" alt="???">
    </div>
    <div class="pokemon-info">
      <h1 class="pokemon-name" id="1">Pokemon</h1>
      <div id="btnVariantes"></div>
      <div class="pokemon-description" id="2">*Descripcion del pokemon*</div>
      <div class="pokemon-details">
        <p><strong>Tipo<br></strong> <span class="tag" id="3">*Tipo*</span></p>
        <p><strong>Debilidades<br></strong> <span class="tag" id="4">*Debilidades*</span></p>
        <p><strong>Habilidad/es<br></strong> <span class="tag" id="5">*Habilidad/es*</span></p>
        <p><strong>Habilidad oculta<br></strong> <span class="tag" id="6">*Habilidad oculta*</span></p>
      </div>
    </div>
  </div>
</div>
<script>
  var idpokemon = <?php echo json_encode($_GET['idpokemon']); ?>;
  function volver(){
   window.history.back()
  }
</script>
<script src="../JS/MostrarDatosPokemon.js">
</script>
<script src="../JS/botonMenuDP.js">
</script>
<script src="../JS/menuOpcionesDP.js">
</script>
<script src="../JS/buscarPokemon.js">