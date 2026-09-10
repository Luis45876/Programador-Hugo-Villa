<?php

if(isset($_POST['add'])){
    header("Location: inicio.php");  //boton de cancelación
  }

$timestamp = strtotime($_POST['feching']); // La transforma a Dia/Mes/Año
$fecha_ingreso = strftime("%d/%m/%Y", $timestamp);
include("libreria_pdf/fpdf.php");  

$o=utf8_decode("º");
$u=utf8_decode("ü");
$n=utf8_decode("ñ");
$t=utf8_decode("ó");
$t2=utf8_decode("Ó");
$a=utf8_decode("á");
$A=utf8_decode("Á");

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
$clien_certificado = utf8_decode($_POST['certificado']);
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
  $pdf->Text(38,21,'Form. N'.$o.' 1');
  //Fin Encabezado
  $pdf->SetFont('times','BI',20);
  $pdf->Cell(180,35,'SOLICITUD DE LICENCIA',0,80,'R');//Para que valla a la derecha: primero 0va bien a la derecha y 185 lo lleva horizontalmente donde yo quiero y R    //35 da arriba para abajo
  //Tachar lo que no corresponde
     $pdf->SetFont('times','',10);
  switch ($clien_opc2) { // muestra "prov" o "tit" o "reemp"
    case "prov":
     $pdf->Text(90,35, 'Titular   -   Provisional   -   Reemplazante   (Tachar lo que no corresponda)');
         $pdf->Line(90,34, 100, 34);//Tacha titular
         $pdf->Line(127,34, 149, 34);//1ºy3ºlug=tamaño linea Tacha Reemplazante
        break;
    case "tit":
     $pdf->Text(90,35, 'Titular   -   Provisional   -   Reemplazante   (Tachar lo que no corresponda)'); 
          $pdf->Line(105,34, 123, 34);//1ºy3ºlug=tamaño linea tacha provisional
          $pdf->Line(127,34, 149, 34);//1ºy3ºlug=tamaño linea Tacha Reemplazante
        break;
    case "reemp":
     $pdf->Text(90,35, 'Titular   -   Provisional   -   Reemplazante   (Tachar lo que no corresponda)'); 
         $pdf->Line(105,34, 123, 34);//1ºy3ºlug=tamaño linea tacha provisional
         $pdf->Line(90,34, 100, 34);//Tacha titular
        break;
  }
  //FIN tachar lo que no corresponde
  $pdf->SetFont('times','',12);
  $pdf->Text(22,43, 'Quien suscribe.....................................................................................Fecha Ingreso................................');
     // Datos traidos de POST
  $pdf->SetFont('Courier','',12);
  $pdf->Text(56,42, $apellido.' '.$nombre);
  $pdf->Text(163,42, $fecha_ingreso);
  $pdf->Text(25,49, $clien_cargo);
  $pdf->Text(115,49, $clien_cuil);
  $pdf->Text(180,49, $clien_numesc);
  $pdf->Text(34,59, $clien_antiguedad);
  $pdf->Text(120,59, $clien_licoinasist);
  $pdf->Text(45,68, $dia_desde);
  $pdf->Text(68,68, $mes_desde);
  $pdf->Text(92,68, $ano_desde);
  $pdf->Text(127,68, $dia_hasta);
  $pdf->Text(150,68, $mes_hasta);
  $pdf->Text(173,68, $ano_hasta);
  $pdf->Text(46,75, $clien_articausa);
  $pdf->Text(96,84, $clien_certificado);
  $pdf->Text(51,93, $clien_lugarpresent);
  $pdf->Text(118,93, $dia_presen);
  $pdf->Text(132,93, $mes_presentacion);
  $pdf->Text(167,93, $ano_presen);


  // FIN datos traidos de POST

  $pdf->SetFont('times','',12);
  $pdf->Text(22,50, '....................................................................CUIL-DNI..................................de la Escuela N'.$o.'..................');
  $pdf->SetFont('times','',11);
  $pdf->Text(40,53,'Cargo que desempe'.$n.'a');
  $pdf->SetFont('times','',12);
  $pdf->Text(22,60, 'Con....................              de antig'.$u.'edad solicita se le................................................................................');
  $pdf->Text(52,58, 'meses');
  $pdf->Text(53,62, 'a'.$n.'os');
  $pdf->SetFont('times','',10);
  // Tacha meses o años
        switch ($clien_transporte) { 
    case "años":
            $pdf->Line(51,57, 63, 57);//1ºy3ºlug=tamaño linea tacha provisional/2ºy4º la altura
        break;
    case "meses":
            $pdf->Line(51,61, 63, 61);//1ºy3ºlug=tamaño linea tacha provisional/2ºy4º la altura
        break;
         }
  // FIN tacha meses o años
  $pdf->Text(135,63, 'Conc. Lic. / Just. Inasist');
   // Tacha licencias
        switch ($clien_licoinasist) { //guarda "Conceda Licencia" o "Justifique Inasistencia"
    case "Conceda Licencia":
            $pdf->Line(152,62, 170, 62);//1ºy3ºlug=tamaño linea tacha provisional/2ºy4º la altura
        break;
    case "Justifique Inasistencia":
            $pdf->Line(134,62, 150, 62);//1ºy3ºlug=tamaño linea tacha provisional/2ºy4º la altura
        break;
         }
  // FIN tacha licencias
  $pdf->SetFont('times','',12);
  $pdf->Text(22,69,'Desde el ...................../...................../..................... hasta el ...................../...................../................... por');
   $pdf->Text(22,76,'....................................................................................................................................................................');
   $pdf->SetFont('times','',11);
  $pdf->Text(102,79,'Motivo'); //Columna,Fila
  $pdf->SetFont('times','',12);
  $pdf->Text(22,85,'acompa'.$n.'a los siguientes certificados ........................................................................................................'); //Columna,Fila
  $pdf->Text(22,94,'Lugar y fecha .............................................................................................................................................');
  $pdf->Text(125,93,'de                             de');
  $pdf->Text(125,105,'Firma..........................................................');
  $pdf->SetFont('times','',10);
  $pdf->Text(22,117,'EN MI CARACTER DE DIRECTOR DE LA ESCUELA N'.$o.'..................... elevo a la Superioridad la presente solicitud a sus');
  $pdf->Text(22,124,'efectos.');
  $pdf->Text(22,129,'Fecha.............................................................................................        Sello               .......................................................');
  $pdf->Text(152,133,'Firma del Director');
  $pdf->Line(22,138, 196, 138);//1ºy3ºlug=tamaño linea
  $pdf->Text(22,147,'Resoluci'.$t.'n N'.$o.'..................... SECCION LICENCIAS, debidamente autorizada por la Presidencia del CONSEJO GENERAL');
  $pdf->Text(22,156,'DE EDUCACI'.$t2.'N, RESUELVE:.................................. al solicitante ........................................................................... goce de');
  $pdf->Text(22,165,'haberes desde el .................................. hasta el .................................. en virtud del Art...................... del Reglamento vigente');
  $pdf->Text(22,174,'Fecha .........................................................................');
  $pdf->Line(22,183, 196, 183);//1ºy3ºlug=tamaño linea
  $pdf->Text(22,193,'VUELVE A LA DIRECCI'.$t2.'N DE LA ESCUELA N'.$o.' ............................... llevando a su conocimiento y dem'.$a.'s efectos');
  $pdf->Text(22,201,'que por Res. N'.$o.' ....................... se dispone ............................. goce de haberes a .......................................................................');
  $pdf->Text(152,204,'Nombre y Apellido');
  $pdf->Text(22,209,'Legajo N'.$o.' ............................... desde .................................. hasta ................................. de acuerdo al Art. .......................... de');
  $pdf->Text(22,217,'la Reglamentaci'.$t.'n vigente.');
  $pdf->Text(64,228,'San Salvador de Jujuy, .................. de ......................................................... de ..........................');
  $pdf->Text(130,237,'...........................................................................');
  $pdf->Text(22,246,'En la fecha me notifico ....................................................................................');
  $pdf->Text(130,254,'...........................................................................');
  $pdf->Text(158,257,'Firma');
  $pdf->Output();
//500,30,'SOLICITUD DE LICENCIA'
?>