<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
<style>
  /* Esto evita que los estilos viejos del layout afecten */
  body {
    all: unset;
    display: block;
    margin: 0;
    padding: 0;
    font-family: 'PokemonGB', sans-serif;
    background: linear-gradient(to bottom, #6fb1fc, #4364f7, #1e3c72);
    min-height: 100vh;
    color: white;
  }
</style>
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
            <h1>Tu Inventario Pokémon</h1>
        </div>

        <div class="header-right">
            <a href="index.php?page=perfil" class="perfil-link">Volver al perfil</a>
        </div>
    </header>