<?php

$conexion = new mysqli("localhost", "u658525126_villahugoluis", "Packing&&7614", "u658525126_escuela");

$id = $_GET['id'];
//echo "Id:$id";  
$sql = "SELECT * FROM personal_2026 WHERE id = $id";
$resultado = $conexion->query($sql);

$fila = $resultado->fetch_assoc();


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!--Para que funcione en los celulares-->
<link rel="stylesheet" href="css/estilos.css">

    <title>Editar Personal</title>
</head>
<body>

<h2>Editar Registro</h2>

<form action="actualizar.php" method="post">
    Id:(Desab editar)
    <input type="number" name="id" value="<?php echo $fila['id']; ?>" readonly><br><br>

    Nombre:
    <input type="text" name="AYN" value="<?php echo $fila['AYN']; ?>"><br><br>

    Cupof:
    <input type="text" name="CUPOF" value="<?php echo $fila['CUPOF']; ?>"><br><br>

    Cargo:
    <input type="text" name="CARGO" value="<?php echo $fila['CARGO']; ?>"><br><br>

    Grado:
    <input type="text" name="GYD" value="<?php echo $fila['GYD']; ?>"><br><br>

    <input type="submit" value="Guardar cambios">
	<br>
	<br>
	<a href="cargar_falta_PSG.php?id=<?php echo $fila['id'];?>&categoria=<?php echo $fila['AYN']; ?>" class="mi-boton">
    Registrar falta_PSG</a>
	<br>
	<br>
</form>



</body>
</html>