<?php
include("conexion2.php");
 
if(isset($_POST['guardar'])){

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

    $sql = "INSERT INTO personal_2026
    (CARGO,CUPOF,TURNO,AYN,CUIL,REVISTA,CELU,GYD,DOMICILIO,ATENALU)

    VALUES

    ('$cargo','$cupof','$turno','$ayn','$cuil',
    '$revista','$celu','$gyd','$domicilio','$atenalu')";

    /*$conn->query($sql);*/
    
	if($conn->query($sql)){
    echo "Alta registrada correctamente.<br>";
    echo "<a href='https://sistemasvilla.com.ar/'>Volver Menu Principal</a>";
	echo "<br>";
	echo "<a href='form_buscar.php'>Buscar un Personal</a>";
}else{
    echo "Error: " . $conexion->error;
}
////////////////////	
     
    /*header("Location:sistemasvilla.php");  */
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Alta Personal</title>
</head>
<body>

<h2>Alta Personal</h2>

<form method="post">

Cargo:
<input type="text" name="CARGO"><br><br>

Cupof:
<input type="number" name="CUPOF"><br><br>

Turno:
<input type="text" name="TURNO"><br><br>

Apellido y Nombre:
<input type="text" name="AYN"><br><br>

CUIL:
<input type="text" name="CUIL"><br><br>

Revista:
<input type="text" name="REVISTA"><br><br>

Celular:
<input type="text" name="CELU"><br><br>

GYD:
<input type="text" name="GYD"><br><br>

Domicilio:
<input type="text" name="DOMICILIO"><br><br>

Atención Alumno:
<input type="text" name="ATENALU"><br><br>

<input type="submit" name="guardar" value="Guardar">

</form>

</body>
</html>