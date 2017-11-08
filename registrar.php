<?php
session_start();
?>
<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css">      
<link rel="shortcut icon" href="imagenes/icono.ico">
    <title>Registro - Puzzle</title>
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
    if(!(isset($_REQUEST['enviar'])))
    {//no se ha enviado el formulario
    ?>
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
        
<div id="contenedor">
    <div id="cabecera">
    
        <div id="logo">
             <img src="imagenes/puzzle.png" alt="Smiley face" height="125" width="600">
        </div>
        <div id="login">
             <input id='atras' type="button" value="Volver al Menu" onclick="history.back(-1)" />
        </div>
    </div>
    <div id="general">
        
        <div id="principal">
            <form id="form1" name="form1" action="registrar.php" method="post">
                <table aling=center id="tabla1">
                    <tr>
                        <td>Nombre:<span>*</span></td>
                        <td>
                            <input type="text" id="nombre" name="nombre" onchange="validacion(this);">
                        </td>
                    </tr>
                    <tr>
                        <td>Apellidos:<span>*</span></td>
                        <td>
                            </span><input type="text" id="apellidos" name="apellidos" onchange="validacion(this);">
                        </td>
                    </tr>
                    <tr>
                        <td>E-mail:<span>*</span></td>
                        <td>
                            <input type="text" id="email" name="email" placeholder="aaa@aaa.com" onchange="validaEmail(this);">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Contrase&ntilde;a:<span>*</span><br>
                            <label id="mensaje">(Entre 8 y 10 caracteres, por lo menos un <br>digito y un alfanumérico, y no puede<br> contener caracteres espaciales)</label>
                        </td>
                        <td>
                            <input type="password" id="password1" name="password1" onchange="validaPass1(this);">
                        </td>
                    </tr>
                    <tr>
                        <td>Repetir Contrase&ntilde;a:<span>*</span></td>
                        <td>
                            <input type="password" id="password2" name="password2" onchange="validaPass2();">
                        </td>
                    </tr>
                    <tr>
                        <td>Tel&eacute;fono:<span>*</span></td>
                        <td>
                            <input type="text" id="telefono" name="telefono" placeholder="000000000" onchange="validaTelefono(this);">
                        </td>
                    </tr>
                    <tr>
                        <td><button name="enviar" onclick="return validarTodo();" value="submit">Registrar</button></td>
                        <td></td>
                    </tr>
                </table> 
            </form>
           
        </div>
    </div>
    <div class="clear">
        <br>
    </div>
    <div id="pie">
    Copyright © 2017 Restaurante Puzzle - Aviso Legal. - <br>
	Un sitio Web de Maitane Ruiz Monroy en colaboracion con Edgar Andr&eacute;s y Eneko G&oacute;mez (2DW4)
    </div>
</div>
<div class="clear">
    <br>
    </div> <?php
}
else{//si se ha enviado
        #incluimos unas variables con el nombre de la tabla
        $nombre=$_REQUEST['nombre'];
        $apellidos=$_REQUEST['apellidos'];
        $email=$_REQUEST['email'];
        $password=$_REQUEST['password2'];
        $telefono=$_REQUEST['telefono'];
        $tabla="usuario";
        $password=hash('sha512',$password);
		//guardar resumen criptográfico del pass
        include "conectar.php";
        #conexion, seleccion de tabla y verificacion de errores
        $conectar =mysqli_connect($cfg_servidor, $cfg_usuario, $cfg_password,$nombre_bd);
        if(!$conectar){
            echo "<br>No ha podido realizarse la conexion <br>";
            print "<i>Error numero</i>".mysqli_connect_errno()."<i>equivalente a:</i>".mysqli_connect_error();
            exit();
        }
        #comprobamos que no exista un usuario con el mismo email
        $sentenciaMYSQL="SELECT email FROM $tabla WHERE `email`='$email'";
        $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
            if(mysqli_num_rows($sentencia) > 0) { 
				//email no disponible...
                print "<div id='contenedor'>";
                print"<h1 id='resultado'>El email elegido ya ha sido registrado anteriormente.</h1>";
                print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"history.back(-1)\" />";
                print "</div>";
            }else { 
				//email disponible...creamos nuevo usuario
                #escribimos la sentencia MYSQL
                $sentenciaMYSQL="INSERT INTO $tabla 
                        (`cod-usuario`, `nombre`, `apellidos`, `email`, `password`, `telefono`) 
                        VALUES (NULL, '$nombre', '$apellidos', '$email', '$password', '$telefono')";

                #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
                $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
                if($sentencia){
					//registrado satisfactorio...pasamos a vista cliente
                    print "<div id='contenedor'>";
                    print"<h1 id='resultado'>Se ha a&ntilde;adido un nuevo usuario </h1>";
                    print"<input id='atras' type=\"button\" value=\"Volver al Men&uacute;\" onclick=\"location.href='reserva.php'\" />";
                    print "</div>";
                    $_SESSION["k_username"] = $email;
                }
                else{
					//registrado insatisfactorio..
                    print "<div id='contenedor'>";
                    print"<h1 id='resultado'>No ha podido a&ntilde;adir un usuario en la tabla $tabla.</h1>"; 
                    print"<input id='atras' type=\"button\" value=\"Volver al Men&uacute;\" onclick=\"history.back(-1)\" />";
                    print "</div>";
                    exit();
                }
            }

        #cerramos la conexion con la base de datos y comprobamos si da errores.
        if(!mysqli_close($conectar)){
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>No ha podido cerrarse la conexion, mediante procesos, con el servidor de bases de datos.</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"history.back(-1)\" />";
            print "</div>";
        }
}
?>
</body>
</html>
