<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css"> 
<link rel="shortcut icon" href="imagenes/icono.ico">  
    <title>Borrar Usuario - Puzzle</title>
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
<h1>Borrar un usuario</h1>

<form method="POST" action="borrarUsuario.php" name="form1" id="form1">
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
                        $sentenciaMYSQL="SELECT `nombre` FROM $tabla";

                        #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
                        $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
                        if($sentencia){
                            if(mysqli_affected_rows($conectar)>0){
                                $totalUsuarios=mysqli_affected_rows($conectar)-1;
                                print "Tenemos ".$totalUsuarios." usuario/s. Elige cual eliminar:<br><br>";
                                echo "Nombre:<span>*</span>";
                                echo "<select name='nombre' onchange='validacionLista(this);'>";
                                echo "<option value='0'>Seleccione el usuario</option>";  
                                while($registro=mysqli_fetch_row($sentencia)){
                                    foreach ($registro as $clave){
                                        if($clave!='adminPuzzle')
                                            echo "<option value='".$clave."'>".$clave."</option>";
                                    }
                                }
                                echo "</select>";
                                echo'<button name="enviar" onclick="return validarTodo();" value="submit">Eliminar Usuario</button>';
                               }
                              else{
                                  echo"No existen usuarios registrados en la Base de Datos";
                              }
                               
                            
                        }
                        else{
                            print"<br>No ha podido mostrar usuario.<br>"; 
                            print"<i>Error: </i>".mysqli_error($conectar);
                            exit();
                        }

                        #cerramos la conexion con la base de datos y comprobamos si da errores.
                        if(!mysqli_close($conectar)){
                            print"<br>No ha podido cerrarse la conexion, mediante procesos, con el servidor de bases de datos. <br>."; 
                        }
                ?>
          
</form>

<body>

     
    <?php
}
else{//si se ha enviado

        #incluimos unas variables con el nombre de la tabla
        $nombreUsuario=$_REQUEST['nombre'];
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
        $sentenciaMYSQL="DELETE FROM $tabla WHERE `nombre` = '$nombreUsuario'";

        #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
        $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
        if($sentencia){
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>Se ha eliminado el usuario \"$nombreUsuario\" de la tabla $tabla.</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"history.back(-1)\" />";
            print "</div>";
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
