<?php

$conexion = new mysqli('localhost','u658525126_villahugoluis','Packing&&7614','u658525126_escuela');
                     //'localhost','u658525126_villahugoluis','Packing&&7614','u658525126_escuela'

if($conexion->connect_error){
    die("Error de conexión");
}

$nombre = $_POST['nombre'];

$sql = "SELECT * FROM alumnos_2026 WHERE AyN LIKE '%$nombre%'";

$resultado = $conexion->query($sql);

if($resultado->num_rows > 0){

    while($fila = $resultado->fetch_assoc()){

        echo "
		     
            <b>Nombre:</b> {$fila['AyN']} <br>
            <b>Telefono 1:</b> {$fila['telefono1']} <br>
			<b>Telefono 2:</b> {$fila['telefono2']} <br>
            <b>Grado:</b> {$fila['Grado']} <br>
			<b>Docente:</b> {$fila['docente']} <br>
			<b>DNI:</b> {$fila['DNI']} <br>
            <hr>
        ";
    }

}else{
    echo "Dato inexistente";
}

?>