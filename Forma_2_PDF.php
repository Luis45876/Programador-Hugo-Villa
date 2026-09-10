<?php

if(isset($_POST['add'])){
    header("Location: inicio.php");  //boton de cancelación
  }

//$prueba = date("d/m/y");
//$prueba = date('d-m-Y', $_POST['feching']);
//$prueba = DateTime::createFromFormat('Y/m/d', $_POST['feching']);
// Fecha en formato yyyy/mm/dd

include("libreria_pdf/fpdf.php");  

$o=utf8_decode("º");
$u=utf8_decode("ü");
$n=utf8_decode("ñ");
$t=utf8_decode("ó");
$t2=utf8_decode("Ó");
$a=utf8_decode("á");
$A=utf8_decode("Á");
$U=utf8_decode("Ú");

$apellido = strtoupper($_POST['apellido']);
$nombre = strtoupper($_POST['nombre']);
$clien_cargo = $_POST['cargo'];
$clien_cuil = $_POST['cuil'];
$clien_antiguedad = $_POST['antig'];
$clien_numesc = $_POST['numesc'];
$clien_transporte = $_POST['transporte']; // si se elige años envia: "años" si se envia mes envia: "meses"
   
$clien_licoinasist = $_POST['licoinasist']; //guarda "Conceda Licencia" o "Justifique Inasistencia"
//Sacar Dia, Mes y Año por separado
$clien_desde = strtotime($_POST['desde']); //transforma fecha en entero
$dia_desde = date("d", $clien_desde);
$mes_desde = date("m", $clien_desde);
$ano_desde = date("Y", $clien_desde);
$clien_hasta = $_POST['hasta'];
$clien_hasta = strtotime($_POST['hasta']); //transforma fecha en entero
$dia_hasta = date("d", $clien_hasta);
$mes_hasta = date("m", $clien_hasta);
$ano_hasta = date("Y", $clien_hasta);
//Fin Sacar Día, Mes y Año por separado
$clien_opc2 = $_POST['opc2']; // muestra "prov" o "tit" o "reemp"
$clien_articausa = utf8_decode($_POST['articausa']);

$clien_lugarpresent = $_POST['lugarpresent'];
//Sacar Dia, Mes y Año del Día de presentación
   $clien_fechapres = strtotime($_POST['fechapresent']);  //transforma fecha en entero
   $dia_presen = date("d", $clien_fechapres);
   $ano_presen = date("Y", $clien_fechapres);
   $mes_presen = date("m", $clien_fechapres);
       switch ($mes_presen) { 
    case "01":
        $mes_presentacion = "enero";
        break;
    case "02":
        $mes_presentacion = "febrero";
        break;
    case "03":
        $mes_presentacion = "marzo";
        break;
    case "04":
        $mes_presentacion = "abril";
        break;
    case "05":
        $mes_presentacion = "mayo";
        break;
    case "06":
        $mes_presentacion = "junio";
         break;    
    case "07":
         $mes_presentacion = "julio";
         break;
    case "08":
         $mes_presentacion = "agosto";
         break;
    case "09":
         $mes_presentacion = "septiembre";
         break;    
    case "10":
         $mes_presentacion = "octubre";
         break;
    case "11":
         $mes_presentacion = "noviembre";
         break;
    case "12":
         $mes_presentacion = "diciembre";
         break;
  }
//Fin sacar Dia, Mes y Año del Día de presentación
  $pdf = new FPDF();
  $pdf->AddPage();
  //Encabezado
  $pdf->SetFont('times','B',9);
  $pdf->Text(27,12, 'Ministerio de Educaci'.$t.'n');
  $pdf->Text(28,15, $A.'rea Recursos Humanos');//Columna,Fila
  $pdf->Text(33,18,'Secci'.$t.'n Licencias');
  $pdf->Text(38,21,'Form. N'.$o.' 2');
  //Fin Encabezado
  $pdf->SetFont('times','BI',20);
  $pdf->Cell(180,42,'SOLICITUD DE LICENCIA',0,80,'R');//Para que valla a la derecha: primero 0va bien a la derecha y 185 lo lleva horizontalmente donde yo quiero y R    //35 da arriba para abajo
  //Tachar lo que no corresponde
     $pdf->SetFont('times','',10);
 

$pdf->Text(104,38, '('.$U.'nicamente para casos en que Direcci'.utf8_decode("ó").'n pueda Justificar)'); //aqui es al revez, columna y fila
$pdf->Text(90,41.5, 'Titular   -   Provisional   -   Reemplazante   (Tachar lo que no corresponda)');
  switch ($clien_opc2) { // muestra "prov" o "tit" o "reemp"
    case "prov":
     
         $pdf->Line(90,40.8, 100, 40.8);//Tacha titular
         $pdf->Line(127,40.8, 149, 40.8);//1ºy3ºlug=tamaño linea Tacha Reemplazante
        break;
    case "tit":
      
          $pdf->Line(105,40.8, 123, 40.8);//1ºy3ºlug=tamaño linea tacha provisional
          $pdf->Line(127,40.8, 149, 40.8);//1ºy3ºlug=tamaño linea Tacha Reemplazante
        break;
    case "reemp":
      
         $pdf->Line(105,40.8, 123, 40.8);//1ºy3ºlug=tamaño linea tacha provisional
         $pdf->Line(90,40.8, 100, 40.8);//Tacha titular
        break;
  }
  //FIN tachar lo que no corresponde
  $pdf->SetFont('times','',12);
  $pdf->Text(22,50, 'Quien suscribe............................................................................................................');
     // Datos traidos de POST
  $pdf->SetFont('Courier','',12);
  $pdf->Text(56,49, $apellido.' '.$nombre);
  
  $pdf->Text(25,55, $clien_cargo);
  $pdf->Text(115,55, $clien_cuil);
  $pdf->Text(180,55, $clien_numesc);
  $pdf->Text(34,64.5, $clien_antiguedad);
  $pdf->Text(120,64.5, $clien_licoinasist);
  $pdf->Text(45,73.2, $dia_desde);
  $pdf->Text(68,73.2, $mes_desde);
  $pdf->Text(92,73.2, $ano_desde);
  $pdf->Text(127,73.2, $dia_hasta);
  $pdf->Text(150,73.2, $mes_hasta);
  $pdf->Text(173,73.2, $ano_hasta);
  $pdf->Text(46,84, $clien_articausa);
  

 //$pdf->SetFont('Arial','B',16);   para poner negrita
 $pdf->Text(30,95, $clien_lugarpresent.', '.$dia_presen.' de '.$mes_presentacion.' de '.$ano_presen);
  


  // FIN datos traidos de POST

  $pdf->SetFont('times','',12);
  $pdf->Text(22,56, '....................................................................CUIL-DNI..................................de la Escuela N'.$o.'..................');
  $pdf->SetFont('times','',11);
  $pdf->Text(40,59,'Cargo que desempe'.$n.'a');
  $pdf->SetFont('times','',12);
  $pdf->Text(22,66, 'Con....................              de antig'.$u.'edad solicita se le................................................................................');
  $pdf->Text(52,63.5, 'meses');
  $pdf->Text(53,68.5, 'a'.$n.'os');
  $pdf->SetFont('times','',10);
  // Tacha meses o años
        switch ($clien_transporte) { 
    case "años":
            $pdf->Line(51,62.7, 63, 62.7);//1ºy3ºlug=tamaño linea tacha provisional/2ºy4º la altura
        break;
    case "meses":
            $pdf->Line(51,67.8, 63, 67.8);//1ºy3ºlug=tamaño linea tacha provisional/2ºy4º la altura
        break;
         }
  // FIN tacha meses o años
  $pdf->Text(135,68.5, 'Conc. Lic. / Just. Inasist');
   // Tacha licencias
        switch ($clien_licoinasist) { //guarda "Conceda Licencia" o "Justifique Inasistencia"
    case "Conceda Licencia":
            $pdf->Line(152,67.5, 170, 67.5);//1ºy3ºlug=tamaño linea tacha provisional/2ºy4º la altura
        break;
    case "Justifique Inasistencia":
            $pdf->Line(134,67.5, 150, 67.5);//1ºy3ºlug=tamaño linea tacha provisional/2ºy4º la altura
        break;
         }
  // FIN tacha licencias
  $pdf->SetFont('times','',12);
  $pdf->Text(22,74.5,'Desde el ...................../...................../..................... hasta el ...................../...................../................... por');
   $pdf->Text(22,85,'....................................................................................................................................................................');
   $pdf->SetFont('times','',11);
  $pdf->Text(102,88,'Motivo'); //Columna,Fila
  $pdf->SetFont('times','',12);
   //Columna,Fila
  $pdf->Text(22,97,'...................................................................................................................');
  
  $pdf->Text(148,97,'..............................................');
  $pdf->Text(69,100.5,'Lugar y fecha');
  $pdf->Text(165,100.5,'Firma');



  $pdf->SetFont('times','',10);
  $pdf->Text(22,117,'LA DIRECCI'.$t2.'N DE LA ESCUELA RESUELVE:                      .............................................................................................');
  $pdf->Text(133,120,'Conceder Lic. / Justificar Inasist.'); // Columna, fila
  $pdf->Text(22,129,'Con goce de haberes desde ........../........../.......... Hasta ........../........../.......... al solicitante en virtud del Art ............. ');
   $pdf->Text(22,135,'del reglamento vigente.');
   $pdf->Text(22,144,'EN  MI  CARACTER  DE  DIRECTOR  DE  LA  ESCUELA  N'.$o.'  ...............................  elevo a la Superioridad la');
   $pdf->Text(22,150,'presente solicitud debidamente justificada.');
   $pdf->Text(28,158,'................................................................');
  
  $pdf->Text(117,158,'...........................................................................');
   $pdf->Text(52,161,'Fecha                                                                                       Firma del Director');

  $pdf->Output();
//500,30,'SOLICITUD DE LICENCIA'
?>