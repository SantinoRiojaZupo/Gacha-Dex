<?php
require_once "../config/conexion.php";
?>
<div id="barraInicio">
    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="user-profile">
            <span>¡Hola, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
    <?php else: ?>
    <button id="botonRegister">Registrate!</button>
    <button id="botonLogin">Inicie sesion!</button>
    <?php endif; ?>
    <input type="search" id="buscadorPokemon" placeholder="Buscar...">
    <button id="buscarPokemon">Busca ya!</button>

    <!-- Botón para desplegar menú -->
    <button id="botonMenu">Menú</button>

    <!-- Menú separado -->
    <ul id="menu">
        <li>Pagina Principal</li>
        <li>Registro</li>
        <li>INICIO DE SESION</li>
    </ul>
</div>