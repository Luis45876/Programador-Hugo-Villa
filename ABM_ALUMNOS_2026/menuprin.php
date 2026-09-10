<!doctype html>
<html>
     <head>
           <meta charset="utf-8"/>  <!-- Para codificación de caracteres latinos-->
	       <title>creativo 2.0</title>
           <link rel="stylesheet" href="css/estilos.css">
     </head>
  <body>
  <section id="contenedor"> <!--para centrar las tres cajas (header, section y footer)-->
     <header>
	 <!--<h1>hola</h1>-->
	 <div>
	   <img src="imagenes/encabezado.jpg" width="100%" alt="Logotipo">
	 </div>	  
	            <nav id="botonera">        <!-- Son etiquetas de navegación -->    
					 <ul>  <!-- para agregar listas -->
						  <li><a href="menuprin.php?tipo=Cargar_Producto">Cargar Alumnos</a></li>  <!-- Selecciona la misma página-->
						  <li><a href="menuprin.php?tipo=Ver_Producto">Ver Alumnos</a></li>  <!-- Selecciona la misma página -->
						  <li><a href="menuprin.php?tipo=Modificar_Producto">Modificar Alumnos</a></li>
						  <li><a href="menuprin.php?tipo=Baja_Producto">Baja de Alumnos</a></li>
						  <li><a href="menuprin.php?tipo=Buscar_Producto">Buscar Inf Alum</a></li>
			    	 </ul>	  
			 </nav>	 
<!--empieza-->
                  <!--se armar un cuadro para mostrar resultados-->
<div id="mostrar_cuadros">
					   <?php
					   /*Para evitar el error al hacer clik en inicio no encuentra la variable tipo ni diseño web, etc*/
					   if(isset($_GET['tipo'])) {  /*isset valida que una variable exista*/
					   
					   
					        switch ($_GET['tipo']){
					        	                              
							  case 'Cargar_Producto':
							$título='CARGAR PRODUCTO';
                            $descripción='Cargar los datos de una persona ingresante si es un centro educativo o un producto en caso de comercio.';	
                            /* echo $título;  */
                            echo $descripción;
                                include 'Form_alta.php'; /* carga una pagina dentro de otra */
                        break;
							  case 'Ver_Producto':
							$título='VER PRODUCTO';
                            $descripción='Listado de la Base de Datos';
                            echo $descripción;
                                include 'consultar_alumnos2.php';
                        break;   
                              case 'Modificar_Producto':
							$título='MODIFICAR PRODUCTO';
                            $descripción='Módifica datos de un producto cargado';
                            echo $descripción;
                                include 'Form_modif.php';
                        break;        	
                              case 'Baja_Producto':
							$título='BAJA DEL PRODUCTO';
                            $descripción='Elimina el producto de la Base de Datos';
                            echo $descripción;
                               include 'Form_eliminar.php'; 
					   break; 
                              case 'Buscar_Producto':
							$título='BUSCA PRODUCTO';
                            $descripción='Busca alumnos en la Base de Datos';
                            echo $descripción;
                               include 'Form_buscar.php';
                           	}						
					   ?>
                          						   
			  <?php } else{ 
			  	////////////////////////////////////////////////////////////////
			  	       if (isset($_GET["mensaje"])) // Pregunta si esta definida esa variable...
							{
    						    //echo "Variables definidas!!!";
    						  $valget = $_GET["mensaje"];
    						    //echo "Valor de Get: ".$valget;
    						    switch ($valget):
    					            		case "'ok'":
        						            echo "CARGADO CON ÉXITO!!!!!!";
        					           break;  // es como el exit de fox...
    							            case "'okmodif'":
        						            echo "MODIFICADO CON ÉXITO!!!!!!";      
        					           break;  // es como el exit while de fox...
        					                case "'okborrado'":
        						            echo "Datos ELIMINADOS CORRECTAMENTE!!!!!!!!!!!!!!";
        						       break;  // es como el exit while de fox...    
    							            default:
        						            echo 'Nada --> Nada...';
							           endswitch;
    						    //
							}else{
								echo "Seleccione un servicio para ver sus características"; //Variables NO definidas!!!
		                    }
			  	////////////////////////////////////////////////////////////////

		        	  	   
			  	////////////////////////////////////////////////////////////////
           }?>	 <!-- Marca que la llave pertenece a PHP-->   
			       <!--  Fin Evitar un error -->
                    </div>
<!--termina-->


	 </header>
	 <section id="contenido">
	 <!-- <h1>HOLA</h1> -->
	 
	 </section>

	 <footer>
	 </footer>
  </section>
  </body>  

</html>