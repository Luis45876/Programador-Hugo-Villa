<?php
$Grad=$_POST["articausa"];
$nomb=$_POST["APEyNOM"];// datos que vienen de formulario.php
$sex=$_POST["sex"];
$eda=$_POST["edad"];
$fechnaci=$_POST["fechnac"];
$nac_alu=$_POST["nac_alu"];
$fech_insc=$_POST["fech_insc"];
$DNI=$_POST["dni"];
$domicil=$_POST["domicil"];
$tuto=$_POST["tuto"];
$nac_tut=$_POST["nac_tut"];
$prof_tut=$_POST["prof_tut"];
$lugnac=$_POST["lugnac"];
$tele1=$_POST["tele1"];
$tele2=$_POST["tele2"];
$tele3=$_POST["tele3"];
$docent=$_POST["docent"];


echo "Tu nombre es: $nomb";
print "<br />";  // con eso se hace salto de texto
echo "Tu grado es: $Grad";
print "<br />";  // con eso se hace salto de texto
echo "Tu D.N.I. es: $DNI";

    
    include('conexion.php');
 

    mysqli_query($datos_bd,"INSERT INTO alumnos_2026 VALUES (DEFAULT,'$Grad','$nomb','$sex','$eda','$fechnaci','$nac_alu','$fech_insc','$DNI','$domicil','$tuto','$nac_tut','$prof_tut','$lugnac','$tele1','$tele2','$tele3','$docent')");
   
   
   
   echo "Datos Insertados";
 header("Location: http://localhost/ABM_ALUMNOS_2026/menuprin.php?mensaje='ok'"); 

?>