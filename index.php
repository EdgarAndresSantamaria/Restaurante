<?php
include("menu.php");
include("login.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict// EN " " htto://www.w3.org/TR/xhtmll/DTD/xhtmll-strict.dtd">
<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css"> 
<link rel="stylesheet" type="text/css" href="slider/style.css" media="screen" />

<link rel="stylesheet" type="text/css" href="slider/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<link rel="shortcut icon" href="imagenes/icono.ico">
<script type="text/javascript" src="slider/jquery.js"></script>
    <title>Inicio - Puzzle</title>
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
        
        <div  id="unaColumna">
            <h1>Bienvenidos a Puzzle</h1>
            <p>
                <p>Desde 1999 Puzzle ofrece una cocina sensata y gustosa basada en el mejor producto,
                Alimentos org&aacute;nicos. Puzzle es el resultado de la idea que tiene Txomin Zulueta 
                de c&oacute;mo debe ser un restaurante:la cocina, el servicio y el entorno se combinan
                para conseguir la satisfacci&oacute;n completa del cliente. En nuestro sitio web explicamos 
                como lo hacemos.</p>
                <em><b>Para poder efectuar una reserva en nuestro establecimiento a traves de la p&aacute;gina web,
                    antes deber&aacute; registrarse o loguearse pudiendo hacerlo a trav&eacute;s del apartado superior izquierdo
                    siguiendo las indicaciones.</b> </em>
                <br />
            </p>
               <br>
            <div id="wowslider-container1">
			<div class="ws_images"><ul>
				<li><img src="imagenes/slider/2l0e0210.jpg" alt="Delicias de queso fresco" title="Delicias de queso fresco" id="wows1_0"/></li>
				<li><img src="imagenes/slider/f58fd__catering_16.jpg" alt="Postre de Frutas" title="Postre de Frutas" id="wows1_1"/></li>
				<li><img src="imagenes/slider/me1.jpg" alt="Esparragos con hojaldre" title="Esparragos con hojaldre" id="wows1_2"/></li>
				<li><img src="imagenes/slider/plato2.jpg" alt="Judias en primavera" title="Judias en primavera" id="wows1_3"/></li>
				<li><img src="imagenes/slider/plato3.jpg" alt="Pulpo con verduras" title="Pulpo con verduras" id="wows1_4"/></li>
				<li><img src="imagenes/slider/plato4.jpg" alt="Solomillos a la parrilla" title="Solomillos a la parrilla" id="wows1_5"/></li>
				<li><img src="imagenes/slider/plato5.jpg" alt="Tortellinis con setas" title="Tortellinis con setas" id="wows1_6"/></li>
				<li><img src="imagenes/slider/postredecorado.jpg" alt="Mus de chocolate" title="Mus de chocolate" id="wows1_7"/></li>
				<li><img src="imagenes/slider/rest_72.jpg" alt="Nido de verduras con chuleta" title="Nido de verduras con chuleta" id="wows1_8"/></li>
				</ul>
			</div>
			<div class="ws_bullets">
				<div>
				<a href="#" title="Delicias de queso fresco"><img src="imagenes/slider/2l0e0210.jpg" alt="Delicias de queso fresco"/>1</a>
				<a href="#" title="Postre de Frutas"><img src="imagenes/slider/f58fd__catering_16.jpg" alt="Postre de Frutas"/>2</a>
				<a href="#" title="Esparragos con hojaldre"><img src="imagenes/slider/me1.jpg" alt="Esparragos con hojaldre"/>3</a>
				<a href="#" title="Judias en primavera"><img src="imagenes/slider/plato2.jpg" alt="Judias en primavera"/>4</a>
				<a href="#" title="Pulpo con verduras"><img src="imagenes/slider/plato3.jpg" alt="Pulpo con verduras"/>5</a>
				<a href="#" title="Solomillos a la parrilla"><img src="imagenes/slider/plato4.jpg" alt="Solomillos a la parrilla"/>6</a>
				<a href="#" title="Tortellinis con setas"><img src="imagenes/slider/plato5.jpg" alt="Tortellinis con setas"/>7</a>
				<a href="#" title="Mus de chocolate"><img src="imagenes/slider/postredecorado.jpg" alt="Mus de chocolate"/>8</a>
				<a href="#" title="Nido de verduras con chuleta"><img src="imagenes/slider/rest_72.jpg" alt="Nido de verduras con chuleta"/>9</a>
				</div>
			</div>
				<script type="text/javascript" src="slider//wowslider.js"></script>
				<script type="text/javascript" src="slider//script.js"></script>
				<a href="#" class="ws_frame"></a>
				<div class="ws_shadow"></div>
			</div>
	
        <br><br>
        <h2><b>Sobre nosotros</b></h2>
        <p>
            Cuenta con dos comedores y una espectacular terraza acondicionada todo el a&ntilde;o con unas
            vistas exclusivas del nuevo Bilbao. Nuestra propuesta gastron&oacute;mica, se basa en mezclar la
            cocina tradicional y nuestra cocina creativa, buscando siempre un sabor muy profundo y desde el
            equipo de I+D dirigido por Patxi Martinez, sorprender con nuestras creaciones. En definitiva,
            una cocina que sorprende y agrada, reconocida a nivel internacional y local. 
        </p>
        <div id="pIzq">
        <p>
            La decoraci&oacute;n y el espacio sorprenden a nuestros visitantes, la amplitud que confiere la altura 
            de los techos, su ubicaci&oacute;n y vistas, unidas a la decoraci&oacute;n crean una atmosfera
            y un ambiente relajado y sugerente, realmente &uacute;nico. El servicio de sala est&aacute; dirigido por Martin Etxebarri,
            gran profesional que intenta en todo momento hacer que el cliente se sienta como en su casa.
            Contamos con unas vistas impresionantes sobre el Bilbao al estar situado en las alturas. 
        </p>  
        <p>
                <audio controls>
                        <source src="audio/cancion.mp3" type="audio/mp3" />
                        <source src="audio/cancion.wma" type="audio/wma" />
                        <source src="audio/cancion.ogg" type="audio/ogg" />
                </audio>
        </p>
        </div>
                <video width="50%" controls >
                    <source src="videos/video.mp4" type="video/mp4"></source>
                </video>
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
