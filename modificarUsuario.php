<?php
session_start();
?>
<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css"> 
<link rel="shortcut icon" href="imagenes/icono.ico">  
    <title>Modificar Usuario - Puzzle</title>
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
        function validaTelefono(campo) {
            var valor = campo.value;
            if(!(/^[0-9]{2,3}-? ?[0-9]{6,7}$/.test(valor)) ) {
                alert("El teléfono introducido no es válido.");
                campo.value="";
                document.getElementById("telefono").focus();
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
                if(frm.elements[i].value=="" || frm.elements[i].value==0 || frm.elements[i].value=='0'){
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
                   echo "<h2>Actualice los datos que considere.</h2>
                       <p>En los campos del formulario puede ver los valores actuales,
                               si no se cambian los valores se mantienen iguales.</p><br>";
                   
                   
                   echo "<table aling=center>";
                   while($registro=  mysqli_fetch_array($sentencia)){
                       echo '<form method="POST" action="modificarUsuario.php" name="form1" id="form1" >
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
                                   <b>Telefono:<span>*</span></b>
                               </td>
                               <td >';
                                      echo '<input type="text" id="telefono" name="telefono" onchange="validaTelefono(this);" value="'.$registro["telefono"].'"/>';
                            echo'</td>
                           </tr>
                            <input type="hidden" name="codUsuario" value="'.$registro["cod-usuario"].'"/>
                           <tr>
                               <td colspan="2">
                                   <p align="center">
                                       <button name="modificar" onclick="return validarTodo();" value="submit">Actualizar Datos</button>
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
        $codUsuario=$_REQUEST['codUsuario'];
        $nombre=$_REQUEST['nombre'];
        $apellidos=$_REQUEST['apellidos'];
        $email=$_REQUEST['email'];
        $password=$_REQUEST['password'];
        $telefono=$_REQUEST['telefono'];
        
        $tabla="usuario";

        include "conectar.php";

        #conexion, seleccion de tabla y verificacion de errores
        $conectar =mysqli_connect($cfg_servidor, $cfg_usuario, $cfg_password,$nombre_bd);

        if(!$conectar){
            echo "<br>No ha podido realizarse la conexion <br>";
            print "<i>Error numero</i>".mysqli_connect_errno()."<i>equivalente a:</i>".mysqli_connect_error();
            exit();
        }

        #escribimos la sentencia MYSQL
        $sentenciaMYSQL="UPDATE $tabla SET `cod-usuario`='$codUsuario', `nombre`='$nombre', `apellidos`='$apellidos',`email`='$email', `password`='$password', `telefono`='$telefono' WHERE `cod-usuario`='$codUsuario'";
        #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
        $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
        if($sentencia){
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>Se ha actualizado tu usuario correctamente </h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Men&uacute;\" onclick=\"location.href='reserva.php'\" />";
            print "</div>";
        }
        else{
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>No ha podido actualizar tu usuario en la tabla $tabla.</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"location.href='reserva.php'\" />";
            print "</div>";            
            exit();
        }

        #cerramos la conexion con la base de datos y comprobamos si da errores.
        if(!mysqli_close($conectar)){
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>No ha podido cerrarse la conexion, mediante procesos, con el servidor de bases de datos.</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"location.href='reserva.php'\" />";
            print "</div>";
        }
}
           ?>
            </body>
           </div>
    </div>
</div>