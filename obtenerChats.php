<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/config/conexion.php';
$userid=$_GET['user_id'];
$stmt=mysqli_prepare("SELECT ")



?>