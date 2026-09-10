<!doctype html>  
<html>
  <head>
        <meta charset="utf-8"/> 
        <title>Actividad 1 Hugo Villa </title>
		<link rel="stylesheet" href="css_form/estiloform.css">
  </head>

  <body>
     <h1>FORMULARIOS</h1>
     <h3>Podés comunicarte con nosotros</h3>

     <div id="movido" class="rojo">
       <h2>Contacto:</h2>
   <form method="POST" action="enviar_mail.php">                                          <!--NO ES RECOMENDABLE MANDAR POR GET (por que manda todo el link y la información queda registrada en la compu usar POST-->
       <input type="text" name="nombre" placeholder="Ingrese Nombre"  required> <!-- required = se usa para validar-->
	   <input type="text" name="apellido" placeholder="Ingrese Apellido" required>
	   <input type="email" name="correo" placeholder="Correo Electronico" >
	   <input type="text" name="motivo" placeholder="Motivo de Consulta" >
	   <textarea name="consulta" placeholder="Consulta " rows=5></textarea>   <!--rows=5 es la cantidad de lineas que quiero que se muestren-->
	   <br>
	   <input type="submit" class="boton_envio">   <!--boton de envio--> 
   </form>
     </div>  

   <footer> <!--pie de página-->   
       <p>© 2022 - Aplicaciónes - info@sistemasvilla.com</p>
   </footer>
                
</body>

</html>