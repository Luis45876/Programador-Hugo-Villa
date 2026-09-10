<?php

$id = $_GET['id'];
$nombre = $_GET['categoria'];
echo $id;
echo $nombre;
?>
<form action="guardar_falta.php" method="post">

    <input type="hidden" name="id_personal" value="<?php echo $id; ?>">

    Desde:
    <input type="date" name="fecha_desde"><br><br>

    Hasta:
    <input type="date" name="fecha_hasta"><br><br>

    Motivo:
    <select name="motivo">

        <option value="">-- Seleccione un motivo --</option>

        <option value="ART. 5° - ENFERMEDAD DEL AGENTE">
            ART. 5° - ENFERMEDAD DEL AGENTE
        </option>

        <option value="ART. 6° - ENFERMEDAD DE LARGO TRATAMIENTO O LESIÓN GRAVE">
            ART. 6° - ENFERMEDAD DE LARGO TRATAMIENTO O LESIÓN GRAVE
        </option>

        <option value="ART. 8° - ENFERMEDAD OCUPACIONAL O ACCIDENTE DE TRABAJO">
            ART. 8° - ENFERMEDAD OCUPACIONAL O ACCIDENTE DE TRABAJO
        </option>

        <option value="ART. 9° - ENFERMEDAD PROFESIONAL">
            ART. 9° - ENFERMEDAD PROFESIONAL
        </option>

        <option value="ART. 10° - PROFILAXIS Y SEGURIDAD">
            ART. 10° - PROFILAXIS Y SEGURIDAD
        </option>

        <option value="ART. 12° - GRAVIDEZ Y MATERNIDAD">
            ART. 12° - GRAVIDEZ Y MATERNIDAD
        </option>

        <option value="ART. 14° - ADOPCIÓN">
            ART. 14° - ADOPCIÓN
        </option>

        <option value="ART. 15° - ASUNTOS PARTICULARES">
            ART. 15° - ASUNTOS PARTICULARES
        </option>

        <option value="ART. 17° - ASUNTOS PARTICULARES - NO REMUNERADA">
            ART. 17° - ASUNTOS PARTICULARES - NO REMUNERADA
        </option>

        <option value="ART. 19° - ESTUDIO Y PERFECCIONAMIENTO DOCENTE">
            ART. 19° - ESTUDIO Y PERFECCIONAMIENTO DOCENTE
        </option>

        <option value="ART. 21° - REPRESENTACIÓN CULTURAL Y DEPORTIVA">
            ART. 21° - REPRESENTACIÓN CULTURAL Y DEPORTIVA
        </option>

        <option value="ART. 22° - REPRESENTACIÓN GREMIAL O DOCENTE">
            ART. 22° - REPRESENTACIÓN GREMIAL O DOCENTE
        </option>

        <option value="ART. 23° - DESEMPEÑO DE CARGO ELECTIVO O REPRESENTACIÓN POLÍTICA">
            ART. 23° - DESEMPEÑO DE CARGO ELECTIVO O REPRESENTACIÓN POLÍTICA
        </option>

        <option value="ART. 24° - MATRIMONIO">
            ART. 24° - MATRIMONIO
        </option>

        <option value="ART. 27° - EXÁMENES">
            ART. 27° - EXÁMENES
        </option>

        <option value="ART. 28° - PARTICIPACIÓN EN CONCURSO DE OPOSICIÓN">
            ART. 28° - PARTICIPACIÓN EN CONCURSO DE OPOSICIÓN
        </option>

        <option value="ART. 29° - ENFERMEDAD DE UN MIEMBRO DEL GRUPO FAMILIAR">
            ART. 29° - ATENCIÓN DE FAMILIAR
        </option>

        <option value="ART. 30° - COMISIÓN DE SERVICIOS">
            ART. 30° - COMISIÓN DE SERVICIOS
        </option>

        <option value="ART. 32° - DESEMPEÑO EN CARGOS EN NIVEL MEDIO O TERCIARIO">
            ART. 32° - DESEMPEÑO EN CARGOS EN NIVEL MEDIO O TERCIARIO
        </option>

        <option value="ART. 33° - CITACIÓN JUDICIAL O POLICIAL">
            ART. 33° - CITACIÓN JUDICIAL O POLICIAL
        </option>

        <option value="ART. 34° - INTRANSITABILIDAD">
            ART. 34° - INTRANSITABILIDAD
        </option>

        <option value="ART. 36° - NACIMIENTO DE HIJOS">
            ART. 36° - NACIMIENTO DE HIJOS
        </option>

        <option value="ART. 37° - DUELO">
            ART. 37° - DUELO
        </option>

        <option value="ART. 38° - DONACIÓN DE SANGRE">
            ART. 38° - DONACIÓN DE SANGRE
        </option>

        <option value="ART. 39° - LACTANCIA">
            ART. 39° - LACTANCIA
        </option>

        <option value="ART. 40° - MATRIMONIO DE HIJOS Y HERMANOS">
            ART. 40° - MATRIMONIO DE HIJOS Y HERMANOS
        </option>

        <option value="ART. 41° - ACOMPAÑAMIENTO DE ALUMNOS A EXCURSIONES Y VIAJES">
            ART. 41° - ACOMPAÑAMIENTO DE ALUMNOS A EXCURSIONES Y VIAJES
        </option>

        <option value="PARO DE TRANSPORTE PÚBLICO">
            PARO DE TRANSPORTE PÚBLICO
        </option>

        <option value="LICENCIA POR ESTUDIOS GINECOLÓGICOS - Decreto 1082/24">
            LICENCIA POR ESTUDIOS GINECOLÓGICOS - Decreto 1082/24
        </option>
        
        <option value="ART.15°-1/2 PARTICULAR">
            ART.15°-1/2 PARTICULAR
        </option>
        
        <option value="INJUSTIFICADA">
            INJUSTIFICADA
        </option>
        
        <option value="Adh. Paro">
            Adh. Paro
        </option>
        
        <option value="ART. 50° - CASOS NO CONTEMPLADOS">
            ART. 50° - CASOS NO CONTEMPLADOS
        </option>
        
        <option value="OTRA">
            OTRA
        </option>

    </select>

    <br><br>

    Observaciones:
    <textarea name="observaciones"></textarea><br><br>

    <input type="submit" value="Guardar">

</form>