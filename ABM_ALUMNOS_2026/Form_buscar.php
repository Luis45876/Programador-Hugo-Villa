<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Persona</title>

    
</head>
<body>

    <h2>Buscar Alumno</h2>

    <input type="text" id="nombre" placeholder="Escriba un nombre...">

    <div id="resultado"></div>

    <script>
        const inputNombre = document.getElementById("nombre");

        inputNombre.addEventListener("keyup", function(){

            let nombre = inputNombre.value;

            let xhr = new XMLHttpRequest();

            xhr.open("POST", "buscar.php", true);

            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onload = function(){
                if(this.status == 200){
                    document.getElementById("resultado").innerHTML = this.responseText;
                }
            }

            xhr.send("nombre=" + nombre);

        });
    </script>

</body>
</html>