
<?php
$conexion = new mysqli('localhost','u658525126_villahugoluis','Packing&&7614','u658525126_escuela');
//$conexion = new mysqli("localhost", "root", "", "escuela");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Consultar Faltas</title>
</head>
<body>

<h2>Consultar Faltas por Período</h2>

<form method="post">

    Empleado:
    <select name="id_personal">

        <?php

        $sql = "SELECT id, AYN FROM personal_2026 ORDER BY AYN";
        $resultado = $conexion->query($sql);

        while($fila = $resultado->fetch_assoc()){
            echo "<option value='".$fila['id']."'>".$fila['AYN']."</option>";
        }

        ?>

    </select>

    <br><br>

    Desde:
    <input type="date" name="fecha_desde">

    Hasta:
    <input type="date" name="fecha_hasta">

    <br><br>

    <input type="submit" value="Buscar">

</form>

<!-- empieza -->
<?php

if(isset($_POST['id_personal'])){

    $id_personal = $_POST['id_personal'];
    $desde = $_POST['fecha_desde'];
    $hasta = $_POST['fecha_hasta'];

    $sql = "
        		
		SELECT *
        FROM faltas
        WHERE id_personal = $id_personal
        AND fecha_desde <= '$hasta'
        AND fecha_hasta >= '$desde'
		
		
    ";

    $resultado = $conexion->query($sql);

    echo "<h3>Faltas encontradas</h3>";

    if($resultado->num_rows > 0){

        echo "
        <table border='1' cellpadding='5'>
            <tr>
                <th>Desde</th>
                <th>Hasta</th>
                <th>Artículo</th>
                <th>Observaciones</th>
            </tr>
        ";

        while($fila = $resultado->fetch_assoc()){

    echo "
    <tr>
        <td>{$fila['fecha_desde']}</td>
        <td>{$fila['fecha_hasta']}</td>
        <td>{$fila['articulo']}</td>
        <td>{$fila['observaciones']}</td>
        <td>
            <a href='eliminar_falta.php?id_falta={$fila['id_falta']}'
               onclick='return confirm(\"¿Está seguro de eliminar esta falta?\")'>
               Eliminar
            </a>
        </td>
    </tr>
    ";
}

        echo "</table>";

    }else{

        echo "No se encontraron faltas en ese período.";

    }
}
 echo "<br>";
 echo "<a href='https://sistemasvilla.com.ar/'>Volver Menu Principal</a>";
?>

</body>
</html>
<!-- Fin -->

<hr>