<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
</head>
<body>
 <?php 
 function listar($cat,$subcat){
		$tabla="plato";
        include "conectar.php";
		//cambiar por la variable que hace refencia a la contraseña usuario
        #conexion, seleccion de tabla y verificacion de errores
        $conectar =mysqli_connect($cfg_servidor, $cfg_usuario, $cfg_password,$nombre_bd);
        if(!$conectar){
            echo "<br>No ha podido realizarse la conexion <br>";
            print "<i>Error numero</i>".mysqli_connect_errno()."<i>equivalente a:</i>".mysqli_connect_error();
            exit();
        }
		//LISTAR         
        #escribimos la sentencia MYSQL
		if($cat!=0){
			//si platos de menú.....
        $sentenciaMYSQL="SELECT `nombre-plato` FROM $tabla WHERE `cod-subcategoria`=$subcat AND `cod-categoria`=$cat";
        }else{
		    //si platos por tipo.....
		$sentenciaMYSQL="SELECT `nombre-plato`, `precio` FROM $tabla WHERE `cod-subcategoria`=$subcat";
		}
	    echo '<div id="formulario" class="margenDer">';
        #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
        $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
        if($sentencia){
            if(mysqli_affected_rows($conectar)>0){
				//si hay resultados...
                 print "<div >";
                echo "<table>";
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
				//si no hay resultados...
                print "<div >";
                print"No hay platos disponibles.<br>"; 
                print "</div>";
            }
        }
        else{
            print "<div >";
            print"Error en la busqueda.<br>"; 
            print"<i>Error: </i>".mysqli_error($conectar)."<i>Codigo</i>".mysqli_connect_errno();
            print "</div>";
            exit();
        }
 }		
 ?>
</body>
</html>