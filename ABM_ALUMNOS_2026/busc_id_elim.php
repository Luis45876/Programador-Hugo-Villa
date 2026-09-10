<?php 
  //SELECT apellido FROM alumnos WHERE Id = 3;
    $cod_alu = $_POST['codigo'];  // traigo el DNI  del alumno a eliminar


    include('conexion.php');
    $val = mysqli_query($datos_bd,"SELECT AyN FROM alumnos_2026 WHERE DNI = $cod_alu");
    
    $num_rows = mysqli_num_rows($val); //devuelve el número de filas que encontró SELECT
    echo "$num_rows\n";

    if ($num_rows <= 0) {
         
         echo "NO EXISTE EL CÓDIGO INGRESADO!!!!!!!!!";
            // code...
    } else {
        // code...
        
    while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$ape = $row[0]; // Agrega el apellido   le pongo 0 por que tiene un solo dato, si le pongo otro número sale mal....
        
    }
        ///////////////// VAMOS POR EL GRADO
        $val = mysqli_query($datos_bd,"SELECT Grado FROM alumnos_2026 WHERE DNI = $cod_alu");
      while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$nom= $row[0]; // Agrega el Grado
         }
        ///////////////////// VAMOS POR DOCENTE
         $val = mysqli_query($datos_bd,"SELECT docente  FROM alumnos_2026 WHERE DNI = $cod_alu");
            while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$edad= $row[0]; // Agrega DOCENTE
         }
         

         
             header("Location: Form_borrar2.php? mensaje=$ape & mensaje2=$nom & mensaje3=$edad & mensaje4=$cod_alu"); //Abro el archivo form_modif2.php y de paso llevo unas variables...
         
         

     	

        }//else
     
          // EL DE ABAJO FUNCIONA PERFECTO... SOLO QUE MUESTRA TODOS.... LA MATRIZ...
    /*
    $result = mysqli_query($datos_bd,"SELECT Id,nombre,apellido,edad FROM alumnos");
    while ($row = mysqli_fetch_array($result)) {
     	echo $row["Id"];
     	echo $row["nombre"];
     }
     */
     
     
 ?>