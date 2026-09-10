<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Persona</title>

    
</head>
<body>

    <h2>Buscar PERSONAL</h2>
	
	

    <div id="resultado"></div>
<input type="text" id="nombre" placeholder="Escriba un nombre..."> 
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
<p>

</p>
</form>
</body>
</html>