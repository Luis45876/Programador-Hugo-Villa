<?php

$id = $_GET['id'];
$nombre = $_GET['categoria'];
echo $id;
echo $nombre;
?>
<form action="guardar_falta_psg.php" method="post">

    <input type="hidden" name="id_personal" value="<?php echo $id; ?>">

    Desde:
    <input type="date" name="fecha_desde"><br><br>

    Hasta:
    <input type="date" name="fecha_hasta"><br><br>

    Motivo:
    <select name="motivo">

        <option value="">-- Seleccione un motivo --</option>

        <option value="ART. 59° - ENFERMEDAD DEL AGENTE">
            ART. 59° - ENFERMEDAD DEL AGENTE
        </option>

        <option value="ART. 6° - ENFERMEDAD DE LARGO TRATAMIENTO">
            ART. 61° - ENFERMEDAD DE LARGO TRATAMIENTO
        </option>

        <option value="ART. 47° - DONACIÓN DE SANGRE">
            ART. 47° - DONACIÓN DE SANGRE
        </option>

        <option value="ART. 60º - ACCIDENTE DE TRABAJO">
            ART. 60° - ACCIDENTE DE TRABAJO
        </option>

        <option value="ART. 67° - MATERNIDAD">
            ART. 67° - MATERNIDAD
        </option>

        <option value="ART. 69° - RAZONES PARTICULARES">
            ART. 69° - RAZONES PARTICULARES
        </option>

        <option value="ART. 71° - MATRIMONIO">
            ART. 71° - MATRIMONIO
        </option>

        <option value="ART. 73° - DUELO">
            ART. 73° - DUELO
        </option>

        <option value="ART. 74° - FAMILIAR ENFERMO">
            ART. 74° - FAMILIAR ENFERMO
        </option>

        <option value="ART. 75° - EXAMENES">
            ART. 75° - EXAMENES
        </option>

        <option value="ART. 80° - CITACIÓN POLICIAL O JUDICIAL">
            ART. 80° - CITACIÓN POLICIAL O JUDICIAL
        </option>

        <option value="PARO DE TRANSPORTE PÚBLICO">
            PARO DE TRANSPORTE PÚBLICO
        </option>

        <option value="LICENCIA POR ESTUDIOS GINECOLÓGICOS - Decreto 1082/24">
            LICENCIA POR ESTUDIOS GINECOLÓGICOS - Decreto 1082/24
        </option>
		
		<option value="Adh. Paro">
            Adh. Paro
        </option>
        
    </select>

    <br><br>

    Observaciones:
    <textarea name="observaciones"></textarea><br><br>

    <input type="submit" value="Guardar">

</form>