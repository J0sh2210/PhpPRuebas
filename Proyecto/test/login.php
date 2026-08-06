<?php

session_start();

$_SESSION["usuario"] = [
    "id"=>1,
    "nombre" => "Josue",
    "rol" => "administrador"
];

echo "sesion iniciada";