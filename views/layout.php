<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilosPaginaPrincipal.css" />
    <link rel="stylesheet" href="../CSS/estilosBotonMenu.css">
    <title>Gacha-Dex</title>
</head>

<body>
<header>
<nav>
      <a href="index.php?page=PaginaPrincipal">Inicio</a>
      <a href="index.php?page=registro">Registro</a>
      <a href="index.php?page=login">Login</a>
    </nav>
</header>    
    <main>
        <?php
          if(isset($vista)){
           include($vista);
          } 
          else {
            "<p>Página no encontrada</p>";
          }


        ?>
</main>
        
</body>
</html>