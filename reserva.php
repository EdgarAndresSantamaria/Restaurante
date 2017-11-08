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
    <title>Reserva - Puzzle</title>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
             $(document).ready(function() {
            	           	
            	$("#mU").click(function(event) {
                	event.preventDefault();
                    $("#principal").load('modificarUsuario.php');
                    //return false;
                }); 
                
                $("#dB").click(function(event) {
                	event.preventDefault();
                    $("#principal").load('darBaja.php');
                    //return false;
                });  
                
                $("#lR").click(function(event) {
                	event.preventDefault();
                    $("#principal").load('listarReservas.php');
                    //return false;
                });  

            	           	
            	$("#aR").click(function(event) {
                	event.preventDefault();
                    $("#principal").load('anadirReserva.php');
                    //return false;
                });              
          
            	           	
            	$("#mR").click(function(event) {
                	event.preventDefault();
                    $("#principal").load('modificarReserva.php');
                    //return false;
                });              
           
            	           	
            	$("#bR").click(function(event) {
                	event.preventDefault();
                    $("#principal").load('borrarReserva.php');
                    //return false;                     
                });              
            });
        </script>
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
        alert("Entre 8 y 10 caracteres, por lo menos un digito y un alfanumérico, y no puede contener caracteres espaciales.");
        document.getElementById("password1").focus();
        return false;
    }
    else{
        return true;
    }
}
</script>
</head>

<body>
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
        <div id="opciones"><h2>Opciones de reserva:</h2>
            <ul>
                    <li><a id="lR" class="menuSecundario" href=listarReservas.php>Ver mis reservas</a></li>
                    <li><a id="aR" class="menuSecundario" href=anadirReserva.php>realizar una reserva</a></li>
                    <li><a id="mR" class="menuSecundario" href=modificarReserva2.php>Modificar una reserva</a></li>
                    <li><a id="bR" class="menuSecundario" href=borrarReserva.php>Cancelar una reserva</a></li>
            </ul>
            
            <h2>Opciones de usuario:</h2>
            <ul>
                    <li><a id="mU" class="menuSecundario" href=modificarUsuario.php>Modificar mis datos </a></li>
                    <li><a id="dB" class="menuSecundario" href=darBaja.php>Dar de baja mi usuario</a></li>
            </ul>
        </div>
        <div id="principal">
            <h1>Gesti&oacute;n de tus reservas y tu usuario</h1>
            <p> Dispones de las funciones colocadas en el men&uacute; de la izquierda para poder realizar,
                actualizar y visualizar  reservas o poder modificar tu usuario o darte de baja en 
                nuestra p&aacute;gina.</p> 
            <img id="comida" src="imagenes/restaurant_plate_prawns_web_grande.jpg" width="640" height="300"/>
        </div>
    </div>
    <div class="clear">
        
    </div>
    <div id="pie">
		Copyright © 2017 Restaurante Puzzle - Aviso Legal. - <br>
        Un sitio Web de Maitane Ruiz Monroy en colaboracion con Edgar Andr&eacute;s y Eneko G&oacute;mez (2DW4)
    </div>
</div>
<div class="clear">
    <br>
    </div>
</body>
</html>
