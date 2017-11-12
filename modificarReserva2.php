<?php
session_start();
?>
<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css">      
<link rel="shortcut icon" href="imagenes/icono.ico">
<script type="text/javascript" src="js//validarDatosReserva.js"></script>
<script type="text/javascript" src="js//validarDesplegable.js"></script> 
    <title>Modificar Reserva - Puzzle</title>
</head>
<style>
    h1#resultado{
	margin:5%;
        text-decoration: none;
        text-transform: uppercase;
    }
    input#atras{
        margin:0 5% 5%;        
    }
</style>

<body>
 <?php
    if(!(isset($_REQUEST['modificar'])))
    {//ENSE�A EL FORMULARIO PARA LA SELECCION DEL PLATO
    ?>
<div id="contenedor" >
    <div id="cabecera">
    
        <div id="logo">
             <img src="imagenes/puzzle.png" alt="Smiley face" height="125" width="600">
        </div>
        <div id="login">
             <input id='atras' type="button" value="Volver al Men&uacute;" onclick="location.href='reserva.php'" />
        </div>
    </div>
    <div id="general">
        
        <div id="principal">
            <h1>Actualizar una reserva</h1>

            
           <?php
           $codReserva=$_REQUEST['codReserva'];
           #incluimos unas variables con el nombre de la tabla
           $tabla="reserva";

           include "conectar.php";

           #conexion, seleccion de tabla y verificacion de errores
           $conectar =mysqli_connect($cfg_servidor, $cfg_usuario, $cfg_password,$nombre_bd);

           if(!$conectar){
               echo "<br>No ha podido realizarse la conexion <br>";
               print "<i>Error numero</i>".mysqli_connect_errno()."<i>equivalente a:</i>".mysqli_connect_error();
               exit();
           }

           #escribimos la sentencia MYSQL
           $sentenciaMYSQL="SELECT * FROM $tabla WHERE `cod-reserva`='$codReserva'";

           #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
           $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);

           if($sentencia){
               if(mysqli_affected_rows($conectar)>0){
                   echo "<h2>Actualice los datos que considere.</h2>
                       <p>En los campos del formulario puede ver los valores actuales,
                               si no se cambian los valores se mantienen iguales.</p>";
                   
                   
                   echo "<table aling=center>";
                   while($registro=  mysqli_fetch_array($sentencia)){
                       echo '<form method="POST" action="modificarReserva2.php" name="form1" id="form1">
                           <tr>
                               <td>Fecha:<span>*</span></td>
                               <td >';
                               $fecha=$registro["fecha"];
                            $anio= substr($fecha, 0,4);
                            $mes= substr($fecha, 6,8);
                            $dia=substr($fecha, 8,13);
                            
                        echo '<select name="anio" onchange="validacionLista(this);">';
                        for($i=2014;$i<=2030;$i++){
                                             if(strlen($i)==1){
                                                 if($i==$anio){
                                                     echo '<option value=0'.$i.' selected="">0'.$i.'</option>';
                                                 }
                                                 else{
                                                     echo '<option value=0'.$i.' >0'.$i.'</option>';
                                                 }
                                                  }
                                             else{
                                                 if($i==$anio){
                                                     echo '<option value='.$i.' selected="">'.$i.'</option>';
                                                 }
                                                 else{
                                                     echo '<option value='.$i.' >'.$i.'</option>';
                                                 }
                                            }
                        }
                echo '</select>  
                <b>/</b>
                
                <select name="mes" onchange="mostrarDias(this);">
                    <option value="99">Mes</option>';
                   
                        for($i=1;$i<=12;$i++){
                            if(strlen($i)==1){
                                 if($i==$mes){
                                     echo '<option value=0'.$i.' selected="">0'.$i.'</option>';
                                 }
                                 else{
                                     echo '<option value=0'.$i.' >0'.$i.'</option>';
                                 }
                                  }
                             else{
                                 if($i==$mes){
                                     echo '<option value='.$i.' selected="">'.$i.'</option>';
                                 }
                                 else{
                                     echo '<option value='.$i.' >'.$i.'</option>';
                                 }
                            }
                        }
                 
               echo' </select> ';
                  ?>
                <b>/</b>
                
                
                <select name="dia" id="dia" onchange="validacionLista();">
                    <option value="99" >Dia</option>
                </select>
                
                <script>
                mostrarDias(<?php echo $dia ?>);
                </script>
               <?php
               
                            echo'</td>
                           </tr>
                           <tr>
                               <td>Horario:<span>*</span></td>
                               <td >';
                                 echo '<select name="hora" onchange="validacionHora(this);">
                                                <option value="99">Horario</option>';
                                             if($registro["horario"]=="Comida"){
                                                     echo '<option value="Comida" selected="">"Comida"</option>';
                                                     echo '<option value="Cena" >"Cena"</option>';
                                             }
                                             else{
                                                 echo '<option value="Comida" >Comida</option>';
                                                 echo '<option value="Cena" selected="">Cena</option>';
                                            }
                                        echo "</select>";
                            echo'</td>
                           </tr>
                            <tr>
                               <td>Numero de personas:<span>*</span></td>
                               <td >';
                             echo '<select name="personas" onchange="validacionLista(this);">
                                                <option value="0">Personas</option>';
                                             for($i=1;$i<=10;$i++){
                                             
                                                 if($i==$registro["num-personas"]){
                                                     echo '<option value='.$i.' selected="">'.$i.'</option>';
                                                 }
                                                 else{
                                                     echo '<option value='.$i.' >'.$i.'</option>';
                                                 }
                                            }
                              echo'</select></td>
                           </tr>
                            <input type="hidden" name="codReserva" value="'.$registro["cod-reserva"].'"/>
                            <input type="hidden" name="codUsuario" value="'.$registro["cod-usuario"].'"/>
                           <tr>
                               <td colspan="2">
                                   <p align="center">
                                       <button name="modificar" onclick="return validarTodo();" value="submit">Modificar Reserva</button>
                                   </p>
                               </td>
                           </tr>
                           
                           </form>';
                   }
                   echo "</table>";
               }
               else{
                   print"<br>La consulta de la tabla $tabla no ha producido ningun resultado.<br>"; 
                   exit;
               }
           }
           else{
               print"<br>No ha podido realizarse la consulta de la tabla $tabla.<br>"; 
               print"<i>Error: </i>".mysqli_error($conectar)."<i>Codigo</i>".mysqli_connect_errno();
               exit();
           }

           #cerramos la conexion con la base de datos y comprobamos si da errores.
           if(!mysqli_close($conectar)){
               print"<br>No ha podido cerrarse la conexion, mediante procesos, con el servidor de bases de datos. <br>."; 
           }
           ?>
  </div>
    </div>
     <div id="pie">
	Copyright � 2017 Restaurante Puzzle - Aviso Legal. - <br>
	Un sitio Web de Maitane Ruiz Monroy en colaboracion con Edgar Andr&eacute;s y Eneko G&oacute;mez (2DW4)
     </div>
        </div>
        <div class="clear">
    <br>
   </div>
<div class="clear">
    <br>
    </div> <?php
}
else{
        $codReserva=$_REQUEST['codReserva'];
        $codUsuario=$_REQUEST['codUsuario'];
        $anio=$_REQUEST['anio'];
        $mes=$_REQUEST['mes'];
        $dia=$_REQUEST['dia'];
        
        $horario=$_REQUEST['hora'];
        
        $numPersonas=$_REQUEST['personas'];
        

        $fecha="$anio-$mes-$dia";
        $tabla="reserva";

        include "conectar.php";

        #conexion, seleccion de tabla y verificacion de errores
        $conectar =mysqli_connect($cfg_servidor, $cfg_usuario, $cfg_password,$nombre_bd);

        if(!$conectar){
            echo "<br>No ha podido realizarse la conexion <br>";
            print "<i>Error numero</i>".mysqli_connect_errno()."<i>equivalente a:</i>".mysqli_connect_error();
            exit();
        }

        #escribimos la sentencia MYSQL
        $sentenciaMYSQL="UPDATE $tabla SET `cod-reserva`='$codReserva', `cod-usuario`='$codUsuario', `fecha`='$fecha', `horario`='$horario',`num-personas`='$numPersonas' WHERE `cod-reserva`='$codReserva'";
        #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
        $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
        if($sentencia){
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>Se ha actualizado $codReserva correctamente. </h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Men&uacute;\" onclick=\"location.href='reserva.php'\" />";
            print "</div>";
        }
        else{
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>No ha podido actualizar la reserva $codReserva.</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Men&uacute;\" onclick=\"location.href='reserva.php'\" />";
            print "</div>";            
            exit();
        }

        #cerramos la conexion con la base de datos y comprobamos si da errores.
        if(!mysqli_close($conectar)){
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>No ha podido cerrarse la conexion, mediante procesos, con el servidor de bases de datos.</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Men&uacute;\" onclick=\"location.href='reserva.php'\" />";
            print "</div>";
        }
}
?> 
</body>
</html>