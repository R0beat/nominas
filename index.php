<?php
	include 'global.php'; //Incluimos la conexion

         if(!isset($_SESSION["email"]) ){ //Verificamos que la variable de sesión no este vacia
                 echo '<script> alert("Usuario en Linea");</script>';

               }
               session_cache_expire(1);//Devuelve la caducidad de la caché actual
               $cache_expire = session_cache_expire();

               //iniciar la sesión 

               session_start();
               $email = $_SESSION["email"];
               $empresa =$_SESSION["empresa"];
               include 'head.php'; //Incluimos los archivos complementaros del HTML
               include 'header.php';

               $contenido = ""; //Declaramos  la variable que se encargara de mostrar el contenido de la pagina
               $nominas = "SELECT * FROM conceptosnomina  WHERE idconcepto = 1"; //Consulta de la tabla 'conceptosnomina'
               $result=$db->query($nominas); //Almacenamos ne la variable $result pasandole la varvable de conexion para ejecutar la consulta 
               $row = $result -> fetch_assoc();
               $q= "SELECT * FROM rutinas ";//Elaboré una tabla en donde se almacenan las rutinas
               //Elaboré una tabla de codigos
               $s=" SELECT * FROM codigossat WHERE codigo_sat LIKE '%p%' UNION SELECT * FROM codigossat WHERE codigo_sat LIKE '%d%' ";
               $rutina=$db->query($q);
               $sat=$db->query($s);
               ?>
               <section class="container">
                  <?php 
                     echo "Las páginas de sesión examinadas caducan después de $cache_expire minutos";    
                     if ($result->num_rows > 0) { //Si encuentra una coicidencia en la consulta nos mostrar el contenido de la paginas
                           $contenido.="
                                    <div class='row justify-content-center h-100 mt-4 contorno'>
                                       <form class='jumbotron  col-md-10' action='editarConceptosNom.php' method='POST'>
                                          <h1 id='EncabezadoTitulo'></h1>
                                          <div class='form-group has-succes'>
                                             <label for='nombrecompleto'>Nombre Completo</label>
                                             <input type='' class='form-control' name='nombrecompleto' id='nombrecompleto' value='".$row['nombreconcepto']."'>
                                          </div>
                                          <div class='form-group'>
                                             <label for='nombrecorto'>Nombre Corto</label>
                                             <input type='' class='form-control' name='nombrecorto' id='nombrecorto' value='".$row['nombrecorto']."'>
                                          </div>
                                          <div class='form-group'>
                                             <label for=''>Tipo</label>
                                          </div>
                                          <div class='form-group form-check'>
                                          ";
                           if ($row['tipo'] == 'Percepción'){ //Dependiendo del valor del radio nos seleccionará un radio en especifico
                           $contenido.="
                                          <div class='row'>
                                             <div class='col-md-3 form-check form-check-inline custom-control custom-radio'>
                                                <input type='radio' id='percepcion' value='Percepción' name='tipo' class='custom-control-input' checked>
                                                <label class='custom-control-label' for='percepcion'>Percepción</label>
                                             </div>
                                             <div class='col-md-3 form-check form-check-inline custom-control custom-radio'>
                                                <input type='radio' id='deduccion' name='tipo' class='custom-control-input'>
                                                               <label class='custom-control-label' for='deduccion'>Deducción</label>
                                             </div>
                                          </div>";
                           } 
                           else{
                           $contenido.="
                                          <div class='row'>
                                             <div class='col-md-3 form-check form-check-inline custom-control custom-radio'>
                                                <input type='radio' id='percepcion' value='Deducción' name='tipo' class='custom-control-input' >
                                                <label class='custom-control-label' for='percepcion'>Percepción</label>
                                             </div>
                                             <div class='col-md-3 form-check form-check-inline custom-control custom-radio'>
                                                <input type='radio' id='deduccion' name='tipo' class='custom-control-input' checked>
                                                <label class='custom-control-label' for='deduccion'>Deducción</label>
                                             </div>
                                          </div>";
                              } 
                           $contenido.="              
                                          </div>
                                          <div class='form-group'>
                                             <label for=''>Código Concepto</label>
                                          </div>
                                          <div class='form-group'>
                                             <select class='form-control custom-select' name='codigo' id='codigo_sat'>";
                                             //Mostraremos el contenido de la tabla codigossat
                                                while($fila = $sat->fetch_assoc()){
                                                   //si el valor codigosat de la tabla conceptosnomina = al valor nameconcepto de la tabla codigossat nos seleccionara el valorr guardado en la base de datos 
                                                   if( $row['codigosat'] == $fila['codigo_sat']){
                                                      $contenido.="<option value='".$fila['codigo_sat']."' selected>".$fila['nameconcepto']."</option>";
                                                   }
                                                   else {
                                                      $contenido.="<option value='".$fila['codigo_sat']."'> ".$fila['nameconcepto']."</option>";
                                                   }
                                                }
                           $contenido.="
                                             </select>
                                          </div>
                                          <div class='form-group form-check'>
                                             <div class='row'>"; //Dependiendo del valor del radio nos seleccionará un radio en especifico
                                                   if ($row['tipoproceso'] == 'Por Captura') {
                                                      $contenido.="
                                                         <div class='col-md-3 form-check form-check-inline custom-control custom-radio'>
                                                            <input type='radio' id='captura' value='Por Captura' name='tipoproceso' class='custom-control-input' checked>
                                                            <label class='custom-control-label' for='captura'>Por Captura</label>
                                                         </div>
                                                         <div class='col-md-3 form-check form-check-inline custom-control custom-radio'>
                                                            <input type='radio' id='rutinacalculo' value='Rutina de Cálculo' name='tipoproceso' class='custom-control-input'>
                                                            <label class='custom-control-label' for='rutinacalculo'>Rutina de Cálculo</label>
                                                         </div>
                                                         <div class='col-md-3 form-check form-check-inline custom-control custom-radio'>
                                                            <input type='radio' id='programado' value='Programado' name='tipoproceso' class='custom-control-input'>
                                                            <label class='custom-control-label' for='programado'>Programado</label>
                                                         </div>";
                                                   }
                                                   else if ($row['tipoproceso'] == 'Rutina de Cálculo') {
                                                      $contenido.="
                                                         <div class='col-md-3 form-check form-check-inline custom-control custom-radio'>
                                                            <input type='radio' id='captura' value='Por Captura' name='tipoproceso' class='custom-control-input' >
                                                            <label class='custom-control-label' for='captura'>Por Captura</label>
                                                         </div>
                                                         <div class='col-md-3 form-check form-check-inline custom-control custom-radio'>
                                                            <input type='radio' id='rutinacalculo' value='Rutina de Cálculo' name='tipoproceso' class='custom-control-input' checked>
                                                            <label class='custom-control-label' for='rutinacalculo'>Rutina de Cálculo</label>
                                                         </div>
                                                         <div class='col-md-3 form-check form-check-inlpine custom-control custom-radio'>
                                                            <input type='radio' id='programado' value='Programado' name='tipoproceso' class='custom-control-input'>
                                                            <label class='custom-control-label' for='programado'>Programado</label>
                                                         </div>";
                                                   }
                                                   else{
                                                      $contenido.="
                                                         <div class='col-md-3 form-check form-check-inline custom-control custom-radio'>
                                                            <input type='radio' id='captura' value='Por Captura' name='tipoproceso' class='custom-control-input' >
                                                            <label class='custom-control-label' for='captura'>Por Captura</label>
                                                         </div>
                                                         <div class='col-md-3 form-check form-check-inline custom-control custom-radio'>
                                                            <input type='radio' id='rutinacalculo' value='Rutina de Cálculo' name='tipoproceso' class='custom-control-input' >
                                                            <label class='custom-control-label' for='rutinacalculo'>Rutina de Cálculo</label>
                                                         </div>
                                                         <div class='col-md-3 form-check form-check-inline custom-control custom-radio'>
                                                            <input type='radio' id='programado' value='Programado' name='tipoproceso' class='custom-control-input' checked>
                                                            <label class='custom-control-label' for='programado'>Programado</label>
                                                         </div>"; 
                                                   }
                           $contenido.="               
                                          </div>
                                          </div>
                                          <div class='form-group'>
                                             <label for=''>Código proceso</label>
                                             <select class='form-control custom-select text-black' name='rutina' id='tipo_rutina'>";
                                             //si el valor rutina de la tabla conceptosnomina = al valor name_rutinas de la tabla rutinas nos seleccionara el valorr guardado en la base de datos 
                                                while($fila = $rutina->fetch_assoc()){
                                                    if( $row['rutina'] == $fila['name_rutinas']){
                                                      $contenido.="<option value='".$fila['name_rutinas']."' selected>".$fila['name_rutinas']."</option>";
                                                    }
                                                    else {
                                                      $contenido.="<option value='".$fila['name_rutinas']."'> ".$fila['name_rutinas']."</option>
                                       ";
                                                    }

                                                }

                           $contenido.="                        
                                             </select>
                                          </div>
                                          <div class='form-group form-check'>
                                             <div class='row'>"; //Tomamos en cuenta 1 como "marcar"el checkbox
                                                   if ($row['nomina'] == 1 && $row['finiquito'] == 1) {
                                                      $contenido.=" 
                                                         <div class='col-md-6 custom-control custom-switch'>
                                                            <input type='checkbox' value='1' name='finiquito'  class='custom-control-input' id='finiquito' checked>
                                                            <label class='custom-control-label' for='finiquito'>Finiquito</label>
                                                         </div>
                                                         <div class='col-md-6 custom-control custom-switch'>
                                                            <input type='checkbox' value='1' name='nomina'  class='custom-control-input' id='nomina' checked>
                                                            <label class='custom-control-label' for='nomina'>Nómina</label>
                                                         </div> ";
                                                   }
                                                   else if( $row['nomina'] == 0 && $row['finiquito'] == 1){
                                                      $contenido.="
                                                         <div class='col-md-6 custom-control custom-switch'>
                                                            <input type='checkbox' value='1' name='finiquito'  class='custom-control-input' id='finiquito' checked>
                                                            <label class='custom-control-label' for='finiquito'>Finiquito</label >
                                                         </div>
                                                         <div class='col-md-6 custom-control custom-switch'>
                                                            <input type='checkbox' value='1' name='nomina'  class='custom-control-input' id='nomina'>
                                                            <label class='custom-control-label' for='nomina'>Nómina</label>
                                                         </div> ";
                                                   }
                                                   else if( $row['nomina'] == 1 && $row['finiquito'] == 0){
                                                      $contenido.="
                                                         <div class='col-md-6 custom-control custom-switch'>
                                                            <input type='checkbox' value='1' name='finiquito'  class='custom-control-input' id='finiquito'>
                                                            <label class='custom-control-label' for='finiquito'>Finiquito</label>
                                                         </div>
                                                         <div class='col-md-6 custom-control custom-switch'>
                                                            <input type='checkbox' value='1' name='nomina'  class='custom-control-input' id='nomina' checked>
                                                            <label class='custom-control-label' for='nomina'>Nómina</label>
                                                         </div> 
                                          ";
                                                   }
                           $contenido.="                     
                                             </div>
                                          </div>
                                          <button type='submit' class='btn btn-lg btn-success btn-block'>Submit</button>
                                       </form>        
                                    </div>";
                           echo $contenido; //Imprimimos la varable que mostrara el contenido principal
                           $db -> close();  //Cerrmaos la conexión     
                     }

                     else{ //En caso de no encontrar  datos nos imprime un mensaje

                           $contenido.="
                           <div id='datos'></div>
                           ";
                           echo $contenido; 
                           $db -> close(); 
                     }

                        ?>
               </section>       
</body>
<script type="text/javascript">
   document.getElementById('datos').innerHTML='<h1>No Hay Datos</h1>'; //El mensaje se va a imprimir el el div con id datos
</script>

</html>

