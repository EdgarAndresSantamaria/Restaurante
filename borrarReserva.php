<?php
session_start();
?>
<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css"> 
<link rel="shortcut icon" href="imagenes/icono.ico">  
    <title>Borrar Reserva - Puzzle</title>
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
<script>
 function validacionLista(campo) {
                        var valor = campo.value;
                        if( valor == null || valor == 0 || valor == "0"){
                            alert("El campo tiene que tener una opción seleccionada");
                            campo.focus();
                            return false;
                        }
                        return true;
                    }
function validarTodo(){ 
            var bien=true;
            var frm = document.getElementById("form1");
            for (var i=0;i<frm.elements.length;i++)
            { 
                if(frm.elements[i].value=="" || frm.elements[i].value==0 || frm.elements[i].value==99){
                    bien=false;
                    alert("Tienes que rellenar todos los campos.");
                    frm.elements[i].focus();
                    return false;
                }  
            }
            if(bien==true){
                form1.submit();
                return true;
            }
            
}
</script>
<h1>Borrar una reserva</h1>

<form method="POST" action="borrarReserva.php" name="form1" id="form1">
                <?php
                        #incluimos unas variables con el nombre de la tabla
                        $tabla="reserva";

                        include "conectar.php";

                        #conexion, seleccion de tabla y verificacion de errores
                        $conectar =mysqli_connect($cfg_servidor, $cfg_usuario, $cfg_password,$nombre_bd);

                        if(!$conectar){
                            echo "<br>No ha podido realizarse la conexion <br>";
                            print "<i>Error numero</i>".mysqli_connect_errno()."<i>equivalente a:</i>".mysqli_connect_error();
                            exit();
                        }
#escribimos la sentencia MYSQL
         $usuario=$_SESSION['k_username'];
        #escribimos la sentencia MYSQL
        $sentenciaMYSQL="SELECT `cod-usuario` FROM usuario WHERE `email`='$usuario'";

        #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
        $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
        
        if($sentencia){
            if(mysqli_affected_rows($conectar)>0){
                while($registro=mysqli_fetch_row($sentencia)){
                    foreach ($registro as $clave){
                        $codUsuario=$clave;
                }
               }       
            }
        }
        else{
            print"<br>No ha podido generar una reserva en la tabla $tabla.<br>"; 
            print"<i>Error: </i>".mysqli_error($conectar);
            exit();
        }
        
        $sentenciaMYSQL="SELECT `cod-reserva`, `fecha` FROM $tabla WHERE `cod-usuario`='$codUsuario'";

                        #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
                        $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
                        if($sentencia){
                            if(mysqli_affected_rows($conectar)>0){
                                $totalReservas=mysqli_affected_rows($conectar);
                                print "Tenemos ".$totalReservas." reserva/s. Elige cual eliminar:<br><br>";
                                echo "Codigo Reserva:<span>*</span>";
                                echo "<select name='codReserva' onchange='validacionLista(this);'>";
                                echo "<option value='0'>Seleccione una reserva</option>";  
                                while($registro=mysqli_fetch_row($sentencia)){
                                    $cont=0;
                                    foreach ($registro as $clave){
                                        if($cont==0){
                                            echo "<option value='".$clave."'>Codigo: ".$clave;
                                            $cont++;
                                            }
                                        else{
                                            echo " / Fecha: ".$clave."</option>";
                                            $cont=0;
                                        }
                                    }
                                }
                                echo "</select>";
                                echo '<button name="enviar" onclick="return validarTodo();" value="submit">Eliminar Reserva</button>';
                               }     
                               else{
                                   echo "No dispones de reservas a tu nombre";
                               }
                        }
                        else{
                            print"<br>No ha podido mostrar ninguna reserva de la tabla $tabla.<br>"; 
                            print"<i>Error: </i>".mysqli_error($conectar);
                            exit();
                        }

                ?>
</form>

<body>

     
    <?php
}
else{//si se ha enviado

        #incluimos unas variables con el nombre de la tabla
        $codReserva=$_REQUEST['codReserva'];
        $tabla="reserva";

        include "conectar.php";

        #conexion, seleccion de tabla y verificacion de errores
        $conectar =mysqli_connect($cfg_servidor, $cfg_usuario, $cfg_password,$nombre_bd);

        if(!$conectar){
            echo "<br>No ha podido realizarse la conexion <br>";
            print "<i>Error numero</i>".mysqli_connect_errno()."<i>equivalente a:</i>".mysqli_connect_error();
            exit();
        }

        #escribimos la sentencia MYSQL
        $sentenciaMYSQL="DELETE FROM $tabla WHERE `cod-reserva` = '$codReserva'";

        #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
        $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
        if($sentencia){
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>Se ha eliminado la reserva \"$codReserva\".</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Men&uacute;\" onclick=\"history.back(-1)\" />";
            print "</div>";
        }
        else{
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>No ha podido eliminar la reserva.</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Men&uacute;\" onclick=\"history.back(-1)\" />";
            print "</div>";
            exit();
        }

        #cerramos la conexion con la base de datos y comprobamos si da errores.
        if(!mysqli_close($conectar)){
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>No ha podido cerrarse la conexion, mediante procesos, con el servidor de bases de datos.</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Men&uacute;\" onclick=\"history.back(-1)\" />";
            print "</div>";
            
        }
}
?>

    </body>
<script>
