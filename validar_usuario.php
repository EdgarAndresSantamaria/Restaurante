<?php 
session_start();
 ?>
<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css"> 
<link rel="shortcut icon" href="imagenes/icono.ico">  
    <title>Validacion de Usuario - Puzzle</title>
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
        include "conectar.php";
        $tabla='usuario';
        #conexion, seleccion de tabla y verificacion de errores
        $conectar =mysqli_connect($cfg_servidor, $cfg_usuario, $cfg_password,$nombre_bd);

        if(!$conectar){
			//no existe el usuario o conexion no establecida ...
            echo "<br>No ha podido realizarse la conexion <br>";
            print "<i>Error numero</i>".mysqli_connect_errno()."<i>:</i>".mysqli_connect_error();
            exit();
        }
  
    $email = $_REQUEST['email'];
	/*
    $password = $_REQUEST["password"];
    $password=hash('sha512',$password);
	*/
	$password=hash('sha512',$_REQUEST["password"]);
    #escribimos la sentencia MYSQL
    $sentenciaMYSQL="SELECT password, email FROM $tabla WHERE email='$email'";
    #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
    $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
    if($sentencia){
        if($row = mysqli_fetch_array($sentencia)){
			if($row["password"] == $password){
				$_SESSION["k_username"] = $row['email'];
				/*echo 'Has sido logueado correctamente '.$_SESSION['k_username'].' <p>';
				echo '<a href="login.php">Index</a></p>';
				//Elimina el siguiente comentario si quieres que re-dirigir autom&aacute;ticamente a index.php
				/*Ingreso exitoso, ahora sera dirigido a la pagina principal.*/  
				echo '<SCRIPT LANGUAGE="javascript">
					if("'.$_SESSION["k_username"].'"=="admin@puzzle.com")
						location.href = "administrador.php";
					else
						location.href = "reserva.php";
				</SCRIPT>';
			}else{
				print "<div id='contenedor'>";
				print"<h1 id='resultado'>Password incorrecto</h1>";
				print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"history.back(-1)\" />";
				print "</div>";
			}
		}else{
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>Usuario no existente en la base de datos</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"history.back(-1)\" />";
            print "</div>";
		}	
    }else{
        print "<div id='contenedor'>";
        print"<h1 id='resultado'>No ha podido registrar.</h1>";
        print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"history.back(-1)\" />";
        print "</div>";
    }
    #cerramos la conexion con la base de datos y comprobamos si da errores.
    if(!mysqli_close($conectar)){
        print "<div id='contenedor'>";
        print"<h1 id='resultado'>No ha podido cerrarse la conexion, mediante procesos, con el servidor de bases de datos.</h1>";
        print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"history.back(-1)\" />";
        print "</div>";
    }
?>