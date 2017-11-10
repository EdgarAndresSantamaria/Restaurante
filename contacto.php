<?php
include("menu.php");
include("login.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict// EN " " htto://www.w3.org/TR/xhtmll/DTD/xhtmll-strict.dtd">
<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css">  
<script type="text/javascript" src="js//validarLogin.js"></script>
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
    {
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
            <h4>Puede contactar con nosotros a trav&eacute;s de este formulario, 
			el restaurante Puzzle le responder&aacute; con un e-mail con la mayor brevedad. Muchas gracias.</h4>
            <div id="formulario">
            <?php
           
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
                   echo "<h2>Introduzca el mensaje:</h1>";
                   echo "<table width=600 >";
                   while($registro=  mysqli_fetch_array($sentencia)){
                      
							echo '<b>Hola '.$_SESSION['k_username'].', en este apartado podra escribir un comentario para el restaurante Puzzle.</b>
                           <form method="POST" action="contacto.php" name="form1" id="form1" >
						   <tr>
                               <td>
                                   <b>Mensaje:<span>*</span></b>
                               </td>
                               <td >';
                            echo '<textarea rows="8" cols="50" name="mensaje" id="mensaje" placeholder="Escriba su mensaje." onchange="validacion(this);"></textarea>';
                            echo'</td>
                           </tr><tr></tr>
						   <input type="hidden" name="codUsuario" value="'.$registro["cod-usuario"].'"/>
                           <tr>
                               <td colspan="2">
                                   <p align="center">
                                       <button name="enviar" onclick="return validarTodo();" value="submit">Enviar comentario</button>
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
        </div>
        
   
    <div class="clear">
        
    </div>
    <div id="pie">
	Copyright © 2017 Restaurante Puzzle - Aviso Legal. - <br>
        Un sitio Web de Maitane Ruiz Monroy en colaboracion con Edgar Andr&eacute;s y Eneko G&oacute;mez (2DW4)
    </div>
</div>

<?php
}else{
        $codigoUsuario=$_REQUEST['codUsuario'];
        $mensaje=$_REQUEST['mensaje'];
        $tabla="comentario";

        include "conectar.php";

        #conexion, seleccion de tabla y verificacion de errores
        $conectar =mysqli_connect($cfg_servidor, $cfg_usuario, $cfg_password,$nombre_bd);

        if(!$conectar){
            echo "<br>No ha podido realizarse la conexion <br>";
            print "<i>Error numero</i>".mysqli_connect_errno()."<i>equivalente a:</i>".mysqli_connect_error();
            exit();
        }

        #escribimos la sentencia MYSQL
        $sentenciaMYSQL="INSERT INTO $tabla 
                        (`cod_comentario`, `cod-usuario`, `texto`) 
                        VALUES (NULL, '$codigoUsuario', '$mensaje')";
        #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
                $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
                if($sentencia){
					//registrado satisfactorio...pasamos a vista cliente
                    print "<div id='contenedor'>";
                    print"<h1 id='resultado'>Se ha a&ntilde;adido un nuevo comentario </h1>";
                    print"<input id='atras' type=\"button\" value=\"Volver al Men&uacute;\" onclick=\"location.href='index.php'\" />";
                    print "</div>";
                }
                else{
					//registrado insatisfactorio..
                    print "<div id='contenedor'>";
                    print"<h1 id='resultado'>No ha podido a&ntilde;adir un comentario en la tabla $tabla.</h1>"; 
                    print"<input id='atras' type=\"button\" value=\"Volver al Men&uacute;\" onclick=\"location.href='contacto.php'\" />";
                    print "</div>";
                    exit();
                }
				#cerramos la conexion con la base de datos y comprobamos si da errores.
        if(!mysqli_close($conectar)){
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>No ha podido cerrarse la conexion, mediante procesos, con el servidor de bases de datos.</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"location.href='index.php'\" />";
            print "</div>";
        }
      }

        

?>
</body>
</html>
