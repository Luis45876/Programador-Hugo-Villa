<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>



<?php 
     if(isset($_GET['mensaje'])) {   /*el ok lo trae desde cargar_empleados (despues de cargar)*/

       $mensaje=$_GET["mensaje"]; //apellido
        $mensaje2=$_GET["mensaje2"];  //grad
          $mensaje3=$_GET["mensaje3"]; // sex
            $mensaje4=$_GET["mensaje4"]; //dni
            echo $mensaje;
          echo $mensaje2;
        echo $mensaje3;
		$Edad=$_GET["Edad"]; //
		 $Fech_Nac=$_GET["Fech_Nac"];
		  $Nac=$_GET["Nac"];
		    $Fech_Ins=$_GET["Fech_Ins"];
			      $Domicilio=$_GET["Domicilio"];
	 echo $Domicilio;			  
	 			   $Tutor=$_GET["Tutor"];
    echo $Tutor;				   
				     $Nac_Tutor=$_GET["Nac_Tutor"];
	echo $Nac_Tutor;				 
					   $Profesion=$_GET["Profesion"];
					     $Lugar_Nac=$_GET["Lugar_Nac"];
						   $telefono1=$_GET["telefono1"];
						     $telefono2=$_GET["telefono2"];
							  $telefono3=$_GET["telefono3"];
							    $docente=$_GET["docente"];
								 $var_id=$_GET["var_ID"];
   echo $docente;
   ////////separador de palabras/////////////
    }  
?>   

   

<form action="cod_modificar.php" method="post">
    <label>D.N.I.: </label>
    <input type="number"  name="form_codigo"  value= <?php echo $mensaje4; ?> /> <!-- DNI readonly-->
    <br/>
    <br/>
    <label>Apellido y Nombre: </label>
	<input type="text" name="form_apell"  id="apell"/> <!--en el id esta el secreto para que muestre toda la cadena -->
    <br/>
    <br/>
    <label>Grado</label>
    <input type="text" name="nom" id="id_grado"/>  
    <br/>
    <br/>
    <label>Sexo</label>
    <input type="text" name="form_sexo" value= <?php echo $mensaje3; ?>> <!--el echo solo toma el primer valor de dos palabras -->
    <br/>
    <br/>
	 <label>Edad</label>
    <input type="number" name="form_edad" value= <?php echo $Edad; ?>> <!--el echo solo toma el primer valor de dos palabras -->
    <br/>
    <br/>
	 <label>Fecha Nacim: </label>
    <input type="date" name="form_fechnaci" value= <?php echo $Fech_Nac; ?>> <!--el echo solo toma el primer valor de dos palabras -->
    <br/>
    <br/>
	 <label>Nacionalidad Alu:</label>
    <input type="text" name="form_naci" value= <?php echo $Nac; ?>> <!--el echo solo toma el primer valor de dos palabras -->
    <br/>
    <br/>
	 <label>Fecha Insc.</label>
    <input type="date" name="form_fechinsc" value= <?php echo $Fech_Ins; ?>> <!--el echo solo toma el primer valor de dos palabras -->
    <br/>
    <br/>
	 <label>Domicilio: </label>
	<input type="text" name="form_domicilio" id="id_domic"/> <!--en el id esta el secreto para que muestre toda la cadena -->
    <br/>
    <br/>
	<label>Tutor</label>
    <input type="text" name="form_Tutor"  id="id_tuto"/> <!--el echo solo toma el primer valor de dos palabras -->
    <br/>
    <br/>
	 <label>Nac. Tutor:</label>
    <input type="text" name="form_nactut" value= <?php echo $Nac_Tutor; ?>> <!--el echo solo toma el primer valor de dos palabras -->
    <br/>
    <br/>
	 <label>Prof. Tutor</label>
    <input type="text" name="form_Profesion" id="id_Profe_tuto"/> <!--el echo solo toma el primer valor de dos palabras -->
    <br/>
    <br/>
	 <label>Lug. Nacimiento</label>
    <input type="text" name="form_Lugnac" id="id_LugNac"/> <!--el echo solo toma el primer valor de dos palabras -->
    <br/>
    <br/>
	 <label>Telefono 1:</label>
    <input type="number" name="form_telefono1" value= <?php echo $telefono1; ?>> <!--el echo solo toma el primer valor de dos palabras -->
    <br/>
    <br/>
	<label>Telefono 2:</label>
    <input type="number" name="form_telefono2" value= <?php echo $telefono2; ?>> <!--el echo solo toma el primer valor de dos palabras -->
    <br/>
    <br/>
	<label>Telefono 3:</label>
    <input type="number" name="telefono3" value= <?php echo $telefono3; ?>> <!--el echo solo toma el primer valor de dos palabras -->
    <br/>
    <br/>
	<label>Docente:</label>
    <input type="text" name="form_docente" id="id_Docente"/> <!--el echo solo toma el primer valor de dos palabras -->
    <br/>
	<br/>
	<label>ID (No se puede modificar):</label>
    <input type="number" name="form_ID" value= <?php echo $var_id; ?> readonly > <!--el echo solo toma el primer valor de dos palabras -->
    <br/>
    <br/>
	<input type="submit" value="Modificar" />
</form>

     <script>
          var var_apell = '<?php echo $mensaje;  ?>'; //aqui el echo toma todos los valores de la cadena (apellido y nombre)
          var var_nomb = '<?php echo $mensaje2;  ?>'; // Toma mensaje2 que tiene grado
		  var var_domicilio = '<?php echo $Domicilio;  ?>'; // Domicilio COMPLETO
		  var var_tutor = '<?php echo $Tutor;  ?>'; // TUTOR aqui el echo toma todos los valores de la cadena
		  var var_Profesion = '<?php echo $Profesion;  ?>'; // $Profesion
		  var var_lugnac = '<?php echo $Lugar_Nac;  ?>'; // $LUGAR de NACIMIENTO
		  var var_docente = '<?php echo $docente;  ?>'; // $DOCENTE
         document.getElementById('apell').value = var_apell ; // NOMBRE Y APELLIDO
         document.getElementById('id_grado').value = var_nomb ; //GRADO
		 document.getElementById('id_domic').value = var_domicilio ; //DOMICILIO
		 document.getElementById('id_tuto').value = var_tutor ; //TUTOR
		 document.getElementById('id_Profe_tuto').value = var_Profesion ; //PROFESION
		 document.getElementById('id_LugNac').value = var_lugnac ; //LUGAR DE NACIMIENTO
		 document.getElementById('id_Docente').value = var_docente ; //DOCENTE
		 
      </script> 

</body>
</html>