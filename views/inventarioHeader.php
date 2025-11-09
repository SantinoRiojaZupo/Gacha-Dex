<?php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario Pokémon</title>
    <link rel="stylesheet" href="../CSS/estiloInventario.css">
    
</head>
<body>
    <header class="header-inventario">
        <div class="header-left">
            <a href="index.php?page=main" class="logo">
                <img src="../imagenes/gachadex.png" alt="Pokeball" class="logo-img">
                <span>Gacha-Dex</span>
            </a>
        </div>

        <div class="header-center">
            <h1>Inventario Pokémon</h1>
        </div>

        <div class="header-right">
        
            <a href="index.php?page=perfil&id=<?php echo $idUsuarioPerfil; ?>" class="perfil-link">Volver al perfil</a>

        </div>
    </header>
