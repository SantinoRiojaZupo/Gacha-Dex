 <link rel="stylesheet" href="../CSS/estilosUsuarios.css">
  <div class="login-container"></div>
  <div class="perfil-container">
    <div class="perfil-info">
      <h2>Información del Usuario</h2>
      <h5>Foto de perfil</h5>
      <br>
      <button>Seleccionar Imagen</button>
      <h2>Username </h2> 
      <p>visible para todos (obligatorio)</p>
      <input type="text" placeholder="Username" required name="nuevoNombre">
      <h2>Bio </h2>
      <textarea rows="4" placeholder="Bio (opcional)" id="bios"></textarea>
      <button onclick="cambiarDescripcion()">Guardar cambios</button>
    </div>

    <div class="pokemons">
      <div>
        <h3>Tus Shiny</h3>
        <p>[Espacio vacío para futuros shiny]</p>
      </div>
      <div>
        <h3>Pokémon Favoritos</h3>
      </div>
    </div>

    <div class="sidebar">
      <div class="sprite-box">Sprite tu pkmn1</div>
      <div class="sprite-box">Sprite tu pkmn2</div>
      <div class="sprite-box">Sprite tu pkmn3</div>
      <div class="sprite-box">Sprite tu pkmn4</div>
    </div>
    <script src="../JS/perfil.js"></script>
  </div>

  