

function causafalta(){
    var combo = document.getElementById("causa");  //causa = id de menu desplegable art y descrip.
    var selected = combo.options[combo.selectedIndex].text;

      artfalta.value = selected;

    var cod = document.getElementById("causa").value;  //obtiene un valor: un número...

    document.getElementById("artfalta").style.backgroundColor = '#FFFFFF'; // Fondo de Imput
    document.getElementById("artfalta").style.borderColor ='#C0C0C0';   // borde de Imput

}
