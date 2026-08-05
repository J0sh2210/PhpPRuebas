<?php
//prepare precompila la consulta sql para que se pueda ejecutar de manera segura, preveyendo sql injection
require "conexion.php";
$sql = "SELECT * FROM usuarios";
$sqlp = $conexion->prepare($sql);
$sqlp -> execute();
$usuarios = $sqlp ->fetchAll(PDO::FETCH_ASSOC); //funcionaria como un arreglo de la tabla
//fetchall con ese parametro evita que los datos sean duplicados y pide solamente los nombre de las columnas y datos

// echo "<pre>"; //ordena la salida, respetando espacios y saltos de linea.
// print_r($usuarios); //inspecciona los arreglos u objetos
// echo "</pre>";

//mostrar usuarios

// foreach ($usuarios as $usuarios){
//     echo $usuarios["nombre"];
//     echo "<br>";
// }

//o usando json

header("Content-Type: application/json"); //esta linea le dice al cliente que sera json lo trabajado
echo json_encode($usuarios);