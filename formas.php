<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!--Para que funcione en los celulares-->
	<link rel="stylesheet" type="text/css" href="css/posiciones.css">
	<title></title>
</head>
<body>
       <div class="movtitulo">
	  <h2>Imprimir formularios en BLANCO...</h2>
       </div>
	         <img class="imagen_forma" src="imagenes/forma1.jpg" alt="Imagen no disponible">
                         
              <form method="POST" action="leerpdf.php"> <!-- Lee forma 1 de Salud -->
              <label >Imprimir forma 1 (Salud)<br></label>
              <label><br></label>
              <input class="impresora" title="boton enviar" alt="boton inviar" src="imagenes/Printer.png" type="image" /> <!-- muestra la impresora en lugar el botón-->
              </form>

           
             <img class="imagen_forma2" src="imagenes/forma2.jpg" alt="Imagen no disponible">
             <form method="POST" action="leerforma2.php">
             <div class="impresora2">     
               <label class="titulo2">Imprimir forma 2 (Particulares)</label>
               
               <input  title="boton enviar" alt="boton inviar" src="imagenes/Printer.png" type="image" />
             </div>
               
             </form>
          
              
        

 </body>
</html>