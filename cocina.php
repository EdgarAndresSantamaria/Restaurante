<?php
include("menu.php");
include("login.php");
session_start();
if (isset($_SESSION['k_username'])) {
    if($_SESSION['k_username']=='admin@puzzle.com'){
        echo '<style>
            div#contenedor{
                background-color: rgba(255,255,0,0.5);
            }
        </style>';    
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict// EN " " htto://www.w3.org/TR/xhtmll/DTD/xhtmll-strict.dtd">
<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css"> 
<link rel="shortcut icon" href="imagenes/icono.ico">  
    <title>Cocina - Puzzle</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
             $(document).ready(function() {
            	           	
            	$("#mV").click(function(event) {
                	event.preventDefault();
                    $("#principal").load('listarMV.php');
                    //return false;
                });              

            	           	
            	$("#mN").click(function(event) {
                	event.preventDefault();
                    $("#principal").load('listarMN.php');
                    //return false;
                });              
          
            	           	
            	$("#C").click(function(event) {
                	event.preventDefault();
                    $("#principal").load('listarC.php');
                    //return false;
                });            
            });
        </script>
	<script type="text/javascript" src="js//validarLogin.js"></script>
</head>
<SCRIPT language="JavaScript" type="text/javascript"> 
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
        <div id="opciones">
            <h2>Elige tu opci&oacute;n:</h2>
        <ul>
		<!-- lista de menus + carta -->
                    <li><a class="menuSecundario" href=listarMV.php id="mV" >Men&uacute; Vegetariano</a></li>
                    <li><a class="menuSecundario" href=listarMN.php id="mN" >Men&uacute; Normal</a></li>		
                    <li><a class="menuSecundario" href=listarC.php id="C" >Carta</span></a></li>
            </ul>
        </div>
        <div id="principal">
            <h1>Men&uacute;s</h1>
            <p>Estos men&uacute;s est&aacute;n confeccionados en exclusivas para facilitar una primera
                aproximaci&oacute;n a nuestra cocina y nuestros platos m&aacute;s emblem&aacute;ticos.
                Descubre lo mejor de la gastronom&iacute;a del Puzzle con estas oportunidades
                &uacute;nicas para t&iacute; o para regalar un detalle.</p>
            <h2><b>Inf&oacute;rmate sobre nuestros men&uacute;s</b></h2>
            <p>En la parte izquierda podr&aacute; elegir entre nuestras posibilidades para comprobar 
            los platos que ofertamos y sus precios.</p>
			 <!-- platos atractivos -->
            <div id="container" class="container">
            <div class="wrap">
                <a href="#">
                    <img src="imagenes/image1.jpg" alt="Picture 1"/>
                </a>
            </div>
            <div class="wrap">
                <a href="#">
                    <img src="imagenes/image2.jpg" alt="Picture 2"/>
                </a>
            </div>
            <div class="wrap">
                <a href="#">
                    <img src="imagenes/image3.jpg" alt="Picture 3"/>
                </a>
            </div>
            <div class="wrap">
                <a href="#">
                    <img src="imagenes/image4.jpg" alt="Picture 4"/>
                </a>
            </div>
            <div class="wrap">
                <a href="#">
                    <img src="imagenes/image5.jpg" alt="Picture 5"/>
                </a>
            </div>
            <div class="wrap">
                <a href="#">
                    <img src="imagenes/image6.jpg" alt="Picture 6"/>
                </a>
            </div>
        </div>
        <div>
            <a class="back" href="#"></a>
        </div>
        <!-- The JavaScript -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script type="text/javascript">
            $(function() {
				$('#container img').hover(
					function(){
						var $this = $(this);
						$this.stop().animate({'opacity':'1.0','height':'200px','top':'0px','left':'0px'});
					},
					function(){
						var $this = $(this);
						$this.stop().animate({'opacity':'0.5','height':'500px','top':'-66.5px','left':'-150px'});
					}
				);
            });
        </script>
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
    </div>
</body>
</html>

