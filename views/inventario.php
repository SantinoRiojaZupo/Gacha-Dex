<main class="contenido-inventario">
  <!--  Barra de búsqueda -->
  <div class="busqueda-contenedor">
    <input type="text" id="busqueda" placeholder="Buscar Pokémon...">
  </div>

  <!--  Filtros -->
  <div class="filtros-contenedor">
    <select id="filtro-tipo">
      <option value="">Filtrar por tipo</option>
      <option value="acero"> acero</option>
      <option value="volador"> volador</option>
      <option value="hielo"> hielo</option>
      <option value="bicho"> bicho</option>
      <option value="normal"> normal</option>
      <option value="roca"> roca</option>
      <option value="lucha"> lucha</option>
      <option value="hada"> hada</option>
      <option value="veneno"> veneno</option>
      <option value="fuego"> Fuego</option>
      <option value="agua"> Agua</option>
      <option value="planta"> Planta</option>
      <option value="electrico"> Eléctrico</option>
      <option value="tierra"> Tierra</option>
      <option value="dragon"> dragon</option>
      <option value="fantasma"> fantasma</option>
      <option value="siniestro"> siniestro</option>
    </select>

    <select id="filtro-generacion">
      <option value="">Filtrar por generación</option>
      <option value="1">Gen 1</option>
      <option value="2">Gen 2</option>
      <option value="3">Gen 3</option>
      <option value="4">Gen 4</option>
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