<?php
session_start();
?>
<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css"> 
<link rel="shortcut icon" href="imagenes/icono.ico">  
    <title>Dar de baja - Puzzle</title>
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
    if(!(isset($_REQUEST['enviar'])))
    {//no se ha enviado el formulario
    ?>
</script>
<SCRIPT language="JavaScript" type="text/javascript"> 
 function validacionLista(campo) {
            var valor = campo.value;
            if( valor == null || valor == 0 || valor == "0"){
                alert("El campo tiene que tener una opción seleccionada");
                campo.focus();
                return false;
            }
            return true;
        }
</script>
<h1>Dar de baja mi usuario</h1>

<form method="POST" action="darBaja.php">
                <?php
                //LISTAR LOS PLATOS EXISTENTES.
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

                        #escribimos la sentencia MYSQL
                        #escribimos la sentencia MYSQL
                        $usuario=$_SESSION['k_username'];
        $sentenciaMYSQL="SELECT `cod-usuario` FROM $tabla WHERE `email`='$usuario'";

        #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
        $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
        
        if($sentencia){
            if(mysqli_affected_rows($conectar)>0){
                while($registro=mysqli_fetch_row($sentencia)){
                    foreach ($registro as $clave){
                        $codigoUsuario=$clave;
                }
               }       
            }
        }
        else{
            print"<br>No ha podido generar una reserva en la tabla $tabla.<br>"; 
            print"<i>Error: </i>".mysqli_error($conectar);
            exit();
        }
        echo '<h3>Si quieres darte de baja, pincha en "Dar de Baja".</h3>';
        echo '<input type="hidden" name="codigoUsuario" value="'.$codigoUsuario.'"/>';
        #cerramos la conexion con la base de datos y comprobamos si da errores.
        if(!mysqli_close($conectar)){
            print"<br>No ha podido cerrarse la conexion, mediante procesos, con el servidor de bases de datos. <br>."; 
        }
        
        ?>
           
        <input type="submit" name="enviar" value="Dar de baja" />
</form>

<body>

     
    <?php
}
else{//si se ha enviado

        #incluimos unas variables con el nombre de la tabla
        $codUsuario=$_REQUEST['codigoUsuario'];
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
        $sentenciaMYSQL="DELETE FROM $tabla WHERE `cod-usuario` = '$codUsuario'";

        #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
        $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
        if($sentencia){
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>Se ha eliminado el usuario de la tabla $tabla.</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"history.back(-1)\" />";
            print "</div>";
        session_destroy();
            
        }
        else{
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>No ha podido eliminar el usuario en la tabla $tabla.</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"history.back(-1)\" />";
            print "</div>";
            exit();
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
<script>
