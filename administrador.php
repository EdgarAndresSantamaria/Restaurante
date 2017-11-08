<?php
include("menu.php");
include("login.php");
session_start();
if(isset($_SESSION['k_username'])){
if($_SESSION['k_username']=='admin@puzzle.com'){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict// EN " " htto://www.w3.org/TR/xhtmll/DTD/xhtmll-strict.dtd">
<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css">  
<link rel="shortcut icon" href="imagenes/icono.ico"> 
    <title>Administrador - Puzzle</title>
    <script type="text/javascript" language="javascript" src="js/cookies.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
             $(document).ready(function() {
            	           	
            	$("#aP").click(function(event) {
                	event.preventDefault();
                    $("#principal").load('anadirPlato.php');
                    //return false;
                });              

            	           	
            	$("#bP").click(function(event) {
                	event.preventDefault();
                    $("#principal").load('borrarPlato.php');
                    //return false;
                });              
          
            	           	
            	$("#mP").click(function(event) {
                	event.preventDefault();
                    $("#principal").load('modificarPlato.php');
                    //return false;
                });              
           
            	 
                $("#lU").click(function(event) {
                	event.preventDefault();
                    $("#principal").load('listarUsuarios.php');
                    //return false;                     
                }); 
                
                 
            	$("#bU").click(function(event) {
                	event.preventDefault();
                    $("#principal").load('borrarUsuario.php');
                    //return false;                     
                });     
                
                
                $("#ltR").click(function(event) {
                	event.preventDefault();
                    $("#principal").load('listarReservasAdmin.php');
                    //return false;                     
                }); 
                
                 
            	$("#btR").click(function(event) {
                	event.preventDefault();
                    $("#principal").load('borrarReservasAdmin.php');
                    //return false;                     
                });
            });
           
        </script>
<style>
    div#contenedor{
        background-color: rgba(255,255,0,0.5);
    }
</style>
</head>

<body onload="entrada();">
<SCRIPT language="JavaScript" type="text/javascript"> 

 /*VALIDACIONES*/
 function validacion(campo) {
            var valor = campo.value;
            if( valor == null || valor.length==0 ){
                alert("El campo no puede estar vacío");
                campo.focus();
                return false;
            }
            return true;
        }
 function validacionLista(campo) {
            var valor = campo.value;
            if( valor == null || valor == 0 || valor == "0"){
                alert("El campo tiene que tener una opción seleccionada");
                campo.focus();
                return false;
            }
            return true;
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
        alert("Entre 8 y 10 caracteres, por lo menos un digito y un alfanumérico, y no puede contener caracteres espaciales.");
        document.getElementById("password1").focus();
        return false;
    }
    else{
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
           <?php mostrarLogin(); ?>
        </div>
    </div>
     <div id="menu">
            <ul>
             <?php mostrarMenu(); ?>
            </ul>
    </div> 
    <div id="general">
        <div id="opciones">
            <h2>Opciones de platos:</h2>
        <ul>
                <li><a id="aP" class="menuSecundario" href=anadirPlato.php>A&ntilde;adir un plato</a></li>
                <li><a id="bP" class="menuSecundario" href=borrarPlato.php>Borrar un plato</a></li>		
                <li><a id="mP" class="menuSecundario" href=modificarPlato2.php>Modificar un plato</a></li>		
        </ul>
             <h2>Opciones de usuarios:</h2>
        <ul>		
                <li><a id="lU" class="menuSecundario" href=listarUsuarios.php>Lista de usuarios</a></li>
                <li><a id="bU" class="menuSecundario" href=borrarUsuario.php>Borrar un usuario</a></li>
        </ul>
             <h2>Opciones de reservas:</h2>
        <ul>
                <li><a id="ltR" class="menuSecundario" href=listaReservasAdmin.php>Lista de reservas</a></li>
                <li><a id="btR" class="menuSecundario" href=borrarReservasAdmin.php>Borrar una reserva</a></li>
        </ul>
        </div>
        <div id="principal">
            <h1>Gesti&oacute;n como ADMINISTRADOR</h1>
            <p> A la izquierda dispones de un men&uacute; con todas las opciones accesibles con las que cuentas
            como administrador de esta p&aacute;gina web.
            <br>
            En la parte inferior ver&aacute;s un bot&oacute;n en el que pone "&uacute;ltima visita" pinchando encima
            podras obtener la fecha y la hora de su &uacute;ltima visita.</p>
            <img id="comida" src="imagenes/md004.jpg" width="640" height="300"/>
        </div>
    </div>
    <div class="clear">
        <br>
    </div>
    <div id="pie">
		Copyright © 2017 Restaurante Puzzle - Aviso Legal. - <br>
        Un sitio Web de Maitane Ruiz Monroy en colaboracion con Edgar Andr&eacute;s y Eneko G&oacute;mez (2DW4)
    </div>
     <div id="ultima">
        <form action="null" style="text-align:center;">
            <input onclick="alert('La última vez que visitaste esta página fue: \n' + Cuando())" type="button" value="Última visita">
        </form>
   
     </div>
    <br>
</div>
<div class="clear">
    <br>
    </div>



</body>
</html>
<?php
}
}

else{
    echo'<style>
    h1#resultado{
	margin:5%;
        text-decoration: none;
        text-transform: uppercase;
    }
    input#atras{
        margin:0 5% 5%; 
     </style>
    }';
    echo '<link href="css/estilos.css" rel="stylesheet" type="text/css">';
    print "<div id='contenedor'>";
        print"<h1 id='resultado'>No tienes permisos para acceder a este espacio.</h1>";
       print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"history.back(-1)\" />";
    print "</div>";
}
?>
