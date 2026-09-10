<?php

$conexion = new mysqli("localhost", "u658525126_villahugoluis", "Packing&&7614", "u658525126_escuela");

$id_personal = $_POST['id_personal'];
$desde = $_POST['fecha_desde'];
$hasta = $_POST['fecha_hasta'];
$motivo = $_POST['motivo'];
$obs = $_POST['observaciones'];

/* Verificar si ya existe una falta cargada en ese período */
$sql_verificar = "
SELECT *
FROM faltas
WHERE id_personal = '$id_personal'
AND fecha_desde <= '$hasta'
AND fecha_hasta >= '$desde'
";

$resultado = $conexion->query($sql_verificar);

if($resultado->num_rows > 0){

    $fila = $resultado->fetch_assoc();

    echo "<h3 style='color:red;'>
            La falta del día " . date('d/m/Y', strtotime($fila['fecha_desde'])) . "
            al " . date('d/m/Y', strtotime($fila['fecha_hasta'])) . "
            ya fue registrada.
          </h3>";

    echo "<a href='https://sistemasvilla.com.ar/ABM_PERSONAL_2026/Form_buscar_psg.php'>Volver</a>";

}else{

    $sql = "INSERT INTO faltas
    (id_personal, fecha_desde, fecha_hasta, articulo, observaciones)
    VALUES
    ('$id_personal','$desde','$hasta','$motivo','$obs')";

    if($conexion->query($sql)){
        echo "<h3 style='color:green;'>Falta registrada correctamente.</h3>";
        echo "<a href='https://sistemasvilla.com.ar/ABM_PERSONAL_2026/Form_buscar_psg.php'>Volver</a>";
    }else{
        echo "Error: " . $conexion->error;
    }
}

?>

