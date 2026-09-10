<?php

// CONEXIÓN A LA BASE DE DATOS
//$conexion = new mysqli("localhost", "root", "", "escuela");
$conexion = new mysqli('localhost','u658525126_villahugoluis','Packing&&7614','u658525126_escuela');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// -----------------------------------------------------
// OBTENER LOS GRADOS DISPONIBLES
// -----------------------------------------------------

$sql_grados = "SELECT DISTINCT Grado 
               FROM alumnos_2026 
               ORDER BY Grado";

$resultado_grados = $conexion->query($sql_grados);


// -----------------------------------------------------
// COLUMNAS PERMITIDAS
// -----------------------------------------------------

$columnas_permitidas = [

    "Grado"     => "Grado",
    "AyN"       => "Apellido y Nombre",
    "Docente"   => "Docente",
    "Sexo"      => "Sexo",
    "Edad"      => "Edad",
    "Fech_Nac"  => "Fecha de Nacimiento",
    "Nac"       => "Nacionalidad",
    "Fech_Ins"  => "Fecha de Inscripción",
    "DNI"       => "DNI",
    "Domicilio" => "Domicilio",
    "Tutor"     => "Tutor",
    "Nac_Tutor" => "Nacionalidad Tutor",
    "Profesion" => "Profesión",
    "Lugar_Nac" => "Lugar de Nacimiento",
    "telefono1" => "Teléfono 1",
    "telefono2" => "Teléfono 2",
    "telefono3" => "Teléfono 3"

];

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <title>Consulta de alumnos por grado</title>
    
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 30px;
        }

        h2 {
            color: #024959;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        select {
            padding: 7px;
            font-size: 16px;
        }

        .columnas {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .columnas label {
            display: inline-block;
            width: 200px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #024959;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 15px;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #037a8c;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: white;
        }

        th {
            background-color: #024959;
            color: white;
            padding: 10px;
        }

        td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #eeeeee;
        }

        tr:hover {
            background-color: #d9edf7;
        }

        .cantidad {
            margin-top: 15px;
            font-size: 18px;
            font-weight: bold;
            color: #024959;
        }

    </style>
<link rel="stylesheet" href="css/estiloconsultaralumnos.css">
</head>

<body>


<h2>Consulta de alumnos por Grado</h2>


<form method="post">

    <strong>¿Qué grado desea mostrar?</strong>

    <br><br>

    <select name="grado" required>

        <option value="">-- Seleccionar Grado --</option>

        <?php

        while ($fila = $resultado_grados->fetch_assoc()) {

            $grado = $fila["Grado"];

            $seleccionado = "";

            if (isset($_POST["grado"]) && $_POST["grado"] == $grado) {
                $seleccionado = "selected";
            }

            echo "<option value='" . htmlspecialchars($grado) . "' $seleccionado>";

            echo htmlspecialchars($grado);

            echo "</option>";
        }

        ?>

    </select>


    <br><br>

    <strong>Seleccione las columnas que desea mostrar:</strong>


    <div class="columnas">

        <?php

        foreach ($columnas_permitidas as $campo => $titulo) {

            // COLUMNAS MARCADAS POR DEFECTO
            $marcado = "";

            if (
                $campo == "Grado" ||
                $campo == "AyN" ||
                $campo == "Docente"
            ) {

                $marcado = "checked";
            }


            // CONSERVAR SELECCIÓN DESPUÉS DE CONSULTAR

            if (isset($_POST["columnas"])) {

                if (in_array($campo, $_POST["columnas"])) {

                    $marcado = "checked";

                } else {

                    $marcado = "";

                }
            }

            ?>

            <label>

                <input
                    type="checkbox"
                    name="columnas[]"
                    value="<?php echo $campo; ?>"
                    <?php echo $marcado; ?>
                >

                <?php echo $titulo; ?>

            </label>

        <?php } ?>

    </div>


    <input type="submit" name="consultar" value="Mostrar alumnos">

</form>


<?php

// -----------------------------------------------------
// REALIZAR CONSULTA
// -----------------------------------------------------

if (isset($_POST["consultar"])) {

    $grado = $_POST["grado"];

    if (!isset($_POST["columnas"]) || count($_POST["columnas"]) == 0) {

        echo "<p style='color:red; font-weight:bold;'>";
        echo "Debe seleccionar por lo menos una columna.";
        echo "</p>";

    } else {

        $columnas_seleccionadas = $_POST["columnas"];

        $columnas_validas = [];

        foreach ($columnas_seleccionadas as $columna) {

            if (array_key_exists($columna, $columnas_permitidas)) {
                $columnas_validas[] = $columna;
            }
        }


        if (count($columnas_validas) > 0) {

            $lista_columnas = implode(", ", $columnas_validas);


            // -----------------------------------------------------
            // IMPORTANTE:
            // Agregamos AyN aunque el usuario no lo haya elegido,
            // porque lo necesitamos para el botón COPIAR.
            // -----------------------------------------------------

            $columnas_consulta = $columnas_validas;

            if (!in_array("AyN", $columnas_consulta)) {
                $columnas_consulta[] = "AyN";
            }

            $lista_consulta = implode(", ", $columnas_consulta);


            $sql = "SELECT $lista_consulta
                    FROM alumnos_2026
                    WHERE Grado = ?
                    ORDER BY AyN";


            $consulta = $conexion->prepare($sql);

            $consulta->bind_param("s", $grado);

            $consulta->execute();

            $resultado = $consulta->get_result();


            // Guardaremos aquí los alumnos para el botón copiar
            $nombres_para_copiar = [];

            ?>


            <div id="zonaImpresion">

                <h3>
                    Alumnos del grado:
                    <?php echo htmlspecialchars($grado); ?>
                </h3>


                <?php

                if ($resultado->num_rows > 0) {

                    ?>

                    <table id="tablaAlumnos">
                        <tr>

                            <?php

                            foreach ($columnas_validas as $columna) {

                                echo "<th>";

                                echo htmlspecialchars(
                                    $columnas_permitidas[$columna]
                                );

                                echo "</th>";
                            }

                            ?>

                        </tr>


                        <?php

                        while ($fila = $resultado->fetch_assoc()) {

                            // Guardamos AyN para copiar después
                            $nombres_para_copiar[] = $fila["AyN"];

                            echo "<tr>";

                            foreach ($columnas_validas as $columna) {

                                echo "<td>";

                                echo htmlspecialchars(
                                    $fila[$columna] ?? ""
                                );

                                echo "</td>";
                            }

                            echo "</tr>";
                        }

                        ?>

                    </table>


                    <div class="cantidad">

                        Total de alumnos del grado

                        <?php echo htmlspecialchars($grado); ?>:

                        <?php echo count($nombres_para_copiar); ?>

                    </div>


                    <?php

                } else {

                    echo "<p>No existen alumnos registrados para ese grado.</p>";
                }

                ?>

            </div>


            <?php

            // -----------------------------------------------------
            // CREAR TEXTO PARA COPIAR
            // -----------------------------------------------------

            $texto_nombres = implode("\n", $nombres_para_copiar);

            ?>


            <?php if (count($nombres_para_copiar) > 0) { ?>

                <div class="botones-resultados">

                    <button type="button"
                            onclick="imprimirListado()"
                            class="boton-imprimir">

                        🖨 Imprimir listado

                    </button>


                    <button type="button"
                            onclick="copiarNombres()"
                            class="boton-copiar">

                        📋 Copiar Apellido y Nombre

                    </button>

                    <button type="button"
                            onclick="copiarTablaCompleta()"
                            class="boton-tabla">
                        📑 Copiar tabla completa
                    </button>

                </div>

                                <div id="mensajeCopiado"></div>


                <!--
                Este textarea está oculto.
                Contiene solamente los nombres de los alumnos.
                -->

                <textarea
                    id="listaNombres"
                    style="position:absolute; left:-9999px;"
                ><?php echo htmlspecialchars($texto_nombres); ?></textarea>
              
            <?php } ?>


            <?php

            $consulta->close();
        }
    }
}

?>
<!-- javascript -->

<script>
// =====================================================
// COPIAR TABLA COMPLETA
// =====================================================

function copiarTablaCompleta() {

    const tabla =
        document.getElementById("tablaAlumnos");

    if (!tabla) {

        alert("No se encontró la tabla de alumnos.");

        return;
    }


    let texto = "";


    for (let i = 0; i < tabla.rows.length; i++) {

        let fila = tabla.rows[i];

        let datosFila = [];


        for (let j = 0; j < fila.cells.length; j++) {

            let dato =
                fila.cells[j].innerText.trim();

            datosFila.push(dato);

        }


        texto += datosFila.join("\t") + "\n";

    }



    // COPIAR AL PORTAPAPELES

    if (navigator.clipboard && window.isSecureContext) {

        navigator.clipboard.writeText(texto)

        .then(function() {

            mostrarMensaje(
                "✓ Tabla completa copiada correctamente."
            );

        })

        .catch(function() {

            copiarTablaAlternativo(texto);

        });

    } else {

        copiarTablaAlternativo(texto);

    }

}



// =====================================================
// MÉTODO ALTERNATIVO
// =====================================================

function copiarTablaAlternativo(texto) {

    const textarea =
        document.createElement("textarea");

    textarea.value = texto;

    textarea.style.position = "fixed";
    textarea.style.left = "-9999px";

    document.body.appendChild(textarea);

    textarea.focus();
    textarea.select();


    const copiado =
        document.execCommand("copy");


    document.body.removeChild(textarea);


    if (copiado) {

        mostrarMensaje(
            "✓ Tabla completa copiada correctamente."
        );

    } else {

        mostrarMensaje(
            "No se pudo copiar la tabla."
        );

    }

}



// =====================================================
// MOSTRAR MENSAJES
// =====================================================

function mostrarMensaje(texto) {

    const mensaje =
        document.getElementById("mensajeCopiado");

    if (mensaje) {

        mensaje.innerHTML = texto;

        mensaje.style.color = "green";
        mensaje.style.fontWeight = "bold";
        mensaje.style.fontSize = "16px";
        mensaje.style.marginTop = "12px";

		setTimeout(function() {

            mensaje.innerHTML = "";

        }, 3000);
		
    }

}
// =====================================================
// COPIAR APELLIDO Y NOMBRE
// =====================================================

function copiarNombres() {

    const textarea = document.getElementById("listaNombres");

    const texto = textarea.value;


    // Forma moderna de copiar al portapapeles
    navigator.clipboard.writeText(texto)

    .then(function() {

        const mensaje = document.getElementById("mensajeCopiado");

        mensaje.innerHTML =
            "✓ Apellidos y nombres copiados correctamente.";

        mensaje.style.color = "green";
        mensaje.style.fontWeight = "bold";

    })

    .catch(function() {

        // Método alternativo por compatibilidad

        textarea.style.position = "fixed";
        textarea.style.left = "0";

        textarea.select();

        document.execCommand("copy");

        textarea.style.position = "absolute";
        textarea.style.left = "-9999px";

        const mensaje = document.getElementById("mensajeCopiado");

        mensaje.innerHTML =
            "✓ Apellidos y nombres copiados correctamente.";

        mensaje.style.color = "green";
        mensaje.style.fontWeight = "bold";

    });

}



// =====================================================
// IMPRIMIR LISTADO
// =====================================================

function imprimirListado() {

    const contenido =
        document.getElementById("zonaImpresion").innerHTML;


    const ventana =
        window.open("", "", "width=1000,height=700");


    ventana.document.write(`
        <html>

        <head>

            <title>Listado de alumnos</title>

            <style>

                body {
                    font-family: Arial, sans-serif;
                    margin: 30px;
                }

                h3 {
                    text-align: center;
                    font-size: 22px;
                    margin-bottom: 25px;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                }

                th {
                    border: 1px solid black;
                    padding: 8px;
                    background-color: #eeeeee;
                }

                td {
                    border: 1px solid black;
                    padding: 7px;
                }

                .cantidad {
                    margin-top: 20px;
                    font-weight: bold;
                    font-size: 17px;
                }

            </style>

        </head>

        <body>

            ${contenido}

        </body>

        </html>
    `);


    ventana.document.close();

    ventana.focus();

    ventana.print();

    ventana.close();

}

</script>
<!-- fin javascript empieza en la linea 467 -->
  
</body>

</html>