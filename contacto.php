<?php
include("menu.php");
include("login.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict// EN " " htto://www.w3.org/TR/xhtmll/DTD/xhtmll-strict.dtd">
<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css">  
<link rel="shortcut icon" href="imagenes/icono.ico"> 
    <title>Contacto - Puzzle</title>
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
   
   <SCRIPT language="JavaScript" type="text/javascript"> 
    function validaEmail(campo) {
             var valor = campo.value;
            if(!(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/.test(valor)) ) {
                alert("El email introducido no es válido.");
                document.getElementById("email").focus();
                return false;
            }
            else{
                return true;
            }
        }  
    function validaPass1(campo) {
            var valor = campo.value;
            if(!(/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,10})$/.test(valor)) ) {
                alert("El contraseña introducida no es válida.");
                document.getElementById("password1").focus();
                return false;
            }
            else{
                return true;
            }
        }
    function validaPass2() {
            var valor1 = document.getElementById("password1").value;
            var valor2 = document.getElementById("password2").value;
            if(!(valor1==valor2)) {
                alert("Las contraseñas introducidas son diferentes.");
                document.getElementById("password2").focus();
                return false;
            }
            else{
                return true;
            }
        }
    function validaTelefono(campo) {
            var valor = campo.value;
            if(!(/^[0-9]{2,3}-? ?[0-9]{6,7}$/.test(valor)) ) {
                alert("El teléfono introducido no es válido.");
                document.getElementById("telefono").focus();
                return false;
            }
            else{
                return true;
            }
        }
    function validacion(campo) {
            var valor = campo.value;
            if( valor == null || valor.length==0 ){
                alert("El campo no puede estar vacío");
                campo.focus();
                return false;
            }
            else{
                return true;
            }
        }   
    function validarTodo(){
            var bien=true;
            var frm = document.getElementById("form1");
            for (i=0;i<frm.elements.length;i++)
            {
                if(frm.elements[i].value==""){
                    alert("Tienes que rellenar todos los campos.");
                    frm.elements[i].focus();
                    bien=false;
                    return false;
                }  
            }
            if (bien==true){
                form1.submit();
                return true;
            }
            
        }
    </script>
    <?php
    if(!(isset($_REQUEST['enviar'])))
    {//ENSEÑA EL FORMULARIO PARA LA SELECCION DEL PLATO
    ?> 
   <div id="contenedor">
    <div id="cabecera">
    
        <div id="logo">
             <img src="imagenes/puzzle.png" alt="Smiley face" height="125" width="600">
        </div>
        <div id="login">
            <?php mostrarLogin(); ?>
        </div>
    </div>
    <div id="menu">
            <ul>
             <?php mostrarMenu(); ?>
            </ul>
    </div>
    <div id="general">
        
        <div  id="unaColumna">
            <h1>Ponte en contacto con nosotros</h1>
            <h4>Puede contactar con nosotros a trav&eacute;s de este formulario.<br>
                Les responderemos a la mayor brevedad. Muchas gracias</h4>
            <div id="formulario">
            <?php
           
            if (isset($_SESSION['k_username'])) {
           #incluimos unas variables con el nombre de la tabla
           $tabla="usuario";

           include "conectar.php";

           #conexion, seleccion de tabla y verificacion de errores
           $conectar =mysqli_connect($cfg_servidor, $cfg_usuario, $cfg_password,$nombre_bd);

           if(!$conectar){
               echo "<br>No ha podido realizarse la conexion <br>";
               print "<i>Error numero</i>".mysqli_connect_errno()."<i>equivalente a:</i>".mysqli_connect_error();
               exit();
           }
            $usuario=$_SESSION['k_username'];
        #escribimos la sentencia MYSQL
        $sentenciaMYSQL="SELECT * FROM $tabla WHERE `email`='$usuario'";

        #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
        $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);

           if($sentencia){
               if(mysqli_affected_rows($conectar)>0){
                   echo "<h2>Rellene todos los campos del formulario:</h1>";
                   echo "<table width=600 >";
                   while($registro=  mysqli_fetch_array($sentencia)){
                       echo '
                           <form method="POST" action="contacto.php" name="form1" id="form1" >
                           <tr>
                               <td>
                                   <b>Nombre:<span>*</span></b>
                               </td>
                               <td >';
                                       echo '<input type="text" id="nombre" name="nombre" onchange="validacion(this);" value="'.$registro["nombre"].'"/>';
                            echo'</td>
                           </tr>
                            <tr>
                               <td>
                                   <b>Apellidos:<span>*</span></b>
                               </td>
                               <td >';
                                       echo '<input type="text" id="apellidos" name="apellidos" onchange="validacion(this);" value="'.$registro["apellidos"].'"/>';
                            echo'</td>
                           </tr>
                           <tr>
                               <td>
                                   <b>E-mail:<span>*</span></b>
                               </td>
                               <td >';
                                       echo '<input type="text" id="email" name="email" onchange="validaEmail(this);" value="'.$registro["email"].'"/>';
                            echo'</td>
                           </tr>
                           <tr>
                               <td>
                                   <b>Asunto:<span>*</span></b>
                               </td>
                               <td >';
                                      echo '<input type="text" id="asunto" name="asunto" onchange="validacion(this);" placeholder="Escriba el asunto" />';
                            echo'</td>
                           </tr>
                           <tr>
                               <td>
                                   <b>Mensaje:<span>*</span></b>
                               </td>
                               <td >';
                                       echo '<textarea rows="8" cols="50" name="mensaje" id="mensaje" placeholder="Escriba su mensaje." onchange="validacion(this);"></textarea>';
                            echo'</td>
                           </tr>
                           
                            <input type="hidden" name="emailAdmin" id="emailAdmin" value="maitane_3_@hotmail.com"/>
                           <tr>
                               <td colspan="2">
                                   <p align="center">
                                       <button name="enviar" onclick="return validarTodo();" value="submit">Enviar email</button>
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
     }
     else{
         echo "<h2>Rellene todos los campos del formulario:</h1>";
                   echo "<table aling=center width=600 >";
                   
                       echo '<form method="POST" action="contacto.php" name="form1" id="form1" >
                           <tr>
                               <td>
                                   <b>Nombre:<span>*</span></b>
                               </td>
                               <td>';
                                       echo '<input type="text" id="nombre" name="nombre" onchange="validacion(this);" />';
                            echo'</td>
                           </tr>
                            <tr>
                               <td>
                                   <b>Apellidos:<span>*</span></b>
                               </td>
                               <td>';
                                       echo '<input type="text" id="apellidos" name="apellidos" onchange="validacion(this);" />';
                            echo'</td>
                           </tr>
                           <tr>
                               <td>
                                   <b>E-mail:<span>*</span></b>
                               </td>
                               <td >';
                                       echo '<input type="text" id="email" name="email" onchange="validaEmail(this);" />';
                            echo'</td>
                           </tr>
                           <tr>
                               <td>
                                   <b>Asunto:<span>*</span></b>
                               </td>
                               <td >';
                                      echo '<input type="text" id="asunto" name="asunto" onchange="validacion(this);" placeholder="Escriba el asunto" />';
                            echo'</td>
                           </tr>
                           <tr>
                               <td>
                                   <b>Mensaje:<span>*</span></b>
                               </td>
                               <td >';
                                       echo '<textarea rows="8" cols="50" name="mensaje" id="mensaje" placeholder="Escriba su mensaje." onchange="validacion(this);"></textarea>';
                            echo'</td>
                           </tr>
                           
                            <input type="hidden" name="emailAdmin" id="emailAdmin" value="maitane_3_@hotmail.com"/>
                           <tr>
                               <td colspan="2">
                                   <p align="center">
                                       <button name="enviar" onclick="return validarTodo();" value="submit">Enviar email</button>
                                   </p>
                               </td>
                           </tr>
                           
                           </form>';
                   echo "</table>";
     }
           ?> 
            </div>
            <img id="comida" src="imagenes/plato6.jpg" width="250" height="350"/>
        </div>
        </div>
        
   
    <div class="clear">
        
    </div>
    <div id="pie">
	Copyright © 2017 Restaurante Puzzle - Aviso Legal. - <br>
        Un sitio Web de Maitane Ruiz Monroy en colaboracion con Edgar Andr&eacute;s y Eneko G&oacute;mez (2DW4)
    </div>
</div>

<?php
}
else{
        $emailAdmin=$_REQUEST['emailAdmin'];
        $nombre=$_REQUEST['nombre'];
        $apellidos=$_REQUEST['apellidos'];
        $email=$_REQUEST['email'];
        $asunto=$_REQUEST['asunto'];
        $mensaje=$_REQUEST['mensaje'];
        $contenido='De: '.$nombre.' '.$apellidos.'<br>Asunto: '.$asunto.'<br>Mensaje: '.$mensaje;
        
        $encabezados = "From: $email\nReply-To: $email\nContent-Type: text/html; charset=iso-8859-1" ;
        print "<div id='contenedor'>";
        mail($emailAdmin, $asunto, $contenido, $encabezados) or die ("<h1 id='resultado'>No se ha podido enviar tu mensaje. Ha ocurrido un error</h1>") ;
        echo "<h1 id='resultado'>Tu mensaje ha sido enviado con este contenido:</h1>" ;
        echo "<p style='margin: 0 5% 5%;'><b>$contenido</b></p>" ;
        print"<br><input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"location.href='contacto.php'\" />";
        print "</div>"; 
}
?>
</body>
</html>
