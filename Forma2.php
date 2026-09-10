<html>
      <head>
           <title>FORMA 2</title>
           <link rel="stylesheet" href="css_form/estiloform2.css">
           <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!--Para que funcione en los celulares-->
      </head>
	
    <body>
    	 <script type="text/javascript" src="js/interactuar.js">
            </script>
        
	  <!-- <script type="text/javascript" src="js/interactuar.js">
      </script>  -->
      <p class="forma">Forma 2</p> <p class="tipo">(Por Particulares)</p>

      <form class="contacto" method="POST" action="Forma_2_PDF.php"> 							      	
      
	               <h1>INGRESO DE DATOS PERSONALES</h1>
			   
		   	 <div><label >Apellido:</label> 
	           <input id="apellido" type="text" name="apellido" size="30" style="text-transform:uppercase;" required>   <!-- Recibe solo mayùsculas -->
	           <p class="ocultar"></p>
	   	      <label >Nombres:</label> <!-- al darle clic sobre el nombre el puntero se posiciona en get-->

	           <input id="nombres" type="text" name="nombre" size="35" style="text-transform:uppercase;">   <!-- Recibe solo mayùsculas -->
	          </div>
			       <hr size="2px" color="black" style="width:75%;"> <!-- hace una línea -->
			  <div>
			  </div>     
		      

			    
		      <div><label >Cargo que desempeña:</label> <!-- al darle clic sobre el nombre el puntero se posiciona en get-->
	           <input id="cargo"  type="text" name="cargo">	      
			   <p class="ocultar"></p>
		      <label >CUIL/DNI:</label> <!-- al darle clic sobre el nombre el puntero se posiciona en get-->
	           <input id="cuil" type="number" name="cuil">
			 
			  
                <label >de la<p class="ocultar"></p> Escuela Nº:</label> <!-- al darle clic sobre el nombre el puntero se posiciona en get-->
	           <input id="escuela" size="10" type="number" name="numesc" ></div>	
			  
                <label >con :</label> <!-- al darle clic sobre el nombre el puntero se posiciona en get-->
	           <input id="antiguedad" type="number" name="antig" min="1" max="70" required>	
		 
		  
	  <input type="radio" name="transporte" id="anos" value="años" required>Años  
         
       <input type="radio" name="transporte" id="meses" value="meses" required>Meses
		    
		
		  
		     <label>&nbsp &nbsp &nbsp &nbsp</label>  <!-- &nbsp: deja un espacio en blanco -->
		     <p class="ocultar"></p>
		     <label>Solicita se le :</label> <!-- al darle clic sobre el nombre el puntero se posiciona en get-->
	          <input id="eleccion" type="text" name="licoinasist" readonly placeholder="Seleccione una opción abajo">	
	          <select id="justificar"  onchange="licenojust();"> <!-- va a la función licenjust dentro de interactuar.js-->
                       <option value="11" selected="true" disabled="disabled" >Seleccione una opción</option>
                       <option value="12" >Conceda Licencia</option>  
                       <option value="13">Justifique Inasistencia</option>
				   <option value="14">Otra</option>
                      
           </select>
			  <br>
			  <br>
                <hr size="2px" color="black" style="width:75%;">

			   <label>Desde el :</label> <!-- al darle clic sobre el nombre el puntero se posiciona en get-->
	             <input id="desdes" type="date" name="desde" >	
			   <label>hasta el :</label> <!-- al darle clic sobre el nombre el puntero se posiciona en get-->
	             <input id="hastas" type="date" name="hasta" >	
	             <p class="ocultar"></p>
		        <label>&nbsp &nbsp &nbsp &nbsp &nbsp Situación Actual: </label>
		        <p class="ocultar"></p>
       		  <input type="radio" name="opc2" id="Titular" value="tit" required>Titular  
                <input type="radio" name="opc2" id="Provisional" value="prov" required>Provisional
		      <input type="radio" name="opc2" id="Reemplazante" value="reemp" required>Reemplazante

			  
			  <br>
			  <br>
			  <label id="miLabel">Por art :</label> <!-- al darle clic sobre el nombre el puntero se posiciona en get-->
	          <input id="artfalta" size="5" type="text" name="articausa" readonly placeholder="CLic abajo">
	     <select id="causa"  onchange="causafalta();">  <!-- va a la función causafalta dentro de interactuar.js-->
	     	           <option value="1" selected="true" disabled="disabled" >Seleccione una opción</option>
                       <option value="2">ART. 5°- ENFERMEDAD O LESION COMÚN</option>
                       <option value="3">ART. 6°- ENFERMEDAD DE LARGO TRATAMIENTO O LESION GRAVE</option>
					   <option value="4">ART. 8°- ENFERMEDAD OCUPACIONAL O ACCIDENTE DE TRABAJO</option>
					   <option value="5">ART. 9°- ENFERMEDAD PROFESIONAL</option>
					   <option value="6">ART. 10°- PROFILAXIS Y SEGURIDAD</option>
					   <option value="7">ART. 12°- GRAVIDEZ Y MATERNIDAD</option>
					   <option value="8">ART. 14°- ADOPCION</option>
					   <option value="9">ART. 15°- ASUNTOS PARTICULARES</option>
					   <option value="10">ART. 17°- ASUNTOS PARTICULARES. NO REMUNERADA</option>
					   <option value="11">ART. 19°- ESTUDIO Y PERFECCIONAMIENTO DOCENTE</option>
  					   <option value="12">ART. 21°- REPRESENTACIÓN CULTURAL Y DEPORTIVA</option>
					   <option value="13">ART. 22°- REPRESENTACIÓN GREMIAL O DOCENTE</option>
					   <option value="14">ART. 23°- DESEMPEÑO DE CARGO ELECTIVO O REPRESENTACIÓN POLÍTICA</option>
					   <option value="15">ART. 24°- MATRIMONIO</option>
					   <option value="16">ART. 27°- EXAMENES</option>
					   <option value="17">ART. 28°- PARTICIPACIÓN EN CONCURSO DE OPOSICIÓN</option>
					   <option value="18">ART. 29°- ENFERMEDAD DE UN MIEMBRO DEL GRUPO FAMILIAR       </option>
					   <option value="19">ART. 30°- COMISION DE SERVICIOS</option>
					   <option value="20">ART. 32°- DESEMPEÑO EN CARGOS EN NIVEL MEDIO O TERCIARIO</option>
					   <option value="21">ART. 33°- CITACIÓN JUDICIAL O POLICIAL</option>
					   <option value="22">ART. 34°- INTRANSITIBILIDAD</option>
					   <option value="23">ART. 36°- NACIMIENTO DE HIJOS</option>
					   <option value="24">ART. 37°- DUELO </option>
					   <option value="25">ART. 38°- DONACIÓN DE SANGRE</option>
					   <option value="26">ART. 39°- LACTANCIA</option>
					   <option value="27">ART. 40°- MATRIMONIO DE HIJOS Y HERMANOS</option>
					   <option value="28">ART. 41°- ACOMPAÑAMIENTO DE ALUMNOS A EXCURSIONES Y VIAJES</option>
					   <option value="29">PARO DE TRANSPORTE PÚBLICO </option>
					   <option value="30">LICENCIA POR ESTUDIOS GINECOLOGICOS - Decreto 1082/24 </option>
					   <option value="31">LICENCIA POR VIOLENCIA DE GÉNERO - Resol.2255/22 </option>
					   <option value="32">OTRA </option>
                      
          </select>		  
			  <br>
			  <br>
		<div>  
			    <hr size="2px" color="black" style="width:75%;">
		 	  
		 	  <label>Lugar :</label> <!-- al darle clic sobre el nombre el puntero se posiciona en get-->
	           <input id="lugar" type="text" name="lugarpresent" >
	           <p class="ocultar"></p>
			   <label>Fecha :</label> <!-- al darle clic sobre el nombre el puntero se posiciona en get-->
	           <input id="fechapresen" type="date" name="fechapresent">
		     </div>
		     <p class="ocultar"></p>
	         <input type="submit" class="boton_envio">   <!--boton de envio--> 	
	         <input type="submit" value="Cancelar" name="add">  <!--boton de cancelar-->

 
</form>               
	  
	  <p class="autor"> © 2022 - Aplicaciónes - info@sistemasvilla.com-</p>
	     
    </body>
	  
      
    
</html>		 