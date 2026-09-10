<?php
include("conexion2.php");

$id = $_GET['id'];

$sql = "DELETE FROM personal_2026 WHERE id=$id";

/* $conn->query($sql); */
if($conn->query($sql)){
    echo "Registro Eliminado correctamente.<br>";
    echo "<a href='https://sistemasvilla.com.ar/'>Volver Menu Principal</a>";
	echo "<br>";
	echo "<a href='form_buscar.php'>Buscar un Personal</a>";
}else{
    echo "Error: " . $conexion->error;
}
/* header("Location:index.php");  */
?>