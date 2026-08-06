<?php
require "../clase3-4/conexion.php";

$json = file_get_contents("php://input");
$datos = json_decode($json, true);

header("Content-Type: application/json");

if (!isset($datos["correo"], $datos["contrasena"])){
    echo json_encode([
        "success" => false,
        "message" => "alguno de los campos se encuentra vacio"
    ]);
    exit;
}
$correo = $datos["correo"];
$contrasenaIngresada = $datos["contrasena"];
$sql = "SELECT id, nombre, correo, contrasena, rol FROM usuario WHERE correo = ?";
$stmt = $conexion ->prepare($sql);

$stmt -> execute([$correo]);
$usuario = $stmt -> fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo json_encode([
        "success" =>false,
        "message" => "Credenciales incorrectas"
    ]);
    exit;
}

if (!password_verify($contrasenaIngresada, $usuario["contrasena"])){
        echo json_encode([
        "success" =>false,
        "message" => "Credenciales incorrectas"
    ]);
    exit;
}

echo json_encode(
[
        "success" =>true,
        "message" => "Login correcto"
    ]
);