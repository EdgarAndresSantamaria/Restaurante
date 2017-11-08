<html>
    <head>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"> 
        <link rel="shortcut icon" href="imagenes/icono.ico">  
    </head>
    <?php
    $tabla = "plato";

    include "conectar.php";
//cambiar por la variable que hace refencia a la contraseña usuario
    #conexion, seleccion de tabla y verificacion de errores
    $conectar = mysqli_connect($cfg_servidor, $cfg_usuario, $cfg_password, $nombre_bd);

    if (!$conectar) {
        echo "<br>No ha podido realizarse la conexion <br>";
        print "<i>Error numero</i>" . mysqli_connect_errno() . "<i>equivalente a:</i>" . mysqli_connect_error();
        exit();
    }
    print "<h1>Lista de los usuarios y sus datos</h1><br>";
//LISTAR USUARIOS        
    #escribimos la sentencia MYSQL
    $sentenciaMYSQL = "SELECT `cod-plato`, `nombre-plato`, `precio`, `cod-categoria`, `cod-subcategoria` FROM $tabla";

    #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
    $sentencia = mysqli_query($conectar, $sentenciaMYSQL);
    if ($sentencia) {
        if (mysqli_affected_rows($conectar) > 0) {
            print mysqli_affected_rows($conectar) . " usuario/s.<br><br>";
            print "<div >";
            echo "<table aling=center id='tabla1'>";
            echo "<tr>";
            echo "<th>Codigo</th><th>Nombre</th><th>Precio</th><th>Categoria</th><th>Subcategoria</th>";
            echo "</tr>";
            while ($registro = mysqli_fetch_array($sentencia)) {
                echo "<tr>";
                echo"<td>" . $registro['cod-plato'] . "</td>";
                echo"<td>" . $registro['nombre-plato'] . "</td>";
                echo"<td>" . $registro['precio'] . "</td>";

                if ($registro["cod-categoria"] == 1) {
                    $tipo = "Menú Vegetariano";
                } else if ($registro["cod-categoria"] == 2) {
                    $tipo = "Menú Normal";
                } else {
                    $tipo = "Carta";
                }
                echo"<td>" . $tipo . "</td>";

                if ($registro["cod-subcategoria"] == 1) {
                    $tipo = "Entrantes";
                } else if ($registro["cod-subcategoria"] == 2) {
                    $tipo = "Primeros";
                } else if ($registro["cod-subcategoria"] == 3) {
                    $tipo = "Segundos";
                } else {
                    $tipo = "Postres";
                }
                echo"<td>" . $tipo . "</td>";
                echo '<td><form method="POST" action="modificarPlato2.php" name="form1" id="form1">'
                . '<input type="hidden" name="nombre" value="' . $registro[1] . '"/>'
                . '<button name="enviar" value="submit">Modificar</button>'
                . '</form></td>';
                echo '<td><form method="POST" action="borrarPlato.php" name="form1" id="form1">'
                . '<input type="hidden" name="nombre" value="' . $registro[1] . '"/>'
                . '<button name="enviar" value="submit">Borrar</button>'
                . '</form></td>';
                echo "</tr>";
            }
            echo "</table>";
            print "</div>";
        } else {
            print "<div >";
            print"La consulta de la tabla $tabla no ha producido ningun resultado.<br>";
            print "</div>";
        }
    } else {
        print "<div >";
        print"No ha podido realizarse la consulta de la tabla $tabla.<br>";
        print"<i>Error: </i>" . mysqli_error($conectar) . "<i>Codigo</i>" . mysqli_connect_errno();
        print "</div>";
        exit();
    }
    #cerramos la conexion con la base de datos y comprobamos si da errores.
    if (!mysqli_close($conectar)) {
        print "<div >";
        print"<h1 id='resultado'>No ha podido cerrarse la conexion, mediante procesos, con el servidor de bases de datos.</h1>";
        print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"history.back(-1)\" />";
        print "</div>";
    }
    ?>