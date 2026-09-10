$(document).ready(main); /*Cuando el documento este listo vamos a ejecutar la funcion main*/ 

var contador = 1;

function main(){
  $('.menu_bar').click(function(){

     $('nav').toggle(); /*aparece y desaparece el menu al hacer clic*/

  });    /*Cuando de un clic se active y pase algo*/ /*En este caso a la clase menu_bar*/

};