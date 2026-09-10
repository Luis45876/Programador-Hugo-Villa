<?php

$conexion = new mysqli("localhost", "u658525126_villahugoluis", "Packing&&7614", "u658525126_escuela");

?>

<!DOCTYPE html>
<html>

<head>

    <title>Consultar Faltas</title>

    <style>

        /* ---------------------------------
           ESTILO GENERAL DE LA TABLA
        --------------------------------- */

        table {
            border-collapse: collapse;
        }

        th {
            background-color: #eeeeee;
        }

        td, th {
            padding: 6px;
        }


        /* ---------------------------------
           FILA RESALTADA
        --------------------------------- */

        .fila-resaltada td {
            background-color: var(--color-fondo);
            color: var(--color-texto);
            font-weight: bold;
        }


        /* ---------------------------------
           BOTON RESALTAR
        --------------------------------- */

        .boton-resaltar {

            background-color: #0275d8;
            color: white;

            border: none;

            padding: 10px 18px;

            cursor: pointer;

            border-radius: 5px;

            font-weight: bold;

        }

        .boton-resaltar:hover {
            background-color: #025aa5;
        }


        /* ---------------------------------
           TOTAL DEL ARTICULO
        --------------------------------- */

        #resultadoArticulo {

            margin-top: 15px;

            font-size: 18px;

            font-weight: bold;

        }

    </style>


    <script>

        function resaltarArticulo() {

            // Obtener artículo seleccionado
            let articuloSeleccionado =
                document.getElementById("articuloResaltar").value;

            // Obtener color seleccionado
            let colorSeleccionado =
                document.getElementById("colorResaltar").value;


            // Obtener todas las filas de faltas
            let filas =
                document.querySelectorAll(".fila-falta");


            // Variables para calcular totales
            let totalDias = 0;
            let cantidadFaltas = 0;


            // Recorrer todas las filas
            filas.forEach(function(fila) {

                // Quitar resaltado anterior
                fila.classList.remove("fila-resaltada");

                fila.style.removeProperty("--color-fondo");
                fila.style.removeProperty("--color-texto");


                // Obtener artículo de la fila
                let articulo =
                    fila.getAttribute("data-articulo");


                // Obtener días
                let dias =
                    parseFloat(fila.getAttribute("data-dias"));


                // Comparar artículo
                if (articulo === articuloSeleccionado) {

                    // Resaltar fila
                    fila.classList.add("fila-resaltada");


                    // Aplicar colores
                    fila.style.setProperty(
                        "--color-fondo",
                        colorSeleccionado + "30"
                    );

                    fila.style.setProperty(
                        "--color-texto",
                        colorSeleccionado
                    );


                    // Acumular cantidad
                    cantidadFaltas++;


                    // Acumular días
                    totalDias += dias;

                }

            });


            // Mostrar resultado
            let resultado =
                document.getElementById("resultadoArticulo");


            if (articuloSeleccionado !== "") {

                resultado.style.color = colorSeleccionado;

                resultado.innerHTML =
                    "Artículo seleccionado: " +
                    articuloSeleccionado +
                    "<br>" +

                    "Cantidad de faltas: " +
                    cantidadFaltas +
                    "<br>" +

                    "Total de días: " +
                    totalDias;

            } else {

                resultado.innerHTML = "";

            }

        }

    </script>

</head>


<body>


<h2>Consultar Faltas por Período</h2>


<form method="post">

    Empleado:

    <select name="id_personal">

        <?php

        $sql =
            "SELECT id, AYN
             FROM personal_2026
             ORDER BY AYN";

        $resultado =
            $conexion->query($sql);


        while($fila = $resultado->fetch_assoc()){

            echo
                "<option value='".$fila['id']."'>".
                $fila['AYN'].
                "</option>";

        }

        ?>

    </select>


    <br><br>


    Desde:

    <input
        type="date"
        name="fecha_desde"
    >


    Hasta:

    <input
        type="date"
        name="fecha_hasta"
    >


    <br><br>


    <input
        type="submit"
        value="Buscar"
    >

</form>



<?php


if(isset($_POST['id_personal'])){


    $id_personal =
        $_POST['id_personal'];

    $desde =
        $_POST['fecha_desde'];

    $hasta =
        $_POST['fecha_hasta'];



    /* ---------------------------------
       BUSCAR EMPLEADO
    --------------------------------- */

    $sqlEmpleado = "

        SELECT AYN

        FROM personal_2026

        WHERE id = $id_personal

    ";


    $resEmpleado =
        $conexion->query($sqlEmpleado);


    $empleado =
        $resEmpleado->fetch_assoc();


    $nombreEmpleado =
        $empleado['AYN'];



    /* ---------------------------------
       BUSCAR FALTAS
    --------------------------------- */

    $sql = "

        SELECT *

        FROM faltas

        WHERE id_personal = $id_personal

        AND fecha_desde <= '$hasta'

        AND fecha_hasta >= '$desde'

        ORDER BY fecha_desde

    ";


    $resultado =
        $conexion->query($sql);



    echo
        "<h3>Faltas de: ".
        htmlspecialchars($nombreEmpleado).
        "</h3>";


    echo "

        <p>

            <b>Período:</b>

            ".date(
                'd/m/Y',
                strtotime($desde)
            )."

            al

            ".date(
                'd/m/Y',
                strtotime($hasta)
            )."

        </p>

    ";



    if($resultado->num_rows > 0){


        /* ---------------------------------
           TABLA
        --------------------------------- */

        echo "

        <table border='1'>

            <tr>

                <th>Desde</th>

                <th>Hasta</th>

                <th>Artículo</th>

                <th>Observaciones</th>

                <th>Días del período</th>

            </tr>

        ";


        $total_dias = 0;


        while($fila =
            $resultado->fetch_assoc()){


            /* ---------------------------------
               CALCULAR DÍAS
            --------------------------------- */

            $inicio_falta =
                strtotime(
                    $fila['fecha_desde']
                );


            $fin_falta =
                strtotime(
                    $fila['fecha_hasta']
                );


            $inicio_periodo =
                strtotime($desde);


            $fin_periodo =
                strtotime($hasta);


            /*
             * Tomar solamente la parte
             * de la falta que está dentro
             * del período consultado.
             */

            $inicio_real =
                max(
                    $inicio_falta,
                    $inicio_periodo
                );


            $fin_real =
                min(
                    $fin_falta,
                    $fin_periodo
                );


            $dias =
                ($fin_real - $inicio_real)
                / 86400 + 1;


            $total_dias += $dias;



            /* ---------------------------------
               ARTÍCULO
            --------------------------------- */

            $articulo =
                trim($fila['articulo']);


            $articuloHTML =
                htmlspecialchars(
                    $articulo,
                    ENT_QUOTES,
                    'UTF-8'
                );


            $observacionesHTML =
                htmlspecialchars(
                    $fila['observaciones'],
                    ENT_QUOTES,
                    'UTF-8'
                );



            /* ---------------------------------
               GENERAR FILA
            --------------------------------- */

            echo "

            <tr

                class='fila-falta'

                data-articulo='$articuloHTML'

                data-dias='$dias'

            >

                <td>
                    {$fila['fecha_desde']}
                </td>

                <td>
                    {$fila['fecha_hasta']}
                </td>

                <td>
                    $articuloHTML
                </td>

                <td>
                    $observacionesHTML
                </td>

                <td>
                    $dias
                </td>

            </tr>

            ";

        }


        echo "</table>";



        /* ---------------------------------
           TOTAL GENERAL
        --------------------------------- */

        echo "

        <br>

        <b>
            Total general de días faltados:
            $total_dias
        </b>

        ";



        /* =================================
           SELECTOR DE ARTÍCULOS
        ================================= */

        echo "

        <hr>

        <h3>Resaltar artículo</h3>


        <label>

            Artículo:

        </label>


        <select id='articuloResaltar'>

            <option value=''>
                -- Seleccione un artículo --
            </option>

        ";


        /*
         * Volvemos a recorrer los resultados
         * para obtener los artículos únicos.
         *
         * Como el resultado ya fue recorrido,
         * hacemos una nueva consulta.
         */

        $sqlArticulos = "

            SELECT DISTINCT articulo

            FROM faltas

            WHERE id_personal = $id_personal

            AND fecha_desde <= '$hasta'

            AND fecha_hasta >= '$desde'

            ORDER BY articulo

        ";


        $resArticulos =
            $conexion->query($sqlArticulos);


        while($art =
            $resArticulos->fetch_assoc()){


            $articulo =
                trim($art['articulo']);


            $articuloHTML =
                htmlspecialchars(
                    $articulo,
                    ENT_QUOTES,
                    'UTF-8'
                );


            echo "

                <option value='$articuloHTML'>

                    $articuloHTML

                </option>

            ";

        }


        echo "

        </select>


        &nbsp;&nbsp;


        <label>

            Color:

        </label>


        <select id='colorResaltar'>

            <option value='red'>
                Rojo
            </option>

            <option value='blue'>
                Azul
            </option>

            <option value='green'>
                Verde
            </option>

            <option value='orange'>
                Naranja
            </option>

            <option value='purple'>
                Violeta
            </option>

        </select>


        &nbsp;&nbsp;


        <button

            type='button'

            class='boton-resaltar'

            onclick='resaltarArticulo()'

        >

            Resaltar

        </button>


        <div id='resultadoArticulo'></div>

        ";

    }


    else {


        echo
            "No se encontraron faltas en ese período.";

    }
	echo "<br>";
echo "<a href='https://sistemasvilla.com.ar/'>Volver Menu Principal</a>";
}


?>

</body>

</html>