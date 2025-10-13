<?php
// Evitar errores por variables indefinidas
$vistaHead = $vistaHead ?? "";
$vistaHeader = $vistaHeader ?? "";
$vista = $vista ?? "";
$vistaJsBoton = $vistaJsBoton ?? "";
$vistaPokedexFunciones = $vistaPokedexFunciones ?? "";
$vistaChatCargar = $vistaChatCargar ?? "";
$vistaChatMandar = $vistaChatMandar ?? "";
$vistaBuscarUsuario = $vistaBuscarUsuario ?? "";
$vistaBotonRegistro = $vistaBotonRegistro ?? "";
$vistaBotonLogin = $vistaBotonLogin ?? "";
$vistaBotonPerfil = $vistaBotonPerfil ?? "";
$vistaBotonMain = $vistaBotonMain ?? "";
$vistaJsInventario = $vistaJsInventario ?? "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gacha-Dex</title>
    
    <!-- Archivos HEAD opcionales -->
    <?php if (!empty($vistaHead)) include $vistaHead; ?>
</head>

<body>
    <!-- Header -->
    <?php if (!empty($vistaHeader)) include $vistaHeader; ?>

    <!-- Contenido principal -->
    <main>
        <?php if (!empty($vista)) include $vista; ?>
    </main>

    <!-- Archivos JS opcionales -->
    <?php if (!empty($vistaJsBoton)) echo "<script src='{$vistaJsBoton}'></script>"; ?>
    <?php if (!empty($vistaPokedexFunciones)) echo "<script src='{$vistaPokedexFunciones}'></script>"; ?>
    <?php if (!empty($vistaChatCargar)) echo "<script src='{$vistaChatCargar}'></script>"; ?>
    <?php if (!empty($vistaChatMandar)) echo "<script src='{$vistaChatMandar}'></script>"; ?>
    <?php if (!empty($vistaBuscarUsuario)) echo "<script src='{$vistaBuscarUsuario}'></script>"; ?>
    <?php if (!empty($vistaBotonRegistro)) echo "<script src='{$vistaBotonRegistro}'></script>"; ?>
    <?php if (!empty($vistaBotonLogin)) echo "<script src='{$vistaBotonLogin}'></script>"; ?>
    <?php if (!empty($vistaBotonPerfil)) echo "<script src='{$vistaBotonPerfil}'></script>"; ?>
    <?php if (!empty($vistaBotonMain)) echo "<script src='{$vistaBotonMain}'></script>"; ?>
    <?php if (!empty($vistaJsInventario)) echo "<script src='{$vistaJsInventario}'></script>"; ?>
</body>
</html>
