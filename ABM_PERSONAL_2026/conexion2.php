<?php
$host = "localhost";
$usuario = "u658525126_villahugoluis";
$password = "Packing&&7614";
$bd = "u658525126_escuela";

$conn = new mysqli($host, $usuario, $password, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>