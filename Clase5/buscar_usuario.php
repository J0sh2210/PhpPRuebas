<?php

require "C:/xampp/htdocs/pruebas/clase3-4/conexion.php";
$id = 2;
$sql = "SELECT * FROM usuarios WHERE id = ?";

$smtmt = $conexion ->prepare($sql);
$smtmt -> execute([$id]);

$usuarios = $smtmt -> fetch(PDO::FETCH_ASSOC);
header("Content-Type: application/json") ;
echo json_encode($usuarios);