<?php
require("archivosmail/class.phpmailer.php"); // para que reconozca el archivo adjunto
require 'archivosmail/class.smtp.php'; //incluimos la clase para envíos por SMTP

 $nombre_form=$_POST['nombre'];
  $apellido_form=$_POST['apellido'];
  
   $correo_form=$_POST['correo'];
   $grado_div_form=$_POST['grado_div'];
   $escuela_form=$_POST['escuela'];
   $archivo = $_FILES['archi']; 
   $destino="info@sistemasvilla.com";
 /*    //echo "nombre \n".$nombre_form;
$Nombre = $_POST['Nombre'];
$Email = $_POST['Email'];
$Mensaje = $_POST['Mensaje'];
$archivo = $_FILES['adjunto'];
 */

   

    ?>