
function licenojust(){

var combo = document.getElementById("justificar");  //opción de justificar o licencia (Justificar=Id de combo)
var selected = combo.options[combo.selectedIndex].text;
//alert(selected);

eleccion.value = selected;  //elección = Id del Imput solicita se le

var cod = document.getElementById("justificar").value;  //obtiene un valor: un número...

if(cod==14){  //si eligió "Otra"
eleccion.value = "";

document.getElementById("eleccion").removeAttribute("readonly");   // elimina el atributo readonly para que se pueda escribir...
var atributo = document.getElementById("eleccion");  //elección = Id del Imput solicita se le
atributo.setAttribute("placeholder","Escriba otra razón ");  //modifica o agrega el atributo  placeholder=" mensaje al usuario "
}
//poner blanco el fondo de los input y negro los bordes... despues de validar
document.getElementById("eleccion").style.backgroundColor = '#FFFFFF'; // Fondo de Imput
document.getElementById("eleccion").style.borderColor ='#C0C0C0';   // borde de Imput
}

function causafalta(){

var combo = document.getElementById("causa");  //causa = id de menu desplegable art y descrip.
var selected = combo.options[combo.selectedIndex].text;
//artfalta.value = selected;  //artfalta = Id del input Por Artículo...
//artfalta.value = 'PUTAS';
artfalta.value = selected;


var cod = document.getElementById("causa").value;  //obtiene un valor: un número...
//alert(cod);
if(selected == "OTRA"){  //si eligió "Otra"
//artfalta.value = ""; document.getElementById("causa").value;
artfalta.value = "" ;

document.getElementById("artfalta").removeAttribute("readonly");   // elimina el atributo readonly para que se pueda escribir...
var atributo = document.getElementById("artfalta");
atributo.setAttribute("placeholder","Escriba el Artículo o la causa");  //modifica o agrega el atributo  placeholder=" mensaje al usuario "
}
/////////////////////////////////////CUANDO LA LICENCIA NO TIENE ARTICULO se cambia el LEVEL ////////////////////////////////////
if(selected == "PARO DE TRANSPORTE PÚBLICO"||selected == "LICENCIA POR ESTUDIOS GINECOLOGICOS - Decreto 1082/24"||selected == "LICENCIA POR VIOLENCIA DE GÉNERO - Resol.2255/22"){  
//artfalta.value = ""; document.getElementById("causa").value;
document.getElementById('miLabel').innerText = 'SIN Artículo'; 
//// cambia el color
    const articulo = document.getElementById('miLabel');
    // Cambia el color a rojo
    articulo.style.color = 'red';
}else {
    document.getElementById('miLabel').innerText = 'Por art:'; 
//// cambia el color
    const articulo = document.getElementById('miLabel');
    // Cambia el color a rojo
    articulo.style.color = 'black';  /// VUELVE LA NORMAL SI NO SE ELIJE CUALQUIERA DE ESOS TRES ARTICULOS
  }
////////////////////////FIN CUANDO LA LICENCIA NO TIENE ARTÍCULO /////////////////////

//poner blanco el fondo de los input y negro los bordes... despues de validar
document.getElementById("artfalta").style.backgroundColor = '#FFFFFF'; // Fondo de Imput
document.getElementById("artfalta").style.borderColor ='#C0C0C0';   // borde de Imput

}
