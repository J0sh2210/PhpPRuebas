<?php
require "../clase3-4/conexion.php";
$json = file_get_contents("php://input");
$datos = json_decode($json, true);

header("Content-Type: application/json");
if (
    !isset($datos["nombre"], $datos["correo"], $datos["contrasena"])
){
    echo json_encode([
        "success" => false,
        "message" => "Falta algun dato"
    ]);
    exit;
}

$nombre = $datos["nombre"];
$correo = $datos["correo"];
$contrasenaplana = $datos["contrasena"];
$contrasenaHash = password_hash($contrasenaplana, PASSWORD_DEFAULT);
$sql = "INSERT INTO usuario(
    nombre,
    correo,
    contrasena
)
VALUES(?,?,?)";

$stmt = $conexion ->prepare($sql);
$resultado = $stmt ->execute([$nombre, $correo, $contrasenaHash]);


    echo json_encode([
        "success" => $resultado,
        "message" => "usuario registrado exitosamente",
        "UsuarioId" => $conexion->lastInsertId()
    ]);
