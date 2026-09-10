<?php
include("conexion2.php");

$id = $_GET['id'];

$sql = "SELECT * FROM personal_2026 WHERE id=$id";
$resultado = $conn->query($sql);

$fila = $resultado->fetch_assoc();

if(isset($_POST['actualizar'])){

    $cargo      = $_POST['CARGO'];
    $cupof      = $_POST['CUPOF'];
    $turno      = $_POST['TURNO'];
    $ayn        = $_POST['AYN'];
    $cuil       = $_POST['CUIL'];
    $revista    = $_POST['REVISTA'];
    $celu       = $_POST['CELU'];
    $gyd        = $_POST['GYD'];
    $domicilio  = $_POST['DOMICILIO'];
    $atenalu    = $_POST['ATENALU'];

    $sql = "UPDATE personal_2026 SET
            CARGO='$cargo',
            CUPOF='$cupof',
            TURNO='$turno',
            AYN='$ayn',
            CUIL='$cuil',
            REVISTA='$revista',
            CELU='$celu',
            GYD='$gyd',
            DOMICILIO='$domicilio',
            ATENALU='$atenalu'
            WHERE id=$id";

    /*$conn->query($sql); */
  if($conn->query($sql)){
    echo "MODIFICADO correctamente.<br>";
    echo "<a href='https://sistemasvilla.com.ar/'>Volver Menu Principal</a>";
	echo "<br>";
	echo "<a href='form_buscar.php'>Buscar un Personal</a>";
}else{
    echo "Error: " . $conexion->error;
}
   /* header("Location:index.php");  */
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Personal</title>
</head>
<body>

<h2>Editar Personal</h2>

<form method="post">

Cargo:
<input type="text" name="CARGO"
value="<?php echo $fila['CARGO']; ?>"><br><br>

Cupof:
<input type="number" name="CUPOF"
value="<?php echo $fila['CUPOF']; ?>"><br><br>

Turno:
<input type="text" name="TURNO"
value="<?php echo $fila['TURNO']; ?>"><br><br>

Apellido y Nombre:
<input type="text" name="AYN"
value="<?php echo $fila['AYN']; ?>"><br><br>

CUIL:
<input type="text" name="CUIL"
value="<?php echo $fila['CUIL']; ?>"><br><br>

Revista:
<input type="text" name="REVISTA"
value="<?php echo $fila['REVISTA']; ?>"><br><br>

Celular:
<input type="text" name="CELU"
value="<?php echo $fila['CELU']; ?>"><br><br>

GYD:
<input type="text" name="GYD"
value="<?php echo $fila['GYD']; ?>"><br><br>

Domicilio:
<input type="text" name="DOMICILIO"
value="<?php echo $fila['DOMICILIO']; ?>"><br><br>

Atención Alumno:
<input type="text" name="ATENALU"
value="<?php echo $fila['ATENALU']; ?>"><br><br>

<input type="submit" name="actualizar"
value="Actualizar">

</form>

</body>
</html>