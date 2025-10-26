 <link rel="stylesheet" href="../CSS/estiloPokedex.css" />
<main>
    <div class="main-title">Pokedex</div>

      <div class="search-box">
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
  <label style="display:flex; gap:5px; align-items:center;">
    <input type="checkbox" id="filtro-atrapados">
    Solo atrapados
</label>

<p id="progresoPokedex" style="font-weight:bold;"></p>
<div id="barraProgreso" style="width:1025px; height:12px; background:#ddd; border-radius:6px; margin: 10px auto; display:block;">
    <div id="barraProgresoFill" style="height:100%; width:0%; background:green; border-radius:6px;"></div>
</div>

    <div id="inventoryPoke" class="inventory">
      <div class="pokemon-card">
        <img src="https://via.placeholder.com/100" alt="img pkmn">
        <div class="pokemon-description">*nombre/n° pokedex*</div>
      </div>
      <div class="pokemon-card">
        <img src="https://via.placeholder.com/100" alt="img pkmn">
        <div class="pokemon-description">*nombre/n° pokedex*</div>
      </div>
      <div class="pokemon-card">
        <img src="https://via.placeholder.com/100" alt="img pkmn">
        <div class="pokemon-description">*nombre/n° pokedex*</div>
      </div>
      <div class="pokemon-card">
        <img src="https://via.placeholder.com/100" alt="img pkmn">
        <div class="pokemon-description">*nombre/n° pokedex*</div>
      </div>
      <div class="pokemon-card">
        <img src="https://via.placeholder.com/100" alt="img pkmn">
        <div class="pokemon-description">*nombre/n° pokedex*</div>
      </div>
      <div class="pokemon-card">
        <img src="https://via.placeholder.com/100" alt="img pkmn">
        <div class="pokemon-description">*nombre/n° pokedex*</div>
      </div>
    </div>
  </main>