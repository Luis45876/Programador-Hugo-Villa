<html>
<head>
  <meta charset="utf-8">
  <title>Stackfindover: Sign in</title>
  <link rel="stylesheet" type="text/css" href="css/style_informe.css">
</head>

<body>
  
  <form method="POST" action="generar_informe.php">
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="http://blog.stackfindover.com/" rel="dofollow">Informe de Alumno</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Datos del Alumno</span>
              <form id="stripe-login">
                <div class="field padding-bottom--24">
                  <label>Apellido y Nombre del Alumno:</label>
                  <input type="text" name="nombre" placeholder="Apellido y Nombre">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label>Escuela</label>
                 </div>
                  
         <input type="text" name="Escuela" placeholder="Ingrese nombre escuela">
                </div>
                <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
        <!-- ///////// -->     
                         
                   <label>Docente</label>
                 </div>
                  <div class="field padding-bottom--24">
         <input type="text" name="docente" placeholder="Docente">
                </div>
                
        <!-- ///////// -->
                <!-- ///////// -->     
              <label>Fecha de Nacimiento del alumno/a</label>
             <div class="field padding-bottom--24">
         <input type="date" name="fecnac" placeholder="Docente">
                </div>
                
        <!-- ///////// -->
                <!-- ///////// -->     
                         
                   <label>Grado</label>
                
        <select name="grad" id="gra">
         <option value="1º">1º grado</option>
         <option value="2º">2º grado</option>
         <option value="3º">3º grado</option>
         <option value="4º">4º grado</option>
         <option value="5º">5º grado</option>
         <option value="6º">6º grado</option>
         <option value="7º">7º grado</option>
          
    </select>
                
        <!-- ///////// -->
        <!-- ////// FINAL -->
                <br><label>División:</label> 
      <select name="divi" id="div">
         <option value="A">"A"</option>
         <option value="B">"B"</option>
         <option value="C">"C"</option>
         <option value="D">"D"</option>
    </select>
    <br><label>Turno:</label> 
      <select name="turn" id="tur">
         <option value="Mañana">"Mañana"</option>
         <option value="Tarde">"Tarde"</option>
         <option value="Noche">"Noche"</option>
         <option value="J.Extendida">"Jornada Extendida"</option>
    </select>
    <br><label>Fecha Act:</label>
     <input type="date" name="Fechact" required>
     
     <br><label>1. AREA INTELECTO </label>
        <br><label>Memoria:</label><br>
      <input type="radio" name="memoria" value="MB" required> Muy Buena<br>

    <input type="radio" name="memoria" value="B"> Buena<br>

    <input type="radio" name="memoria" value="NOS">No Satisfactoria<br>

     
      <br><label>Atención:</label><br>
      <input type="radio" name="atencion" value="ade" required> Adecuada <br>
      <input type="radio" name="atencion" value="dis"> Dispersa <br>
    
      <br><label>Comprensión:</label><br>
      <input type="radio" name="comprension" value="rap" required>Rápida<br>
      <input type="radio" name="comprension" value="nor">Normal<br>
      <input type="radio" name="comprension" value="len">Lenta<br>
      <input type="radio" name="comprension" value="dif">Con Dificultad<br>
    
     <br><label>2. RENDIMIENTO </label><br>
        <input type="radio" name="rendimiento" value="MB" required> Muy Buena <br>
        <input type="radio" name="rendimiento" value="B"> Buena <br>
        <input type="radio" name="rendimiento" value="NOS"> No Satisfactoria <br>
       
    <br><label>3. PARTICIPACIÓN </label><br>
        <input type="radio" name="participacion" value="perm" required> Permanente <br>
        <input type="radio" name="participacion" value="oca"> Ocacional <br>
        <input type="radio" name="participacion" value="indif"> Indiferente <br>
       
    <br><label>4. RASGOS DE PERSONALIDAD </label><br>
        <input type="radio" name="personal" value="extro" required> Extrovertido <br>
        <input type="radio" name="personal" value="intro"> Introvertido <br>
        
     <br><label>5. MANIFESTACIÓN DE ACTITUDES EN EL AULA:</label><br>
      <input type="checkbox" name="colab" >Colaborador<br>
      <input type="checkbox" name="resp" >Respetuoso<br>
      <input type="checkbox" name="cuida" >Cuidadoso<br>
      <input type="checkbox" name="since" >Sincero<br>
      <input type="checkbox" name="const" >Constante<br>
      <input type="checkbox" name="esfo" >Esforzado<br>
      <input type="checkbox" name="espturn" >Espera su turno<br>
     
      <br><label>6. RELACIÓN CON LA COMUNIDAD ESCOLAR </label><br>
        <input type="radio" name="relacion" value="seintegra" required> Se integra facilmente <br>
        <input type="radio" name="relacion" value="noseintegra"> Le cuesta integrarse <br>
        <label>------------------------------</label><br>
        <!-- IMPONE SU VOLUNTAD -->
      <input type="radio" name="integracion" value="imponvolu" required> Impone su voluntad <br>
      <input type="radio" name="integracion" value="aceptaidea"> Acepta la idea de otros <br>
      <label>------------------------------</label><br>
      <!-- //////////////////////// ES RESPETUOSO CON LOS DOCENTES  -->
      <input type="radio" name="respcdocen" value="sirespeta" required> Es respetuoso con los docentes <br>
      <input type="radio" name="respcdocen" value="norespeta"> A veces no respeta a los docentes <br>
           <!-- /////////////////////// -->
         <label>------------------------------</label><br>
        <!-- Normas de convivencia -->
      <input type="radio" name="norconvi" value="sicumplenor" required> Cumple con las Normas de Convivencia <br>
      <input type="radio" name="norconvi" value="nocumplenor"> Le cuesta cumplir las Normas de Convivencia <br>
          <!--///////////////////////-->
          <!-- casilla de verificación -->
      <label>------------------------------</label><br>
      <input type="checkbox" name="trabasol" >Prefiere trabajar solo<br>
      <input type="checkbox" name="colaboraconpa" >Colabora con sus compañeros<br>
      <input type="checkbox" name="prestautiles" >Presta sus útiles, los comparte<br>
      <input type="checkbox" name="pideayuda" >Pide ayuda, cuando la necesita<br>
      <input type="checkbox" name="turnophablar" >Espera su turno para hablar<br>
      <input type="checkbox" name="esviolen" >Es algo violento o nervioso<br>
   
    <br><label>7. ENTORNO FAMILIAR </label><br>
        <input type="radio" name="familia" value="apoyoperman"> Brinda apoyo permanente <br>
        <input type="radio" name="familia" value="apoyonece"> Brinda apoyo necesario <br>
        <input type="radio" name="familia" value="apoyoescaso"> Escaso apoyo familiar <br>
        <input type="radio" name="familia" value="apoyoindife"> Indiferente <br>
       
       <label>8. OTROS DATOS DE INTERÉS </label><br>
          <input type="checkbox" name="pracdeport" >Práctica deportes<br>
          <input type="checkbox" name="idioma" >Estudia idiomas<br>
          <input type="checkbox" name="ayudaextraes" >Ayuda extraescolar<br>
          <input type="checkbox" name="grupoextraes" >Participa en grupos extraescolares<br>
  
     <br><label>9. RENDIMIENTO PEDAGÓGICO</label><br>  
      <p>Indicar como MB(Muy Bueno), B(Bueno), R(Regular), D(Dificultad), S/N(Sin Calificar)</p>
    <label>Lengua:</label> 
      <select name="leng" id="len" >
         <option value="MB">Muy Bueno</option>
         <option value="B">Bueno</option>
         <option value="R">Regular</option>
         <option value="D">Con Dificultad</option>
         <option selected="selected" value="S/N">Sin Calificar</option>
    </select>  
    <label>Matemática:</label> 
      <select name="mate" id="mat">
         <option value="MB">Muy Bueno</option>
         <option value="B">Bueno</option>
         <option value="R">Regular</option>
         <option value="D">Con Dificultad</option>
         <option selected="selected" value="S/N">Sin Calificar</option>
    </select> 
     <label>Cs. Naturales:</label> 
      <select name="natu" id="nat">
         <option value="MB">Muy Bueno</option>
         <option value="B">Bueno</option>
         <option value="R">Regular</option>
         <option value="D">Con Dificultad</option>
         <option selected="selected" value="S/N">Sin Calificar</option>
    </select> 
     <label>Cs. Sociales:</label> 
      <select name="soci" id="soc">
         <option value="MB">Muy Bueno</option>
         <option value="B">Bueno</option>
         <option value="R">Regular</option>
         <option value="D">Con Dificultad</option>
         <option selected="selected" value="S/N">Sin Calificar</option>
    </select> 
     <label>Ed. Artística:</label> 
      <select name="arte" id="art">
         <option value="MB">Muy Bueno</option>
         <option value="B">Bueno</option>
         <option value="R">Regular</option>
         <option value="D">Con Dificultad</option>
         <option selected="selected" value="S/N">Sin Calificar</option>
    </select> 
     <label>Ed. Física:</label> 
      <select name="fisi" id="fis">
         <option value="MB">Muy Bueno</option>
         <option value="B">Bueno</option>
         <option value="R">Regular</option>
         <option value="D">Con Dificultad</option>
         <option selected="selected" value="S/N">Sin Calificar</option>
    </select> 
     <label>Idioma Ext:</label> 
      <select name="idiom" id="idio">
         <option value="MB">Muy Bueno</option>
         <option value="B">Bueno</option>
         <option value="R">Regular</option>
         <option value="D">Con Dificultad</option>
         <option selected="selected" value="S/N">Sin Calificar</option>
    </select> 
     <label>Tecnología:</label> 
      <select name="tecn" id="tec">
         <option value="MB">Muy Bueno</option>
         <option value="B">Bueno</option>
         <option value="R">Regular</option>
         <option value="D">Con Dificultad</option>
         <option selected="selected" value="S/N">Sin Calificar</option>
    </select> 
     <label>Etica:</label> 
      <select name="etic" id="eti">
         <option value="MB">Muy Bueno</option>
         <option value="B">Bueno</option>
         <option value="R">Regular</option>
         <option value="D">Con Dificultad</option>
         <option selected="selected" value="S/N">Sin Calificar</option>
    </select> 
     <label>Ed. Digital:</label> 
      <select name="edudig" id="dig">
         <option value="MB">Muy Bueno</option>
         <option value="B">Bueno</option>
         <option value="R">Regular</option>
         <option value="D">Con Dificultad</option>
         <option selected="selected" value="S/N">Sin Calificar</option>
    </select> 
     <label>Otra:</label>
      <select name="otr" id="ot" >
         <option value="MB">Muy Bueno</option>
         <option value="B">Bueno</option>
         <option value="R">Regular</option>
         <option value="D">Con Dificultad</option>
         <option selected="selected" value="S/N">Sin Calificar</option>
    </select> 
    <input type="text" name="otra" placeholder="Escriba la otra materia"><br>
    
       <br><label>10. CONSIDERACIONES FINALES </label><br>
    <br>
   
<div class="small-textarea textarea">
   <textarea name="consulta" placeholder="Consideraciones Finales " rows=10>
   </textarea>   <!--rows=5 es la cantidad de lineas que quiero que se muestren-->
</div>   
     <br>
        <!--//// FINAL  -->
                </div>
                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="Continue">
                </div>
                <div class="field">
                  
                </div>
              </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span>Don't have an account? <a href="">Sign up</a></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <span><a href="#">© Stackfindover</a></span>
              <span><a href="#">Contact</a></span>
              <span><a href="#">Privacy & terms</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
</body>

</html>