<?php

session_start();

header("Content-Type: application/json");

if (!isset ($_SESSION["usuario"])){
    echo json_encode([
        "success" => false,
        "message" => "no autorizado"
    ]);
    exit;
}

echo json_encode([
    "success" => true,
    "message" => $_SESSION["usuario"]
]);