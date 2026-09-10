$(document).ready(main); /*Cuando el documento este listo vamos a ejecutar la funcion main*/ 

var contador = 1;

function main(){
  $('.menu_bar').click(function(){

     //$('nav').toggle(); /*aparece y desaparece el menu al hacer clic*/
  	if(contador == 1){ /* Si nuestro menú esta oculto*/
       $('nav').animate({
          left: '0'
       });
           contador = 0; /*Para que se oculte cuando vuelve a dar clic*/
  	} else {
  		contador = 1;  /*Para que se oculte cuando vuelve a dar clic*/
  		$('nav').animate({
          left: '-100%'
        });
  	}

  });    /*Cuando de un clic se active y pase algo*/ /*En este caso a la clase menu_bar*/

};