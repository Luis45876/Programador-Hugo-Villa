<html>
<body>

<?php
// 1er. paso... conexión a la base de datos...
   include('conexion.php');
    
//labuena
   $result = mysqli_query($datos_bd,"SELECT ID,Grado,AyN,telefono1,DNI FROM alumnos_2026");
	   
// $result = mysql_query("SELECT nombre,apellido,edad FROM alumnos",$connection);
	   echo "<table border = '1'>\n";
	   echo "<tr><td>Id</td><td>Grado</td><td>Apellido y Nombre</td><td>Telefono</td><td>DNI</td></tr> \n";


 while ($row=mysqli_fetch_row($result)){ //mysqli_fetch_row() devuelve un array de cadenas que se corresponde con la fila obtenida
	       echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>\n"; 
                	   }
	  echo "</table>\n";	  
	   //echo "Registros: ". mysql_num_rows($query);  // muestra cuantos registros tiene la base de datos o encontrados...
  
?>

</body>
</html>