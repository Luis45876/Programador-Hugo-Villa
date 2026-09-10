<?php
 // $conexion = new mysqli("localhost", "root", "", "escuela");
 $conexion = new mysqli('localhost','u658525126_villahugoluis','Packing&&7614','u658525126_escuela');
if ($conexion->connect_error) die("Error de conexión: " . $conexion->connect_error);
$conexion->set_charset("utf8mb4");

function mayusculas($texto) {
    return function_exists("mb_strtoupper") ? mb_strtoupper($texto, "UTF-8") : strtoupper($texto);
}
function formatearNombre($nombre) {
    $partes = preg_split('/\s+/u', trim($nombre));
    if (!$partes || $partes[0] === "") return "";
    $apellido = mayusculas(rtrim(array_shift($partes), ","));
    $resto = trim(implode(" ", $partes));
    return $resto === "" ? $apellido : $apellido . ", " . $resto;
}
function claveNombre($nombre) {
    return mayusculas(preg_replace('/[,\s]+/u', ' ', trim($nombre)));
}
function esTitular($revista) {
    return mayusculas(trim($revista)) === "TITULAR";
}
function claveOrden($texto) {
    $texto = mayusculas(trim($texto));
    $texto = strtr($texto, array(
        "Á"=>"A", "É"=>"E", "Í"=>"I", "Ó"=>"O", "Ú"=>"U", "Ü"=>"U", "Ñ"=>"N",
        "á"=>"A", "é"=>"E", "í"=>"I", "ó"=>"O", "ú"=>"U", "ü"=>"U", "ñ"=>"N"
    ));
    return trim(preg_replace('/[^A-Z0-9]+/', ' ', $texto));
}
function prioridadEspecial($fila) {

    $nombre  = claveOrden($fila["AYN"]);
    $revista = claveOrden($fila["REVISTA"]);

    if (
        $nombre === "MAMANI MIRTA GRACIELA" &&
        $revista === "TITULAR"
    ) {
        return 1;
    }

    if (
        $nombre === "BALDERRAMA NORMA LAURA" &&
        strpos($revista, "REEMP") === 0
    ) {
        return 2;
    }

    if (
        $nombre === "SOLANO ROSA" &&
        strpos($revista, "PROVIS") === 0
    ) {
        return 3;
    }

    if (
        $nombre === "BALDERRAMA NORMA LAURA" &&
        $revista === "TITULAR"
    ) {
        return 4;
    }

    if (
        $nombre === "VILLA HUGO LUIS" &&
        strpos($revista, "REEMP") === 0
    ) {
        return 5;
    }

    if (
        $nombre === "VILLA HUGO LUIS" &&
        $revista === "TITULAR"
    ) {
        return 6;
    }

    if (
        $nombre === "TORRES NATALIA EVANGELINA" &&
        strpos($revista, "REEMP") === 0
    ) {
        return 7;
    }

    return 999;
}

function mostrarObservaciones($fila) {
    if ($fila["presentismo"] !== "NO" || empty($fila["articulos"])) return;
    foreach (explode(" || ", $fila["articulos"]) as $articulo) {
        echo htmlspecialchars($articulo, ENT_QUOTES, "UTF-8") . "<br>";
    }
}
function mesEspanol($fecha) {
    $meses = array(1=>"ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO",
                   "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE");
    return $meses[(int)date("n", strtotime($fecha))] . " " . date("Y", strtotime($fecha));
}
function fechaLargaActual() {
    $meses = array(1=>"enero", "febrero", "marzo", "abril", "mayo", "junio",
                   "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
    $ahora = time();
    return date("d", $ahora) . " de " . $meses[(int)date("n", $ahora)] . " de " . date("Y", $ahora);
}

$fecha_desde = "";
$fecha_hasta = "";
$filas = array();
$mensaje_error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fecha_desde = isset($_POST["fecha_desde"]) ? $_POST["fecha_desde"] : "";
    $fecha_hasta = isset($_POST["fecha_hasta"]) ? $_POST["fecha_hasta"] : "";

    if (empty($fecha_desde) || empty($fecha_hasta)) {
        $mensaje_error = "Debe seleccionar las dos fechas.";
    } elseif ($fecha_desde > $fecha_hasta) {
        $mensaje_error = "La fecha DESDE no puede ser mayor que la fecha HASTA.";
    } else {
        $sql = "SELECT p.id, p.AYN, p.CARGO, p.REVISTA, p.CUIL, p.CUPOF, p.ATENALU,
                CASE WHEN COUNT(f.id_falta) = 0 THEN 'SI' ELSE 'NO' END AS presentismo,
                GROUP_CONCAT(DISTINCT CONCAT(
                    DATE_FORMAT(f.fecha_desde, '%d/%m/%Y'), ' al ',
                    DATE_FORMAT(f.fecha_hasta, '%d/%m/%Y'), ' - ',
                    CASE WHEN UPPER(TRIM(f.articulo)) = 'OTRA'
                         THEN COALESCE(NULLIF(TRIM(f.observaciones), ''), 'OTRA')
                         ELSE f.articulo END)
                    ORDER BY f.fecha_desde, f.fecha_hasta SEPARATOR ' || ') AS articulos
                FROM personal_2026 p
                LEFT JOIN faltas f ON p.id = f.id_personal
                    AND f.fecha_desde <= ? AND f.fecha_hasta >= ?
                GROUP BY p.id, p.AYN, p.CARGO, p.REVISTA, p.CUIL, p.CUPOF, p.ATENALU
                ORDER BY p.AYN ASC, p.CARGO ASC, p.REVISTA ASC";

        $consulta = $conexion->prepare($sql);
        if (!$consulta) die("Error al preparar la consulta: " . $conexion->error);
        $consulta->bind_param("ss", $fecha_hasta, $fecha_desde);
        $consulta->execute();
        $resultado = $consulta->get_result();

        while ($fila = $resultado->fetch_assoc()) {
            $fila["AYN_MOSTRAR"] = formatearNombre($fila["AYN"]);
            $fila["CLAVE_NOMBRE"] = claveNombre($fila["AYN"]);
            $fila["presentismo_original"] = $fila["presentismo"];
            $fila["ORDEN_ORIGINAL"] = count($filas);
            $filas[] = $fila;
        }
        $consulta->close();

        // Agrupa los nombres iguales, aunque uno tenga coma y otro no.
        $grupos = array();
        foreach ($filas as $indice => $fila) $grupos[$fila["CLAVE_NOMBRE"]][] = $indice;

        // El titular copia el presentismo del otro cargo y no usa sus propias faltas.
        foreach ($grupos as $indices) {
            if (count($indices) < 2) continue;
            foreach ($indices as $indiceTitular) {
                if (!esTitular($filas[$indiceTitular]["REVISTA"])) continue;
                $presentismoDelOtro = "SI";
                foreach ($indices as $indiceOtro) {
                    if ($indiceOtro !== $indiceTitular &&
                        $filas[$indiceOtro]["presentismo_original"] === "NO") {
                        $presentismoDelOtro = "NO";
                        break;
                    }
                }
                $filas[$indiceTitular]["presentismo"] = $presentismoDelOtro;
                $filas[$indiceTitular]["articulos"] = null;
            }
        }

        // Coloca primero los siete cargos indicados y conserva el resto en orden alfabético.
        usort($filas, function ($a, $b) {
            $prioridadA = prioridadEspecial($a);
            $prioridadB = prioridadEspecial($b);
            if ($prioridadA !== $prioridadB) return $prioridadA <=> $prioridadB;
            return $a["ORDEN_ORIGINAL"] <=> $b["ORDEN_ORIGINAL"];
        });

        // ==============================================================
        // WORD CON EL FORMATO OFICIAL DEL ARCHIVO DE EJEMPLO
        // ==============================================================
        if (isset($_POST["exportar_formato_oficial"])) {
            header("Content-Type: application/msword; charset=UTF-8");
            header('Content-Disposition: attachment; filename="Planilla_oficial_' . $fecha_desde . '_al_' . $fecha_hasta . '.doc"');
            header("Pragma: no-cache");
            header("Expires: 0");
            echo "\xEF\xBB\xBF";
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<style>
@page SeccionOficial { size: 841.9pt 595.3pt; mso-page-orientation: landscape; margin: 24pt 28pt 28pt 28pt; }
div.SeccionOficial { page: SeccionOficial; }
body { font-family: Arial, Helvetica, sans-serif; font-size: 9pt; color: #000; }
.anexo { font-family: "Arial Rounded MT Bold", Arial, sans-serif; font-size: 11pt; font-weight: bold; text-align: center; margin: 0; }
.titulo-oficial { font-family: "Arial Rounded MT Bold", Arial, sans-serif; font-size: 10pt; text-align: center; text-decoration: underline; margin: 3pt 0 7pt; }
.datos { width: 100%; border: 0; margin-bottom: 8pt; }
.datos td { border: 0; padding: 1pt 6pt; font-size: 9pt; }
.datos .etiqueta { font-weight: bold; }
.planilla { width: 100%; border-collapse: collapse; table-layout: fixed; }
.planilla th, .planilla td { border: 0.6pt solid #000; padding: 2pt; vertical-align: middle; }
.planilla th { font-size: 7.5pt; text-align: center; font-weight: bold; }
.planilla td { font-size: 7.5pt; }
.planilla thead { display: table-header-group; }
.centro { text-align: center; }
.orden { width: 4%; }.nombres { width: 18%; }.revista-of { width: 9%; }.cargo-of { width: 9%; }
.cuil-of { width: 10%; }.cupof-of { width: 8%; }.marca { width: 4%; }.obs-of { width: 20%; }
.pie-fecha { font-size: 9pt; margin-top: 3pt; }
.pie-fecha strong { font-weight: bold; }
.firmas { width: 100%; margin-top: 22pt; border: 0; }
.firmas td { width: 50%; border: 0; text-align: center; font-size: 9pt; }
</style>
</head>
<body><div class="SeccionOficial">
<p class="anexo">ANEXO I</p>
<p class="titulo-oficial">PLANILLA MENSUAL DE NOVEDADES LABORALES</p>
<table class="datos"><tr>
<td width="52%">
<span class="etiqueta">ESTABLECIMIENTO:</span> Escuela N° 458 “Bandera Nacional de Nuestra Libertad Civil”<br>
<span class="etiqueta">CATEGORÍA:</span> Primera<br>
<span class="etiqueta">TURNO:</span> Mañana/Tarde<br>
<span class="etiqueta">DEPARTAMENTO:</span> Dr. Manuel Belgrano.<br>
<span class="etiqueta">RESPONSABLE JERÁRQUICO:</span> Balderrama Norma
</td>
<td width="48%">
<span class="etiqueta">NIVEL EDUCATIVO:</span> Primario.<br>
<span class="etiqueta">LOCALIDAD:</span> San Salvador de Jujuy.<br>
<span class="etiqueta">MES Y AÑO:</span> <?php echo mesEspanol($fecha_desde); ?><br>
<span class="etiqueta">TELÉFONO DE CONTACTO:</span> 4057427<br>
<span class="etiqueta">PERÍODO:</span> <?php echo date("d/m/y",strtotime($fecha_desde)); ?> AL <?php echo date("d/m/y",strtotime($fecha_hasta)); ?>
</td></tr></table>

<table class="planilla">
<thead>
<tr>
<th class="orden" rowspan="2">ORDEN</th><th class="nombres" rowspan="2">APELLIDOS Y NOMBRES</th>
<th class="revista-of" rowspan="2">SITUACIÓN DE<br>REVISTA<br><small>(cargo que desempeña)</small></th>
<th class="cargo-of" rowspan="2">CARGO<br>/HORAS</th><th class="cuil-of" rowspan="2">CUIL</th>
<th class="cupof-of" rowspan="2">CUPOF</th><th colspan="2">FRENTE ALUMNO</th>
<th colspan="2">COBRO PRESENTISMO/<br>ASISTENCIA PERFECTA<br><small>(según corresponda)</small></th>
<th class="obs-of" rowspan="2">OBSERVACIONES</th>
</tr>
<tr><th class="marca">SÍ</th><th class="marca">NO</th><th class="marca">SÍ</th><th class="marca">NO</th></tr>
</thead><tbody>
<?php foreach ($filas as $numero=>$fila) {
    $frenteAlumno = mayusculas(trim($fila["ATENALU"]));
?>
<tr>
<td class="centro"><?php echo str_pad($numero+1,2,"0",STR_PAD_LEFT); ?></td>
<td><?php echo htmlspecialchars($fila["AYN_MOSTRAR"],ENT_QUOTES,"UTF-8"); ?></td>
<td><?php echo htmlspecialchars($fila["REVISTA"],ENT_QUOTES,"UTF-8"); ?></td>
<td><?php echo htmlspecialchars($fila["CARGO"],ENT_QUOTES,"UTF-8"); ?></td>
<td class="centro"><?php echo htmlspecialchars($fila["CUIL"],ENT_QUOTES,"UTF-8"); ?></td>
<td class="centro"><?php echo htmlspecialchars($fila["CUPOF"],ENT_QUOTES,"UTF-8"); ?></td>
<td class="centro"><?php echo $frenteAlumno==="SI" ? "X" : ""; ?></td>
<td class="centro"><?php echo $frenteAlumno==="SI" ? "" : "X"; ?></td>
<td class="centro"><?php echo $fila["presentismo"]==="SI" ? "X" : ""; ?></td>
<td class="centro"><?php echo $fila["presentismo"]==="NO" ? "X" : ""; ?></td>
<td><?php mostrarObservaciones($fila); ?></td>
</tr>
<?php } ?>
</tbody></table>
<p class="pie-fecha"><strong>LUGAR Y FECHA:</strong> San Salvador de Jujuy, <?php echo fechaLargaActual(); ?>.</p>
<table class="firmas"><tr><td>SELLO ESTABLECIMIENTO</td><td>FIRMA DIRECTOR RESPONSABLE</td></tr></table>
</div></body></html>
<?php
            $conexion->close();
            exit;
        }

        if (isset($_POST["exportar_word"])) {
            header("Content-Type: application/msword; charset=UTF-8");
            header('Content-Disposition: attachment; filename="Presentismo_' . $fecha_desde . '_al_' . $fecha_hasta . '.doc"');
            header("Pragma: no-cache");
            header("Expires: 0");
            echo "\xEF\xBB\xBF";
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
<style>
body{font-family:Arial,sans-serif;font-size:9pt}h2,.periodo{text-align:center}.periodo{margin-bottom:20px;font-weight:bold}
table{width:100%;border-collapse:collapse}th,td{border:1px solid #000;padding:5px}th{background:#ddd;text-align:center}.centro{text-align:center}.negrita{font-weight:bold}
</style></head><body>
<h2>LISTADO DE PRESENTISMO DEL PERSONAL</h2>
<div class="periodo">Período: <?php echo date("d/m/Y",strtotime($fecha_desde)); ?> al <?php echo date("d/m/Y",strtotime($fecha_hasta)); ?></div>
<table><thead><tr><th>NOMBRES Y APELLIDOS</th><th>CARGO</th><th>REVISTA</th><th>CUIL</th><th>CUPOF</th><th>ATENALU</th><th>PRESENTISMO</th><th>OBSERVACIONES</th></tr></thead><tbody>
<?php foreach ($filas as $fila) { ?>
<tr>
<td><?php echo htmlspecialchars($fila["AYN_MOSTRAR"],ENT_QUOTES,"UTF-8"); ?></td>
<td><?php echo htmlspecialchars($fila["CARGO"],ENT_QUOTES,"UTF-8"); ?></td>
<td class="centro"><?php echo htmlspecialchars($fila["REVISTA"],ENT_QUOTES,"UTF-8"); ?></td>
<td class="centro"><?php echo htmlspecialchars($fila["CUIL"],ENT_QUOTES,"UTF-8"); ?></td>
<td class="centro"><?php echo htmlspecialchars($fila["CUPOF"],ENT_QUOTES,"UTF-8"); ?></td>
<td class="centro"><?php echo htmlspecialchars($fila["ATENALU"],ENT_QUOTES,"UTF-8"); ?></td>
<td class="centro negrita"><?php echo $fila["presentismo"]; ?></td><td><?php mostrarObservaciones($fila); ?></td>
</tr><?php } ?>
</tbody></table></body></html>
<?php $conexion->close(); exit; }
    }
}
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Consulta de Presentismo</title>
<style>
body{font-family:Arial,sans-serif;background:#f4f6f7;margin:30px}h2{text-align:center;color:#024959}
.formulario{width:98%;margin:0 auto 25px;background:#fff;padding:20px;box-sizing:border-box;border:1px solid #ccc;text-align:center}
.formulario label{font-weight:bold;margin-right:5px}.formulario input[type=date]{padding:7px;margin-right:20px}
.boton,.boton-word,.boton-imprimir{color:#fff;border:0;padding:10px 20px;cursor:pointer;font-weight:bold;border-radius:4px}
.boton{background:#024959}.boton:hover{background:#03738c}.boton-word{background:#185abd}.boton-word:hover{background:#10478f}
.boton-imprimir{background:#5a5a5a;margin-left:10px}.boton-imprimir:hover{background:#333}
.boton-oficial{background:#7b3f00;margin-left:10px}.boton-oficial:hover{background:#542b00}
.periodo{width:98%;margin:10px auto 15px;font-weight:bold;color:#024959}.contenedor-tabla{width:98%;margin:auto;overflow-x:auto}
table{width:100%;border-collapse:collapse;background:#fff}th{background:#024959;color:#fff;padding:9px 6px;border:1px solid #ccc}
td{padding:8px 6px;border:1px solid #ccc}tr:nth-child(even){background:#f2f2f2}.nombre{min-width:210px}.cargo{min-width:100px}
.revista,.cuil,.cupof,.atenalu,.presentismo{text-align:center}.observaciones{min-width:260px}.presentismo{font-weight:bold}.si{color:green}.no,.obs-no{color:#b00000}
.mensaje-error{width:98%;margin:20px auto;text-align:center;font-weight:bold;color:red}.zona-botones{width:98%;margin:20px auto;text-align:center}.zona-botones form{display:inline-block}
@media print{body{background:#fff;margin:0}.formulario,.zona-botones{display:none}h2,.periodo{color:#000}.contenedor-tabla{width:100%;overflow:visible}table{font-size:8pt}th{background:#fff!important;color:#000!important}th,td{border:1px solid #000;padding:4px}td{color:#000!important}}
</style></head><body>
<h2>LISTADO DE PRESENTISMO DEL PERSONAL</h2>
<form method="post" class="formulario">
<label>Desde:</label><input type="date" name="fecha_desde" value="<?php echo htmlspecialchars($fecha_desde,ENT_QUOTES,"UTF-8"); ?>" required>
<label>Hasta:</label><input type="date" name="fecha_hasta" value="<?php echo htmlspecialchars($fecha_hasta,ENT_QUOTES,"UTF-8"); ?>" required>
<input type="submit" value="CALCULAR PRESENTISMO" class="boton"></form>
<?php if ($mensaje_error !== "") { ?><div class="mensaje-error"><?php echo htmlspecialchars($mensaje_error,ENT_QUOTES,"UTF-8"); ?></div><?php } ?>
<?php if (!empty($filas) && $mensaje_error === "") { ?>
<div class="periodo">Período consultado: <?php echo date("d/m/Y",strtotime($fecha_desde)); ?> al <?php echo date("d/m/Y",strtotime($fecha_hasta)); ?></div>
<div class="contenedor-tabla"><table><thead><tr><th>NOMBRES Y APELLIDOS</th><th>CARGO</th><th>REVISTA</th><th>CUIL</th><th>CUPOF</th><th>ATENALU</th><th>PRESENTISMO</th><th>OBSERVACIONES</th></tr></thead><tbody>
<?php foreach ($filas as $fila) { $presentismo=$fila["presentismo"]; ?>
<tr><td class="nombre"><?php echo htmlspecialchars($fila["AYN_MOSTRAR"],ENT_QUOTES,"UTF-8"); ?></td>
<td class="cargo"><?php echo htmlspecialchars($fila["CARGO"],ENT_QUOTES,"UTF-8"); ?></td>
<td class="revista"><?php echo htmlspecialchars($fila["REVISTA"],ENT_QUOTES,"UTF-8"); ?></td>
<td class="cuil"><?php echo htmlspecialchars($fila["CUIL"],ENT_QUOTES,"UTF-8"); ?></td>
<td class="cupof"><?php echo htmlspecialchars($fila["CUPOF"],ENT_QUOTES,"UTF-8"); ?></td>
<td class="atenalu"><?php echo htmlspecialchars($fila["ATENALU"],ENT_QUOTES,"UTF-8"); ?></td>
<td class="presentismo <?php echo $presentismo==="SI"?"si":"no"; ?>"><?php echo $presentismo; ?></td>
<td class="observaciones <?php echo $presentismo==="NO"?"obs-no":""; ?>"><?php mostrarObservaciones($fila); ?></td></tr>
<?php } ?></tbody></table></div>
<div class="zona-botones"><form method="post">
<input type="hidden" name="fecha_desde" value="<?php echo htmlspecialchars($fecha_desde,ENT_QUOTES,"UTF-8"); ?>">
<input type="hidden" name="fecha_hasta" value="<?php echo htmlspecialchars($fecha_hasta,ENT_QUOTES,"UTF-8"); ?>">
<button type="submit" name="exportar_word" value="1" class="boton-word">PASAR A WORD</button></form>
<form method="post"><input type="hidden" name="fecha_desde" value="<?php echo htmlspecialchars($fecha_desde,ENT_QUOTES,"UTF-8"); ?>">
<input type="hidden" name="fecha_hasta" value="<?php echo htmlspecialchars($fecha_hasta,ENT_QUOTES,"UTF-8"); ?>">
<button type="submit" name="exportar_formato_oficial" value="1" class="boton-word boton-oficial">IMPRIMIR FORMATO OFICIAL EN WORD</button></form>
<button type="button" onclick="window.print()" class="boton-imprimir">IMPRIMIR LISTADO</button></div>
<?php } elseif ($_SERVER["REQUEST_METHOD"] === "POST" && $mensaje_error === "") { ?><div class="mensaje-error">No se encontraron registros de personal.</div><?php } ?>
</body></html>
<?php $conexion->close(); ?>
