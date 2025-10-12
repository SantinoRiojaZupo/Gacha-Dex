<?php
// proxy.php -> sirve para "puentear" la restricción de Chrome (OpaqueResponseBlocking)

// 1. Validar si vino la URL
if (!isset($_GET['url'])) {
    http_response_code(400);
    echo "Falta el parámetro 'url'";
    exit;
}

// 2. Sanitizar un poco (para evitar que te pidan cualquier cosa)
$url = filter_var($_GET['url'], FILTER_VALIDATE_URL);

if ($url === false || !str_starts_with($url, "https://archives.bulbagarden.net/")) {
    http_response_code(400);
    echo "URL inválida o no permitida";
    exit;
}

// 3. Pedir la imagen desde el servidor
$imgData = @file_get_contents($url);

if ($imgData === false) {
    http_response_code(502);
    echo "No se pudo obtener la imagen";
    exit;
}

// 4. Detectar tipo MIME básico según extensión
$ext = strtolower(pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION));
switch ($ext) {
    case "jpg":
    case "jpeg":
        header("Content-Type: image/jpeg");
        break;
    case "png":
        header("Content-Type: image/png");
        break;
    case "gif":
        header("Content-Type: image/gif");
        break;
    default:
        header("Content-Type: application/octet-stream");
}

// 5. Enviar la imagen al navegador
echo $imgData;