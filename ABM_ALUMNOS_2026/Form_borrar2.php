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

       $mensaje=$_GET["mensaje"]; //apellido Y nombre
        $mensaje2=$_GET["mensaje2"];  //GRADO
          $mensaje3=$_GET["mensaje3"]; // DOCENTE
            $mensaje4=$_GET["mensaje4"]; //DNI
            echo $mensaje;
          echo $mensaje2;
        echo $mensaje3;
   ////////separador de palabras/////////////
    }  
?>   

  <h2>SE ELEMINARA DEFINITIVAMENTE... ESTA SEGURO??????? </h2> 

<form action="cod_borrar.php" method="post">
    <label>Código: </label>
    <input type="text" readonly name="form_codigo"  value= <?php echo $mensaje4; ?> />
    <br/>
    <br/>
    <label>Apellido: </label>
    <input type="text" readonly name="form_apell" id="apell"/>
    <br/>
    <br/>
    <label>Nombre</label>
    <input type="text" readonly name="nom" id="nomb"/>
    <br/>
    <br/>
    <label>Docente</label>
    <input type="text" readonly name="form_edad" id="iddocente"/> <!--el echo solo toma el primer valor de dos palabras -->
    <br/>
    <br/>
    <input type="submit" value="Eliminar" />
</form>

     <script>
          var var_apell = '<?php echo $mensaje;  ?>'; //aqui el echo toma todos los valores de la cadena
          var var_nomb = '<?php echo $mensaje2;  ?>';
		  var var_docente = '<?php echo $mensaje3;  ?>'; //DOCENTE
         document.getElementById('apell').value = var_apell ;// Le lleva el valor del APELLIDO y NOMBRE
         document.getElementById('nomb').value = var_nomb ; // Lleva el valor del nombre al ID nomb
		 document.getElementById('iddocente').value = var_docente ;
      </script> 

</body>
</html>