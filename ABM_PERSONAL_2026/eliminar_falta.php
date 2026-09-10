<?php

$conexion = new mysqli('localhost','u658525126_villahugoluis','Packing&&7614','u658525126_escuela');

$id_falta = $_GET['id_falta'];

$sql = "DELETE FROM faltas WHERE id_falta = $id_falta";

if($conexion->query($sql)){
    echo "Falta eliminada correctamente.<br><br>";
    echo "<a href='Formulario_borrar_faltas.php'>Volver</a>";
}else{
    echo "Error: " . $conexion->error;
}

?>