<!DOCTYPE html>
<html lang="es">
  
<head>
   
  <meta charset="UTF-8" />
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <title>Login</title>
</head>

<body>
  <div class="login-container">
    <img src="../imagenes/Master-Ball.png" alt="Logo" class="logo" />
    <h2>Iniciar Sesión</h2>
    <form action="#" method="POST">
      <div class="form-group">
        <label for="Usuario">Nombre De Usuario</label>
        <input type="USUARIO" id="em" name="USER"  required />
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required />
      </div>
      <button type="submit" class="login-button">Entrar</button>
    </form>
    <div class="register-link">
      ¿No tienes cuenta? <a href="#">Regístrate</a>
    </div>
  </div>
</body>
</html>