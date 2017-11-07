<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css"> 
<link rel="shortcut icon" href="imagenes/icono.ico">  
</head>
 <?php
        $tabla="usuario";

        include "conectar.php";
//cambiar por la variable que hace refencia a la contraseña usuario

        #conexion, seleccion de tabla y verificacion de errores
        $conectar =mysqli_connect($cfg_servidor, $cfg_usuario, $cfg_password,$nombre_bd);

        if(!$conectar){
            echo "<br>No ha podido realizarse la conexion <br>";
            print "<i>Error numero</i>".mysqli_connect_errno()."<i>equivalente a:</i>".mysqli_connect_error();
            exit();
        }
         print "<h1>Lista de los usuarios y sus datos</h1><br>";
//LISTAR USUARIOS        
        #escribimos la sentencia MYSQL
        $sentenciaMYSQL="SELECT `cod-usuario`, `nombre`, `apellidos`, `email`, `telefono` FROM $tabla";

        #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
        $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
        if($sentencia){
            if(mysqli_affected_rows($conectar)>0){
                print mysqli_affected_rows($conectar)." usuario/s.<br><br>";
                 print "<div >";
                echo "<table aling=center id='tabla1'>";
                echo "<tr>";
                echo "<th>Codigo</th><th>Nombre</th><th>Apellidos</th><th>E-mail</th><th>Telefono</th>";
                echo "</tr>";
                while($registro=mysqli_fetch_row($sentencia)){
                    echo "<tr>";
                    foreach ($registro as $clave){
                        echo '<td>'.$clave.'</td>';
                    }
                    echo "</tr>";
                }
                echo "</table>";
                print "</div>";
            }
            else{
                print "<div >";
                print"La consulta de la tabla $tabla no ha producido ningun resultado.<br>"; 
                print "</div>";
            }
        }
        else{
            print "<div >";
            print"No ha podido realizarse la consulta de la tabla $tabla.<br>"; 
            print"<i>Error: </i>".mysqli_error($conectar)."<i>Codigo</i>".mysqli_connect_errno();
            print "</div>";
            exit();
        }
        #cerramos la conexion con la base de datos y comprobamos si da errores.
        if(!mysqli_close($conectar)){
            print "<div >";
            print"<h1 id='resultado'>No ha podido cerrarse la conexion, mediante procesos, con el servidor de bases de datos.</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"history.back(-1)\" />";
            print "</div>";
        }
?>