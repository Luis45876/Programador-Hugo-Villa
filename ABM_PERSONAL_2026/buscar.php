<?php

$conexion = new mysqli('localhost','u658525126_villahugoluis','Packing&&7614','u658525126_escuela');

if($conexion->connect_error){
    die("Error de conexión");
}

$nombre = $_POST['nombre'];

$sql = "SELECT * FROM personal_2026 WHERE AYN LIKE '%$nombre%'";

$resultado = $conexion->query($sql);// <a href='editar.php?id va a la pagina editar.php

if($resultado->num_rows > 0){

    while($fila = $resultado->fetch_assoc()){

        echo "
        <div style='padding:10px; border:1px solid #ccc; margin:5px;'>

            <a href='editar.php?id={$fila['id']}' style='text-decoration:none; color:black;'> 

                <b>Nombre:</b> {$fila['AYN']} <br>
                <b>Cupof:</b> {$fila['CUPOF']} <br>
                <b>Cargo:</b> {$fila['CARGO']} <br>
                <b>Grado:</b> {$fila['GYD']} <br>

            </a>

        </div>
        ";
    }

}else{
    echo "Dato inexistente";
}
?>