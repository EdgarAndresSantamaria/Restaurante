<?php
include("menu.php");
include("login.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict// EN " " htto://www.w3.org/TR/xhtmll/DTD/xhtmll-strict.dtd">
<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css"> 
<link rel="stylesheet" type="text/css" href="engine1//style.css" media="screen" />
<link rel="shortcut icon" href="imagenes/icono.ico">
<script type="text/javascript" src="engine1//jquery.js"></script>
    <title>Restaurante - Puzzle</title>
</head>
</script>
<body>
<div id="contenedor">
    <div id="cabecera">
    
        <div id="logo">
             <img src="imagenes/puzzle.png" alt="Smiley face" height="125" width="600">
        </div>
        <div id="login">
		<!-- generación del login según acceso -->
        <?php mostrarLogin(); ?>
        </div>
    </div>
    <div id="menu">
	<!-- generación del menu según privilegios -->
            <ul>
            <?php mostrarMenu(); ?>
            </ul>
    </div>
    <div id="general">
        
        <div  id="unaColumna">
            <h1>Nuestro Restaurante</h1>
            <p>Puzzle se encuentra ubicado en la zona mas c&eacute;ntrica de Bilbao, cerca de lugares t&aacute;n 
			emblem&aacute;ticos como el parque de Do&ntilde;a Casilda y el museo GuggenHeim.El edificio dispone de 
			distintas plantas para atender a los comensales, el edificio est&aacute; equipado con dos ascensores 
			para la comodidad de nuestros clientes
			<p>
            <img id="comida" src="imagenes/comedor_restaurante.jpg" width="870" height="350" />
            <h2><b>D&oacute;nde estamos</b></h2>
			<p>
			Si tienen cualquier duda, contactenos.
		    </p>
            <br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1027.1731672544774!2d-2.9352554450622668!3d43.26641631606394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1509985648329" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>        
                <div class="clear"></div>
                <h3>Direcci&oacute;n:</h3>
                Calle Falsa,123<br />
                Bilbao, Bizkaia<br />
                
                <h3>Horario:</h3>
                (L-S) 12:00-00:00<br />
                
                <h3>Tel&eacute;fono:</h3>944-444-444
                
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
