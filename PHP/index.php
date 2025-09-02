<?php
$page=$_GET['page'] ?? "paginaPrincipal";

switch ($page) {
  case 'paginaPrincipal':
    $vista = 'views/paginaPrincipal.php';
    break;
    default: 
    $vista = 'views/paginaPrincipal.php';
    break;
}
?>