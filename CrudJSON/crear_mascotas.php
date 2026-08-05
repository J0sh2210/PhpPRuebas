<?php

require "../clase3-4/conexion.php";
$json = file_get_contents("php://input");

$datos = json_decode($json, true);

header("Content-Type: application/json");
if (!isset ($datos ["nombre"], $datos ["especie"], $datos ["edad"])) {
    echo json_encode([
        "success" => false,
        "message" => "falta algun dato"
    ]);

    exit;
}

$nombre = $datos["nombre"];
$especie = $datos["especie"];
$edad = $datos["edad"];

$sql = "INSERT INTO mascotas (nombre, especie , edad) 
        VALUES (? ,? , ?)";

$stmt = $conexion -> prepare($sql);
$resultado = $stmt->execute([$nombre , $especie, $edad]);

echo json_encode([
    "success" => $resultado,
    "message" => "mascota registrada correctamente",
    "macotaID" => $conexion->lastInsertId()
]);