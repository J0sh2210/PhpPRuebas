<?php


if(isset($_POST["nombre"], $_POST["correo"],  $_POST["edad"])){
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $edad = $_POST["edad"];

    if(empty($_POST["nombre"])){
    echo "El nombre es obligatorio";
} else if (empty( $_POST["correo"])){
    echo "El correo es obligatorio";
} else if ($_POST["edad"] < 18){
    echo "eres menor de edad";
} else {

    echo "nombre ". $nombre . "<br>";
    echo "correo ". $correo . "<br>";
    echo "edad ". $edad . "<br>";
}
} else {
    echo "acceso no permitido";
}

