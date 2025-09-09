  <link rel="stylesheet" href="../CSS/Registro.css" /><!-- cambie la conexion -->
  
  <div class="login-container">
    <img src="../imagenes/Master-Ball.png" alt="Logo" class="logo" />

    <h2>Registrarse</h2>

    <!-- Formulario de registro -->
    <form id="formRegistro" autocomplete="off">
      <div class="form-group">
        <label for="Usuario">Nombre de Usuario</label>
        <input name="Usuario" required />
      </div>

      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="contraseña" required />
      </div>

      <div class="form-group">
        <label for="password2">Confirmar contraseña</label>
        <input type="password" name="contraseña-2" placeholder="Repite tu contraseña" required />
      </div>

      <button type="button" id= "botonRegistro">Registrarse</button>
    </form>
    <div class="register-link">
      ¿Ya tienes cuenta? <a href="login.html">Inicia sesión</a>
    </div>
  </div>