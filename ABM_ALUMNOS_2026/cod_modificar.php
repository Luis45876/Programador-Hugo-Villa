<?php  
    
    $cod_ID = $_POST["form_ID"];// ID CLAVE PRINCIPAL PARA BUSCAR EN LA TABLA AL HACER LA MODIFICACION
	$cod_cod = $_POST["form_codigo"];// DNI
    $cod_ape = $_POST["form_apell"]; // APELLIDO Y NOMBRE
    $cod_nom = $_POST["nom"];  // GRADO
    $cod_edad = $_POST['form_edad']; // form_edad EDAD
    $form_sexo = $_POST['form_sexo'];
	$form_fechnaci = $_POST['form_fechnaci'];
	$form_naci = $_POST['form_naci'];
	$form_fechinsc = $_POST['form_fechinsc'];
	$form_domicilio = $_POST['form_domicilio'];
	$form_Tutor = $_POST['form_Tutor'];
	$form_nactut = $_POST['form_nactut'];
	$form_Profesion = $_POST['form_Profesion'];
	$form_Lugnac = $_POST['form_Lugnac'];
	$form_telefono1 = $_POST['form_telefono1'];
	$form_telefono2 = $_POST['form_telefono2'];
	$telefono3 = $_POST['telefono3'];
	$form_docente = $_POST['form_docente'];
	
  echo "$cod_cod";
  echo "<br>";
  echo "$cod_nom";
  echo "<br>";
  echo "$cod_ape";  
  echo "<br>";
  echo "$cod_edad";
  echo "<br>";
  echo "$form_sexo";
// 1er. paso... conexión a la base de datos...
   //include('conexion.php');
   include('conexion.php');
                                                                                                                                                                                                                //, Nac=''                       
    mysqli_query($datos_bd,"UPDATE alumnos_2026 SET AyN= '$cod_ape', Grado='$cod_nom', Edad='$cod_edad', Sexo='$form_sexo', Fech_Nac='$form_fechnaci' , Nac='$form_naci', Fech_Ins='$form_fechinsc', Domicilio='$form_domicilio', Tutor='$form_Tutor', Nac_Tutor='$form_nactut', Profesion='$form_Profesion', Lugar_Nac='$form_Lugnac' , telefono1='$form_telefono1', telefono2='$form_telefono2', telefono3='$telefono3', docente='$form_docente', DNI='$cod_cod' WHERE ID='$cod_ID' ");

   echo "Datos Modificados";
   header("Location: http://sistemasvilla.com.ar/ABM_ALUMNOS_2026/menuprin.php?mensaje='okmodif'");
//labuena
   //$result = mysqli_query($datos_bd,"SELECT Id,nombre,apellido,edad FROM alumnos");

?>