<?php  
    
    $cod_cod = $_POST["form_codigo"];
    $cod_ape = $_POST["form_apell"];
    $cod_nom = $_POST["nom"];
    $cod_edad = $_POST['form_edad'];

  echo "$cod_cod";
  echo "<br>";
  echo "$cod_nom";
  echo "<br>";
  echo "$cod_ape";  
  echo "<br>";
  echo "$cod_edad";
// 1er. paso... conexión a la base de datos...
   //include('conexion.php');
   include('conexion.php');
      
    mysqli_query($datos_bd,"delete from alumnos_2026 WHERE DNI='$cod_cod' ");

   echo "Datos ELIMINADOS CORRECTAMENTE!!!!!!!!!!!!!!"; 
   header("Location: http://localhost/ABM_ALUMNOS_2026/menuprin.php?mensaje='okborrado'"); 
//labuena
   //$result = mysqli_query($datos_bd,"SELECT Id,nombre,apellido,edad FROM alumnos");

?>