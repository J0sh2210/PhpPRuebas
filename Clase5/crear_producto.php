<?php
$nombre = "Laptop HP victus";
$precio = 7999.99;
$stock = 15;
require "../clase3-4/conexion.php";

$sql = "INSERT INTO Productos(
        nombre,
        precio,
        stock) VALUES (
        ?,
        ?,
        ?
        )
";
$stmt = $conexion -> prepare($sql);

$resultado = $stmt ->execute([$nombre,$precio,$stock]);
header("Content-Type: Application/json");
if ($resultado) {
    echo json_encode([
        "success" => true ,
        "message"=>"Producto creado correctamente"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "no se pudo crear el producto"
    ]);
}
