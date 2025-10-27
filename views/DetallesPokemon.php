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
    <button id="botonMenu">Menú</button>
    <ul id="menu">
      <li id="li1">Pagina Principal</li>
      <li id="li2">Pokedex</a></li>
      <li id="li3">Chat</a></li>
    </ul>
    <div class="search-section">
      <input type="text" placeholder="Buscar Pokemon..." class="search-input">
      <button class="search-btn">Busca ya!</button>
    </div>

    <link rel="stylesheet" href="../CSS/estilosDetallespokemon.css" />
  </header>

  <div class="pokemon-card">
    <div class="pokemon-image">
      <img id="0" src="" alt="pokemon">
    </div>
    <div class="pokemon-info">
      <h1 class="pokemon-name" id="1">Pokemon</h1>
      <div class="pokemon-description" id="2">*Descripcion del pokemon*</div>
      <div class="pokemon-details">
        <p><strong>Tipo:</strong> <span class="tag" id="3">*Tipo*</span></p>
        <p><strong>Debilidades:</strong> <span class="tag" id="4">*Debilidades*</span></p>
        <p><strong>Habilidad/es:</strong> <span class="tag" id="5">*Habilidad/es*</span></p>
        <p><strong>Habilidad oculta:</strong> <span class="tag" id="6">*Habilidad oculta*</span></p>
      </div>
    </div>
  </div>

</div>
<script>
  const idpokemon = <?php echo json_encode($_GET['idpokemon']); ?>;
</script>
<script src="../JS/MostrarDatosPokemon.js">
</script>
<script src="../JS/botonMenu.js">
</script>
<script src="../JS/menuOpciones.js">