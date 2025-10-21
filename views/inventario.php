<main class="contenido-inventario">
  <!--  Barra de búsqueda -->
  <div class="busqueda-contenedor">
    <input type="text" id="busqueda" placeholder="Buscar Pokémon...">
  </div>

  <!--  Filtros -->
  <div class="filtros-contenedor">
    <select id="filtro-tipo">
      <option value="">Filtrar por tipo</option>
      <option value="Steel"> Steel</option>
      <option value="Flying"> Flying</option>
      <option value="Ice"> Ice</option>
      <option value="Bug"> Bug</option>
      <option value="Normal"> Normal</option>
      <option value="Rock"> Rock</option>
      <option value="Fighting"> Fighting</option>
      <option value="Fairy"> Fairy</option>
      <option value="Poison"> Poison</option>
      <option value="Fire"> Fire</option>
      <option value="Water"> Water</option>
      <option value="Grass"> Grass</option>
      <option value="Electric"> Electric</option>
      <option value="Ground"> Ground</option>
      <option value="Dragon"> Dragon</option>
      <option value="Ghost"> Ghost</option>
      <option value="Psychic"> Psychic</option>
      <option value="Dark"> Dark</option>
    </select>

    <select id="filtro-generacion">
      <option value="">Filtrar por generación</option>
      <option value="1">Gen 1</option>
      <option value="2">Gen 2</option>
      <option value="3">Gen 3</option>
      <option value="4">Gen 4</option>
      <option value="5">Gen 5</option>
      <option value="6">Gen 6</option>
      <option value="7">Gen 7</option>
      <option value="8">Gen 8</option>
      <option value="9">Gen 9</option>
    </select>
  </div>

  <!--  Lista de Pokémon -->
  <div class="contenedor-pokemones">
    <div class="card-pokemon">
        <!-- pokemonImagen -->
      <img src="" alt="pokemonImagen">
      <!-- nombre -->
      <h3>nombre: </h3>
      <!-- tipo -->
      <p>Tipo: </p>
    </div>

    <!-- más pokémon dinámicos -->
  </div>
</main>

<script>
  const idUsuario = <?= json_encode($idUsuarioPerfil); ?>;
</script>
<script src="/Gacha-Dex/js/inventario.js"></script>
