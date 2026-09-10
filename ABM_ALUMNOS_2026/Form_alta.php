<html>
      <head>
           <title>FORMA 1</title>
          <!-- <link rel="stylesheet" href="css_form/estiloform2.css">
           <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!--Para que funcione en los celulares-->
          		   
      </head>
	
    <body>
    	 <script type="text/javascript" src="js/interactuar.js">
            </script>

<form action="alta_bd.php" method="post">
<p>
<label id="miLabel">Grado :</label>
<input id="artfalta" size="5" type="text" name="articausa" readonly> 
<select name="pruebanombre" id="causa" onchange="causafalta();"> <!-- va a la funcion causafalta dentro interactuar.js-->
	     	        <option  value="1" selected="true" disabled="disabled" >Seleccione una opcion</option>
                       <option value="2">1A</option>
                       <option value="3">1B</option>
					   <option value="4">2A</option>
					   <option value="5">2B</option>
					   <option value="6">3A</option>
					   <option value="7">3B</option>
					   <option value="8">4A</option>
					   <option value="9">4B</option>
					   <option value="10">5A</option>
					   <option value="11">5B</option>
  					   <option value="12">6A</option>
					   <option value="13">6B</option>
					   <option value="14">7A</option>
					   <option value="15">7B</option>
         </select>
</p>
<p>
Su APELLIDO y NOMBRE: <input type="text" name ="APEyNOM"/>
</p>
<p>
Sexo: <input type="text" maxlength="1" name ="sex"/>
</p>
<p>
Su edad: <input type="number" date name ="edad"/>
</p>
<p>
Fecha de Nacimiento: <input type="date" name ="fechnac"/>
</p>
<p>
Nacionalidad: <input type="text" name ="nac_alu" value="Argentina"/>
</p>
<p>
Fecha de Inscripcion: <input type="date" name ="fech_insc"/>
</p>
<p>
DNI (Alumno): <input type="number" name ="dni"/>
</p>
<p>
Domicilio Actual: <input type="text" style="width: 400px; padding: 10px"; name ="domicil"/>
</p>
<p>
Tutor: <input type="text" name ="tuto"/>
</p>
<p>
Nac. Tutor: <input type="text" name ="nac_tut" value="Argentina" />
</p>
<p>
Profesion Tutor: <input type="text" name ="prof_tut"/>
</p>
<p>
Lugar de Nacimiento del alumno/a: <input type="text" name ="lugnac" value="San Salvador de Jujuy" />
</p>
<p>
Telefono 1: <input type="number" name ="tele1"/>
</p>
<p>
Telefono 2: <input type="number" name ="tele2"/>
</p>
<p>
Telefono 3: <input type="number" name ="tele3"/>
</p>
<p>
Docente del alumno: <input type="text" name ="docent"/>
</p>
<p>
<input name="enviar" value="Enviar Datos" type="submit" />  
</p>


</form>
<p class="autor"> © 2022 - Aplicaciónes - info@sistemasvilla.com-</p>
	  
      
    </body>
</html>		 
<?php
    // El usuario rellena este formulario y oprime el botón de invío, se llama a la página basedatosalum2.php // este php que esta en verde no es necesario escribir...
?>