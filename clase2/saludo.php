<?php
$nombre = $_POST["nombre"];
$edad = $_POST["edad"];

// echo "hola " . $nombre;
// echo "<br>";
// echo "tienes " .$edad ." de edad";
if(isset($_POST["nombre"])){
    echo $_POST["nombre"];
}else {
    echo "existe un campo vacio";
}

if(isset($_POST["edad"])){
    echo $_POST["edad"];
}
else {
    echo "no existe el campo edad";
}

