<?php 
  
    $cod_alu = $_POST['codigo']; // DNI que viene de name="codigo" del programa Form_modif.php


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
    	$ape = $row[0]; // Agrega APELLIDO Y NOMBRE  le pongo 0 por que tiene un solo dato, si le pongo otro número sale mal....
        
    }
        ///////////////// VAMOS POR EL GRADO
        $val = mysqli_query($datos_bd,"SELECT Grado FROM alumnos_2026 WHERE DNI = $cod_alu");
      while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$grad= $row[0]; // Grado
         }
        ///////////////////// VAMOS POR sexo
         $val = mysqli_query($datos_bd,"SELECT sexo FROM alumnos_2026 WHERE DNI = $cod_alu");
            while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$sex= $row[0]; // sexo
         }
         ///////////////////// VAMOS POR LA EDAD
         $val = mysqli_query($datos_bd,"SELECT Edad FROM alumnos_2026 WHERE DNI = $cod_alu");
            while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$edad= $row[0]; 
		   }
        ///////////////////// VAMOS POR LA Fecha Nacimiento
         $val = mysqli_query($datos_bd,"SELECT Fech_Nac FROM alumnos_2026 WHERE DNI = $cod_alu");
            while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$fechanac= $row[0]; 
         }	
        ///////////////////// VAMOS POR Nac. alumno
         $val = mysqli_query($datos_bd,"SELECT Nac FROM alumnos_2026 WHERE DNI = $cod_alu");
            while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$nacio= $row[0]; 
		}
		///////////////////// VAMOS POR LA Fecha Inscrip
         $val = mysqli_query($datos_bd,"SELECT Fech_Ins FROM alumnos_2026 WHERE DNI = $cod_alu");
            while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$fechinsc= $row[0]; 
		}
		///////////////////// VAMOS POR DNI
         $val = mysqli_query($datos_bd,"SELECT DNI FROM alumnos_2026 WHERE DNI = $cod_alu");
            while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$dni= $row[0]; 
         }
		 ///////////////////// VAMOS POR DOMICILIO
         $val = mysqli_query($datos_bd,"SELECT Domicilio FROM alumnos_2026 WHERE DNI = $cod_alu");
            while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$domicil= $row[0]; 
		}
		///////////////////// VAMOS POR TUTOR
         $val = mysqli_query($datos_bd,"SELECT Tutor FROM alumnos_2026 WHERE DNI = $cod_alu");
            while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$Tuto= $row[0]; 
         }
		 ///////////////////// VAMOS POR Nac Tutor
         $val = mysqli_query($datos_bd,"SELECT Nac_Tutor FROM alumnos_2026 WHERE DNI = $cod_alu");
            while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$nactuto= $row[0]; 
         }
		 ///////////////////// VAMOS POR PROFESIÒN
         $val = mysqli_query($datos_bd,"SELECT Profesion FROM alumnos_2026 WHERE DNI = $cod_alu");
            while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$profesion= $row[0]; 
         }
		 ///////////////////// VAMOS POR lugar de nacimiento
         $val = mysqli_query($datos_bd,"SELECT Lugar_Nac FROM alumnos_2026 WHERE DNI = $cod_alu");
            while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$lugnac= $row[0]; 
         }
		 ///////////////////// VAMOS POR TELEFONO 1
         $val = mysqli_query($datos_bd,"SELECT telefono1 FROM alumnos_2026 WHERE DNI = $cod_alu");
            while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$tele1= $row[0]; 
         }
		 ///////////////////// VAMOS POR TELEFONO 2
         $val = mysqli_query($datos_bd,"SELECT telefono2 FROM alumnos_2026 WHERE DNI = $cod_alu");
            while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$tele2= $row[0]; 
         }
		 ///////////////////// VAMOS POR TELEFONO 3
         $val = mysqli_query($datos_bd,"SELECT telefono3 FROM alumnos_2026 WHERE DNI = $cod_alu");
            while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$tele3= $row[0]; 
         }
		 ///////////////////// VAMOS POR docente
         $val = mysqli_query($datos_bd,"SELECT docente FROM alumnos_2026 WHERE DNI = $cod_alu");
            while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$docente= $row[0]; 
         }
		 ///////////////////// VAMOS POR el ID
         $val = mysqli_query($datos_bd,"SELECT ID FROM alumnos_2026 WHERE DNI = $cod_alu");
            while ($row = mysqli_fetch_array($val)) {  //TRANSFORMA EN UNA MATRIZ...
    	$ID= $row[0]; 
         }
		 
		 
         
         
         		 

         
 header("Location: Form_modif2.php? mensaje=$ape & mensaje2=$grad & mensaje3=$sex & mensaje4=$cod_alu & Edad=$edad & Fech_Nac=$fechanac & Nac=$nacio & Fech_Ins=$fechinsc & Domicilio=$domicil & Tutor=$Tuto & Nac_Tutor=$nactuto & Profesion=$profesion & Lugar_Nac=$lugnac & telefono1=$tele1 & telefono2=$tele2 & telefono3=$tele3 & docente=$docente & var_ID=$ID"); 
 //Abro el archivo form_modif2.php y de paso llevo unas variables... 
         
         

     	

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