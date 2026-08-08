<?php

session_start();

header("Content-Type: application/json" );

if (!isset($_SESSION["usuario"])) {
    echo json_encode([
        "success" => false,
        "message" =>"acceso no permitido"
    ]);
    exit;
}

if ($_SESSION["usuario"] ["rol"] != "administrador" ){
    echo json_encode([
        "success" => false,
        "message" => "no tienes permisos para acceder"
    ]);
    exit;
}

echo json_encode([
    "success" => true,
    "message" => "bienvenido administrador"
]);
