<?php

require "../clase3-4/conexion.php";
$id = 3;
$salario = 8500.50;
$sql = "UPDATE empleados SET salario = ? WHERE id = ?";

$stmt = $conexion ->prepare($sql);
$resultado = $stmt -> execute([$salario,$id ]);

$rowscount = $stmt->rowCount();

header("Content-Type: application/json");

if($resultado){
    if($rowscount > 0){
    echo json_encode([
        "success" => true,
        "message" => "salario actualizado",
        "rowAffected"=> $rowscount
    ]);
    } else {
       echo json_encode([
        "success" => false,
        "message" => "No se pudo actualizar el saldo",
        "rowAffected"=> $rowscount
    ]);  
    }
} else {
       echo json_encode([
        "success" => false,
        "message" => "No se pudo realizar el query",
        "rowAffected"=> 0
    ]); 
}