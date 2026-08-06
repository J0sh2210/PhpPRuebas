<?php

session_start();

if (!isset($_SESSION["usuario"])){
    echo "no autorizado";
    exit;
}

echo "bienvenido ... <br>";
echo $_SESSION["usuario"]["nombre"];