
 
<?php


if(isset($_POST['add'])){
    header("Location: inicio.php");  //boton de cancelación
  }

include("libreria_pdf/fpdf.php");  

$o=utf8_decode("º");
$u=utf8_decode("ü");
$n=utf8_decode("ñ");
$t=utf8_decode("ó");
$t2=utf8_decode("Ó");
$a=utf8_decode("á");
$A=utf8_decode("Á");
$I=utf8_decode("Í");

// datos que traemos del formulario
$timestamp = strtotime($_POST['fecnac']); // La transforma a Dia/Mes/Año
$fecha_naci = strftime("%d/%m/%Y", $timestamp); // La transforma a Dia/Mes/Año
$timestamp2 = strtotime($_POST['Fechact']); // La transforma a Dia/Mes/Año
$fecha_act = strftime("%d/%m/%Y", $timestamp2);
$anio = date("Y", $timestamp2); // SACA EL AÑO
$nombre =($_POST['nombre']);
$nombre2=utf8_decode($nombre);  //codifica a latino acentos y demas
//$nombre3=strtoupper($nombre2);
$clien_escuela = $_POST['Escuela'];
$clien_docente = $_POST['docente'];
$clien_grado = $_POST['grad'];
$clien_div = $_POST['divi'];
$clien_tur = $_POST['turn'];
$clien_memoria = $_POST['memoria']; 
$clien_atencion = $_POST['atencion'];
$clien_compren = $_POST['comprension'];   
$clien_rendimiento = $_POST['rendimiento'];
$clien_participa = $_POST['participacion'];    
$clien_personal = $_POST['personal'];   
//$aula_colab = $_POST['colab'];
// fin datos que traemos del formulario

  $pdf = new FPDF();
  $pdf->AddPage();
  
  //Encabezado
  /*$pdf->SetFont('times','B',9);
  $pdf->Text(27,12, 'Ministerio de Educaci'.$t.'n');
  $pdf->Text(28,15, $A.'rea Recursos Humanos');//Columna,Fila
  $pdf->Text(33,18,'Secci'.$t.'n Licencias');
  $pdf->Text(38,21,'Form. N'.$o.' 1');
  //Fin Encabezado  */

   // Imagen primero para que valla al fondo
         $pdf->Image('imagenes/Informe_mejorcalidad2.jpg', 10, 10, 200, 0, 'JPG');  
   //utf8_decode("SoluciÃ³n Ãºtil y apaÃ±ada a UTF-8") //codifica a latino acentos y demas

   $pdf->SetFont('times','',12);
   $pdf->Text(96,35,''.$nombre2,50,40,); // COLUMNA, FILA  
   $pdf->Text(82,43,''.$fecha_naci,0,0,);  // COLUMNA, FILA
   $pdf->Text(56,50.5,''.utf8_decode($clien_escuela),0,0,);  // COLUMNA, FILA utf8_decode()es para caracteres latino
   $pdf->Text(53,58,''.utf8_decode($clien_tur),0,0,);  // COLUMNA, FILA
   $pdf->Text(177,35,''.$anio,0,0,);  // COLUMNA, FILA AÑO
   $pdf->Text(175,53,''.utf8_decode($clien_grado),0,0,);  // GRADO
   $pdf->Text(180,53,''.utf8_decode($clien_div),0,0,);  // DIVISIÓN
   $pdf->Text(158,46,''.utf8_decode($clien_docente),0,0,);  // DIVISIÓN

$pdf->SetFont('times','B',14);
//$pdf->Text(33,18,$clien_personal);     
//$pdf->Text(isset(33,18,$_POST['colab']));   //isset( 
///////////////MEMORIA
   if ($clien_memoria == "MB") {
    $pdf->Text(75,96,''."X",0,0,);  // COLUMNA, FILA
} elseif ($clien_memoria == "B") {
    $pdf->Text(75,103,''."X",0,0,);  // COLUMNA, FILA
} else {
    $pdf->Text(75,110,''."X",0,0,);  // COLUMNA, FILA
}
/////////////// ATENCIÓN
if ($clien_atencion == "ade") {
    $pdf->Text(75,131,''."X",0,0,);  // COLUMNA, FILA
} else {
    $pdf->Text(74.5,138.5,''."X",0,0,);  // COLUMNA, FILA
}
////////////// COMPRENSIÓN
if ("$clien_compren" == "rap") {
    $pdf->Text(71,158.5,''."X",0,0,);  // COLUMNA, FILA
}
if ("$clien_compren" == "nor") {
    $pdf->Text(71,165.5,''."X",0,0,);  // COLUMNA, FILA
}
if ("$clien_compren" == "len") {
    $pdf->Text(71,172.5,''."X",0,0,);  // COLUMNA, FILA
}
if ("$clien_compren" == "dif") {
    $pdf->Text(71,179.5,''."X",0,0,);  // COLUMNA, FILA
}
///////////////RENDIMIENTO
   if ($clien_rendimiento == "MB") {
    $pdf->Text(71,201,''."X",0,0,);  // COLUMNA, FILA
} elseif ($clien_rendimiento == "B") {
    $pdf->Text(71,208,''."X",0,0,);  // COLUMNA, FILA
} else {
    $pdf->Text(71,215,''."X",0,0,);  // COLUMNA, FILA
}
///////////////PARTICIPACIÓN
   if ($clien_participa == "perm") {
    $pdf->Text(71,237.5,''."X",0,0,);  // COLUMNA, FILA
} elseif ($clien_participa == "oca") {
    $pdf->Text(71,244,''."X",0,0,);  // COLUMNA, FILA
} else {
    $pdf->Text(71,251,''."X",0,0,);  // COLUMNA, FILA
}
/////////////// RASGOS DE PERSONALIDAD
if ($clien_personal == "extro") {
    $pdf->Text(71,269,''."X",0,0,);  // COLUMNA, FILA
} else {
    $pdf->Text(71,275,''."X",0,0,);  // COLUMNA, FILA
}
////////////////// MANIFESTACIONES EN EL AULA /////////////////////   
  if ( isset($_POST['colab'] )) {   //isset( Es para que aplique SI FUE SELECCIONADO, si no no aplica)
    $pdf->Text(146.5,100.5,''."X",0,0,);  // COLUMNA, FILA
}
if ( isset($_POST['resp'] )) {
    $pdf->Text(146.5,106,''."X",0,0,);  // COLUMNA, FILA
}
if ( isset($_POST['cuida'] )) {   //isset( Es para que aplique SI FUE SELECCIONADO, si no no aplica)
    $pdf->Text(146.5,111.5,''."X",0,0,);  // COLUMNA, FILA
}
if ( isset($_POST['since'] )) {
    $pdf->Text(146.5,116.5,''."X",0,0,);  // COLUMNA, FILA   
}
if ( isset($_POST['const'] )) {
    $pdf->Text(146.5,122,''."X",0,0,);  // COLUMNA, FILA
}
if ( isset($_POST['esfo'] )) {  //isset( Es para que aplique SI FUE SELECCIONADO, si no no aplica)
    $pdf->Text(146.5,127.5,''."X",0,0,);  // COLUMNA, FILA
}
if ( isset($_POST['espturn'] )) {
    $pdf->Text(146.5,134,''."X",0,0,);  // COLUMNA, FILA
}  
/////////////// RELACIÓN CON LOS PARES .... REDONDOS
if ($_POST['relacion'] == "seintegra") {                          
    $pdf->Text(198.8,152.5,''."X",0,0,);  // COLUMNA, FILA
} else {
    $pdf->Text(198.8,158,''."X",0,0,);  // COLUMNA, FILA
} 
    /////////// Impone su voluntad REDONDOS
if ($_POST['integracion'] == "imponvolu") {                          
    $pdf->Text(198.8,163,''."X",0,0,);  // COLUMNA, FILA
} else {
    $pdf->Text(198.8,168.5,''."X",0,0,);  // COLUMNA, FILA
}
/////////// Respeta docenes REDONDOS
if ($_POST['respcdocen'] == "sirespeta") {                          
    $pdf->Text(198.8,174.5,''."X",0,0,);  // COLUMNA, FILA
} else {
    $pdf->Text(198.8,179.5,''."X",0,0,);  // COLUMNA, FILA
}
/////////// Normas de convivencia
if ($_POST['norconvi'] == "sicumplenor") {                          
    $pdf->Text(198.8,185.5,''."X",0,0,);  // COLUMNA, FILA
} else {
    $pdf->Text(198.8,191.4,''."X",0,0,);  // COLUMNA, FILA
}




 
//////////// MARCAR CASILLAS
 if ( isset($_POST['trabasol'] )) {
    $pdf->Text(198.8,203,''."X",0,0,);  // COLUMNA, FILA
}
if ( isset($_POST['colaboraconpa'] )) {
    $pdf->Text(198.8,208,''."X",0,0,);  // COLUMNA, FILA
} 
if ( isset($_POST['prestautiles'] )) {
    $pdf->Text(198.8,214.4,''."X",0,0,);  // COLUMNA, FILA
}
if ( isset($_POST['pideayuda'] )) {
    $pdf->Text(198.8,220,''."X",0,0,);  // COLUMNA, FILA
}               

if ( isset($_POST['turnophablar'] )) {
    $pdf->Text(198.8,225,''."X",0,0,);  // COLUMNA, FILA
}
if ( isset($_POST['esviolen'] )) {
    $pdf->Text(198.8,230.5,''."X",0,0,);  // COLUMNA, FILA
}

///////////ENTORNO FAMILIAR
if ($_POST['familia'] == "apoyoperman") {
    $pdf->Text(183.5,253.3,''."X",0,0,);  // COLUMNA, FILA
}
if ($_POST['familia'] == "apoyonece") {
    $pdf->Text(183.5,258.5,''."X",0,0,);  // COLUMNA, FILA
}
if ($_POST['familia'] == "apoyoescaso") {
    $pdf->Text(183.5,264.3,''."X",0,0,);  // COLUMNA, FILA
}
if ($_POST['familia'] == "apoyoindife") {
    $pdf->Text(183.5,269.5,''."X",0,0,);  // COLUMNA, FILA
}


  

   $pdf->SetFont('times','B',1); // ESTO SE HACE PARA QUE CREE UNA PÁGINA NUEVA se ponen puntitos invisibles
   for($i=1; $i<=28; $i++){
    $pdf->Cell(0,10,'.',0,1);
    }
   /*for($i=1; $i<=28; $i++){
    $pdf->Cell(0,10,'.'.$i,0,1); para que aparezca la página 2*/
  $pdf->Image('imagenes/INFORME_PARTE2.jpg', 0, 0, 200, 0, 'JPG');

   ////////OTROS DATOS DE INTERÉS
  $pdf->SetFont('times','B',14);
if ( isset($_POST['pracdeport'] )) {
    //$pdf->Cell(10,10,'Hola, Mundo!',1);  // COLUMNA, FILA
    $pdf->Text(74,40.5,"X");  // COLUMNA, FILA
}
if ( isset($_POST['idioma'] )) {
    //$pdf->Cell(10,10,'Hola, Mundo!',1);  // COLUMNA, FILA
    $pdf->Text(74,46.4,"X");  // COLUMNA, FILA
}
if ( isset($_POST['ayudaextraes'] )) {
    //$pdf->Cell(10,10,'Hola, Mundo!',1);  // COLUMNA, FILA
    $pdf->Text(74,52,"X");  // COLUMNA, FILA
}
if ( isset($_POST['grupoextraes'] )) {
    //$pdf->Cell(10,10,'Hola, Mundo!',1);  // COLUMNA, FILA
    $pdf->Text(74,58,"X");  // COLUMNA, FILA
}

$pdf->Text(124,50,$_POST['leng']);  // COLUMNA, FILA
$pdf->Text(124,55.5,$_POST['mate']);  // COLUMNA, FILA
$pdf->Text(124,61.5,$_POST['soci']);  // COLUMNA, FILA
$pdf->Text(124,67,$_POST['natu']);  // COLUMNA, FILA

$pdf->Text(168.7,52,$_POST['arte']);  // COLUMNA, FILA
$pdf->Text(168.7,57.5,$_POST['fisi']);  // COLUMNA, FILA
$pdf->Text(168.7,63,$_POST['tecn']);  // COLUMNA, FILA
$pdf->Text(168.7,69,$_POST['etic']);  // COLUMNA, FILA
$pdf->Text(168.7,75,$_POST['otr']);  // COLUMNA, FILA


//$pdf->Text(136,95,$_POST['consulta']);  // COLUMNA, FILA
 //$pdf->Cell(100,95,'Hola, Mundo!',1);   

  //$pdf->Image('http://chart.googleapis.com/chart?cht=p3&chd=t:60,40&chs=250x100&chl=Hello|World', 60, 30, 90, 0, 'PNG');
   //$pdf->MultiCell(0, 3, 'Hola, Mundo!', 0 ,'L',true )           
  
$pdf->SetXY(30,98); // define la posicion de columna y fila
  $pdf->Write(5, $_POST['consulta']); // 5 define el tamaño del interlineado, cuanto espacio entre renglones
   $pdf->Output();

 
?>



