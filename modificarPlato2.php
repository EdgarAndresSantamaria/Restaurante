<?php
session_start();
?>
<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css"> 
<link rel="shortcut icon" href="imagenes/icono.ico">  
<script type="text/javascript" src="js//validarDatosPlato.js"></script>
    <title>Modificar Plato - Puzzle</title>
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
 <?php
    if(!(isset($_REQUEST['modificar'])))
    {//ENSEÑA EL FORMULARIO PARA LA SELECCION DEL PLATO
    ?>
 <div id="contenedor">
    <div id="cabecera">
    
        <div id="logo">
             <img src="imagenes/puzzle.png" alt="Smiley face" height="125" width="600">
        </div>
        <div id="login">
             <input id='atras' type="button" value="Volver al Menú" onclick="location.href='administrador.php'" />
        </div>
    </div>
    <div id="general">
        
        <div id="principal">
            <h1>Actualizar un plato</h1>

            
           <?php
           $nombrePlato=$_REQUEST['nombre'];
           #incluimos unas variables con el nombre de la tabla
           $tabla="plato";

           include "conectar.php";

           #conexion, seleccion de tabla y verificacion de errores
           $conectar =mysqli_connect($cfg_servidor, $cfg_usuario, $cfg_password,$nombre_bd);

           if(!$conectar){
               echo "<br>No ha podido realizarse la conexion <br>";
               print "<i>Error numero</i>".mysqli_connect_errno()."<i>equivalente a:</i>".mysqli_connect_error();
               exit();
           }

           #escribimos la sentencia MYSQL
           $sentenciaMYSQL="SELECT * FROM $tabla WHERE `nombre-plato`='$nombrePlato'";
           
           #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
           $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);

           if($sentencia){
               if(mysqli_affected_rows($conectar)>0){
                   echo "<h2>Actualice los datos que considere.</h2>
                       <p>En los campos del formulario puede ver los valores actuales,
                               si no se cambian los valores se mantienen iguales.</p>";
                   echo "<table aling=center>";
                   while($registro=  mysqli_fetch_array($sentencia)){
                       echo '<form method="POST" action="" name="form1" id="form1">
                           <tr>
                               <td>
                                   Nombre:<span>*</span>
                               </td>
                               <td >';
                                       echo '<input type="text" name="nombre" size="20" value="'.$registro["nombre-plato"].'" onchange="validacion(this);"/>';
                            echo'</td>
                           </tr>
                            <tr>
                               <td >
                                   Precio:<span>*</span>
                               </td>
                               <td >';
                                       
                                       echo '<input type="text" name="precio" size="20" value="'.$registro["precio"].'" onchange="validacionEntero(this);"/>';
                                   echo'</td>
                           </tr>
                           <tr>
                               <td >
                                   Categoría:<span>*</span>
                               </td>
                               <td >';
                             echo '<select name="codCategoria" onchange="validacionLista(this);">';
                                             for($i=1;$i<=3;$i++){
                                                 if($i==$registro["cod-categoria"]){
                                                     if($i==1){
                                                            $tipo="Menú Vegetariano";
                                                        }
                                                     else if($i==2){
                                                            $tipo="Menú Normal";
                                                        }
                                                     else{
                                                            $tipo="Carta";
                                                        }
                                                                echo '<option value='.$i.' selected="">'.$tipo.'</option>';
                                                 }
                                                 else{
                                                     if($i==1){
                                                            $tipo="Menú Vegetariano";
                                                        }
                                                     else if($i==2){
                                                            $tipo="Menú Normal";
                                                        }
                                                     else{
                                                            $tipo="Carta";
                                                        }
                                                                echo '<option value='.$i.' >'.$tipo.'</option>';
                                                 }
                                            }
                              echo'</select></td>
                           </tr>
                           <tr>
                               <td >
                                   Subcategoría:<span>*</span>
                               </td><td >';
                               echo '<select name="codSubcategoria" onchange="validacionLista(this);">';
                                             for($i=1;$i<=5;$i++){
                                             
                                                 if($i==$registro["cod-subcategoria"]){
                                                     if($i==1){
                                                            $tipo="Entrantes";
                                                        }
                                                     else if($i==2){
                                                            $tipo="Primeros";
                                                        }
                                                     else if($i==3){
                                                            $tipo="Segundos";
                                                        }
                                                     else {
                                                            $tipo="Postres";
                                                        }
                                                     echo '<option value='.$i.' selected="">'.$tipo.'</option>';
                                                 }
                                                 else{
                                                     if($i==1){
                                                            $tipo="Entrantes";
                                                        }
                                                     else if($i==2){
                                                            $tipo="Primeros";
                                                        }
                                                     else if($i==3){
                                                            $tipo="Segundos";
                                                        }
                                                     else {
                                                            $tipo="Postres";
                                                        }
                                                     echo '<option value='.$i.' >'.$tipo.'</option>';
                                                 }
                                            }
                              echo'</select></td>
                           </tr>
                           <input type="hidden" name="id" value="'.$registro["cod-plato"].'"/>
                           <tr>
                               <td colspan="2">
                                   <p align="center">
                                       <button name="modificar" onclick="return validarTodo();" value="submit">Modificar Plato</button>
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
    <div class="clear">
        <br>
    </div>
    <div id="pie">
    <br>Copyright© 2013 Restaurante Puzzle - Aviso Legal. - Un sitio Web de Maitane Ruiz Monroy (2DW3)
    </div>
</div>
<div class="clear">
    <br>
    </div> <?php
}
else{
        $codPlato=$_REQUEST['id'];
        $nombrePlato=$_REQUEST['nombre'];
        $precio=$_REQUEST['precio'];
        $codCategoria=$_REQUEST['codCategoria'];
        $codSubcategoria=$_REQUEST['codSubcategoria'];
        $tabla="plato";

        include "conectar.php";

        #conexion, seleccion de tabla y verificacion de errores
        $conectar =mysqli_connect($cfg_servidor, $cfg_usuario, $cfg_password,$nombre_bd);

        if(!$conectar){
            echo "<br>No ha podido realizarse la conexion <br>";
            print "<i>Error numero</i>".mysqli_connect_errno()."<i>equivalente a:</i>".mysqli_connect_error();
            exit();
        }

        #escribimos la sentencia MYSQL
        $sentenciaMYSQL="UPDATE $tabla SET `cod-plato`='$codPlato', `nombre-plato`='$nombrePlato', `precio`='$precio',`cod-categoria`='$codCategoria', `cod-subcategoria`='$codSubcategoria' WHERE `cod-plato`='$codPlato'";
        #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
        $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
        if($sentencia){
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>Se ha actualizado $nombrePlato correctamente.</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Men&uacute;\" onclick=\"location.href='administrador.php'\" />";
            print "</div>";
        }
        else{
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>No ha podido actualizar el plato $nombrePlato.</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Men&uacute;\" onclick=\"location.href='administrador.php'\" />";
            print "</div>";            
            exit();
        }

        #cerramos la conexion con la base de datos y comprobamos si da errores.
        if(!mysqli_close($conectar)){
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>No ha podido cerrarse la conexion, mediante procesos, con el servidor de bases de datos.</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"location.href='administrador.php'\" />";
            print "</div>";
        }
}
           ?>
            </body>
           </div>
    </div>
</div>