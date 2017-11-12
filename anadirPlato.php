<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css"> 
<link rel="shortcut icon" href="imagenes/icono.ico"> 
<script type="text/javascript" src="js//validarDatosPlato.js"></script> 
    <title>Añadir Plato - Puzzle</title>
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
<h1>A<?php echo "&ntilde;";?>adir un plato</h1>

<form method="POST" action="anadirPlato.php" name="form1" id="form1">
    <table>
        <tr>
            <td>Nombre:<span>*</span></td>
            <td><input type="text" name="nombre" onchange="validacion(this);"/></td>
        </tr>
        <tr>
            <td>Precio:<span>*</span></td>
            <td><input type="text" name="precio" onchange="validacionEntero(this);"/></td>
        </tr>
        <tr>
            <td>Categoria:<span>*</span></td>
            <td>
                <select name="codCategoria" onchange="validacionLista(this);">
                    <option value="0"> Seleccione una Categoria</option>
                    <option value="1"> Menu Vegetariano</option>
                    <option value="2"> Menu Normal</option>
                    <option value="3"> Carta</option>                 
                </select>   
            </td>
        </tr>
        <tr>
            <td>Subcategoria:<span>*</span></td>
            <td>
                <select name="codSubcategoria" onchange="validacionLista(this);">
                    <option value="0"> Seleccione una Subcategoria</option>
                    <option value="1"> Entrates</option>
                    <option value="2"> Primeros</option>
                    <option value="3"> Segundos</option>   
                    <option value="4"> Postres</option>   
                </select>   
            </td>
        </tr>
        <tr>
            <td><button name="enviar" onclick="return validarTodo();" value="submit">A<?php echo "&ntilde;";?>adir Plato</button></td>
            <td></td>
        </tr>
    </table>
</form>
<body>
<center>
    <?php
}
else{//si se ha enviado
        #incluimos unas variables con el nombre de la tabla
        $nombrePlato=$_REQUEST['nombre'];
        $precio=$_REQUEST['precio'];
        $codCategoria=$_REQUEST['codCategoria'];
        $codSubcategoria=$_REQUEST['codSubcategoria'];
        $tabla="plato";

        include "conectar.php";

        #conexion, seleccion de tabla y verificacion de errores
        $conectar =mysqli_connect($cfg_servidor, $cfg_usuario, $cfg_password,$nombre_bd);

        if(!$conectar){
            echo "<br>No ha podido realizarse la conexion <br>";
            print "<i>Error numero</i>".mysqli_connect_errno()."<i>equivalente a:</i>".mysqli_connect_error();
            exit();
        }

        #escribimos la sentencia MYSQL
        $sentenciaMYSQL="INSERT INTO $tabla 
                (`cod-plato`, `nombre-plato`, `precio`, `cod-categoria`, `cod-subcategoria`) 
                VALUES (NULL, '$nombrePlato', '$precio', '$codCategoria', '$codSubcategoria')";

        #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
        $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
        if($sentencia){
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>Se ha añadido un plato nuevo en la tabla $tabla.</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"history.back(-1)\" />";
            print "</div>";
        }
        else{
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>No ha podido añadir un plato en la tabla $tabla.</h1>";
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
    </center>
</body>
<script>