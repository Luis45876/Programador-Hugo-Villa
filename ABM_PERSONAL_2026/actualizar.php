<?php

$conexion = new mysqli('localhost','u658525126_villahugoluis','Packing&&7614','u658525126_escuela');

$id = $_POST['id'];
$ayn = $_POST['AYN'];
$cupof = $_POST['CUPOF'];
$cargo = $_POST['CARGO'];
$gyd = $_POST['GYD'];

$sql = "UPDATE personal_2026
        SET
            AYN='$ayn',
            CUPOF='$cupof',
            CARGO='$cargo',
            GYD='$gyd'
        WHERE id=$id";

if($conexion->query($sql)){
	echo "Registro actualizado correctamente!!!!<br>";
    echo "<a href='form_buscar.php'>Volver</a>"; 
    
}else{
    echo "Error: " . $conexion->error;
}
?>