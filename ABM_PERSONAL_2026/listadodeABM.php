<?php
include("conexion2.php");

$sql = "SELECT * FROM personal_2026 ORDER BY AYN";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Personal 2026</title>
</head>
<body>

<h2>Personal 2026</h2>

<a href="https://sistemasvilla.com.ar/ABM_PERSONAL_2026/ALTA_PERSONAL.php">Nuevo Personal</a>

<br><br>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Apellido y Nombre</th>
    <th>Cargo</th>
    <th>CUIL</th>
    <th>Turno</th>
    <th>Acciones</th>
</tr>

<?php while($fila = $resultado->fetch_assoc()) { ?>

<tr>
    <td><?php echo $fila['id']; ?></td>
    <td><?php echo $fila['AYN']; ?></td>
    <td><?php echo $fila['CARGO']; ?></td>
    <td><?php echo $fila['CUIL']; ?></td>
    <td><?php echo $fila['TURNO']; ?></td>

    <td>
        <a href="Modificar_personal.php?id=<?php echo $fila['id']; ?>">
            Editar
        </a>

        |

        <a href="Baja_personal.php?id=<?php echo $fila['id']; ?>"
           onclick="return confirm('¿Eliminar registro?')">
            Eliminar
        </a>
    </td>
</tr>

<?php } ?>

</table>

</body>
</html>