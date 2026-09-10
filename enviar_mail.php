<?php
 $nombre_form=$_POST['nombre'];
  $apellido_form=$_POST['apellido'];
  
   $correo_form=$_POST['correo'];
   $grado_div_form=$_POST['grado_div'];
    $escuela_form=$_POST['escuela'];
	 $destino="info@sistemasvilla.com";
    //$archivo = $_FILES['archi'];

        echo "nombre \n".$nombre_form;

    /*
	 	 
 $asunto= "Enviada desde sistemasvilla.com";
 $mensaje= "Nombre: ".$nombre_form."\r\n"."Apellido: ".$apellido_form."\r\n"."Correo: ".$correo_form."\r\n"."Motivo: ".$motivo_form."\r\n"."Consulta: ".$consulta_form;
 $remitente="From:$nombre_form $apellido_form <$correo_form>";  
 $destinos="villahugoluis@hotmail.com";
     
	if(mail($destino, $asunto, $mensaje, $remitente)){
          echo "fue aceptado:";
          header("Location: mail_enviado.php");
          //exit;
    }else{
       echo "error en el envio...";
    }   */

    ?>