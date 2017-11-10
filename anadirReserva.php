<?php
session_start();
?>
<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css"> 
<link rel="shortcut icon" href="imagenes/icono.ico">  
    <title>Añadir Reserva - Puzzle</title>
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
<SCRIPT language="JavaScript" type="text/javascript"> 
function validacion(campo) {
            var valor = campo.value;
            if( valor == null || valor.length==0 ){
                alert("El campo no puede estar vacío");
                campo.focus();
                return false;
            }
            return true;
        }
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
                if(frm.elements[i].value=="" || frm.elements[i].value==99){
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
 window.onload=mostrarDias();
function mostrarDias(){
    var dias28 = new Array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28');
    var dias31 = new Array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
    var dias30 = new Array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30');
    
    var i = document.form1.mes.selectedIndex;
    
    var x = document.getElementById("dia");
    //Borrar lista
    for(var k=0;k<=31;k++){
       x.remove(x[k]);        
    }
    
    switch(i){
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            var eleccion= dias31;
            //rellenar lista
            for(var j=0;j<eleccion.length;j++){
                    var opcion = document.createElement("option");
                    if(j<9){
                        opcion.text = "0"+eleccion[j];
                        opcion.text = "0"+eleccion[j];
                    }
                    else{
                        opcion.text = eleccion[j];
                        opcion.value = eleccion[j];
                    }
                    x.add(opcion,x[j]);

            }
            break;
        case 2:
            var eleccion= dias28;
            for(var j=0;j<eleccion.length;j++){
                    var opcion = document.createElement("option");
                    if(j<9){
                        opcion.text = "0"+eleccion[j];
                        opcion.text = "0"+eleccion[j];
                    }
                    else{
                        opcion.text = eleccion[j];
                        opcion.value = eleccion[j];
                    }
                    x.add(opcion,x[j]);

            }
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            var eleccion= dias30;
            for(var j=0;j<eleccion.length;j++){
                    var opcion = document.createElement("option");
                    if(j<9){
                        opcion.text = "0"+eleccion[j];
                        opcion.text = "0"+eleccion[j];
                    }
                    else{
                        opcion.text = eleccion[j];
                        opcion.value = eleccion[j];
                    }
                    x.add(opcion,x[j]);

            }
            break;
        case 0:
                    var opcion = document.createElement("option");
                    opcion.text = "Dia";
                    opcion.value = "0";
                    x.add(opcion);

               break;
        default:
            document.write("Se ha producido un error en el listado para la fecha");
            break;
    }
    var f=new Date();
    
    document.form1.dia.selectedIndex=f.getDate()-1;
} 
</script>
<h1>Hacer una reserva</h1>


<form method="POST" action="anadirReserva.php" name="form1" id="form1">
    <table>
       
        <tr>
            <td>Fecha:<span>*</span></td>
            <td>
                <select name="anio" onchange="validacionLista(this);">
                <?php
                $anioHoy=date("Y");
                        for($i=2014;$i<=2050;$i++){
                            if($i==$anioHoy){
                                echo '<option value='.$i.' selected=""> '.$i.'</option>';
                            }
                            else
                                echo '<option value='.$i.'> '.$i.'</option>';
                        }
                    ?> 
                </select>  
                <b>/</b>
                
                <select name="mes" onchange="mostrarDias();">
                    <option value="99">Mes</option>
                   
                <?php
                $mesHoy=date("m");
                        for($i=1;$i<=12;$i++){
                            if(strlen($i)==1){
                                if($i==$mesHoy)
                                     echo '<option value=0'.$i.' selected="">0'.$i.'</option>';
                                else
                                    echo '<option value=0'.$i.'>0'.$i.'</option>';
                                }
                            else{
                                if($i==$mesHoy)
                                    echo '<option value='.$i.' selected> '.$i.'</option>';
                                else
                                    echo '<option value='.$i.'> '.$i.'</option>';
                            }
                                
                        }
                    ?> 
                 
                </select> 
                <b>/</b>
                
                <select name="dia" id="dia" onchange="validacionLista();">
                    <option value="99" >Dia</option>
                </select> 
            </td>
        </tr>
        <tr>
            <td>Horario:<span>*</span></td>
            <td>
                <select name="hora" onchange="validacionLista(this);">
                    <option value="99">Horario</option>
                    <option value="Comida">Comida</option>
                    <option value="Cena">Cena</option>
                </select>  
                
            </td>
        </tr>
        <tr>
            <td>Numero de personas:<span>*</span></td>
            <td>
                <select name="personas" onchange="validacionLista(this);">
                    <option value="99"> Personas</option>
                    <?php
                        for($i=1;$i<=50;$i++){
                        echo '<option value='.$i.'> '.$i.'</option>';
                        }
                    ?>       
                </select>   
            </td>
        </tr>
            <td><button name="enviar" onclick="return validarTodo();" value="submit">Hacer Reserva</button></td>
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
        $anio=$_REQUEST['anio'];
        $mes=$_REQUEST['mes'];
        $dia=$_REQUEST['dia'];
        
        $horario=$_REQUEST['hora'];
        
        $numPersonas=$_REQUEST['personas'];
        
        $tabla="reserva";

        $fecha="$anio-$mes-$dia";
        
        include "conectar.php";

        #conexion, seleccion de tabla y verificacion de errores
        $conectar =mysqli_connect($cfg_servidor, $cfg_usuario, $cfg_password,$nombre_bd);

        if(!$conectar){
            echo "<br>No ha podido realizarse la conexion <br>";
            print "<i>Error numero</i>".mysqli_connect_errno()."<i>equivalente a:</i>".mysqli_connect_error();
            exit();
        }
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
        $sentecia2MYSQL="SELECT * FROM `reserva` WHERE fecha='$fecha' and horario='$horario'";
        $sentencia2=  mysqli_query($conectar,$sentecia2MYSQL);
        if($sentencia2){
                   $aforo=0;
                   while($registro=  mysqli_fetch_array($sentencia2)){
                       $aforo+=$registro["num-personas"];
                   }
           }
           else{
               print"<br>No ha podido realizarse la consulta de la tabla $tabla.<br>"; 
               print"<i>Error: </i>".mysqli_error($conectar)."<i>Codigo</i>".mysqli_connect_errno();
               exit();
           }
           //Controlamos el numero máximo de personas a la vez
        $numPersonasMaximo=50;
        $restoPersonas=$numPersonasMaximo-$aforo;
        if($numPersonas>$restoPersonas){
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>No quedan tantos sitios disponibles, puedes meter un máximo de '.$restoPersonas</h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"history.back(-1)\" />";
            print "</div>";
        
            
        }
        else{
                   #escribimos la sentencia MYSQL
        $sentenciaMYSQL="INSERT INTO $tabla 
                (`cod-reserva`, `cod-usuario`, `fecha`, `horario`, `num-personas`) 
                VALUES (NULL, '$codUsuario', '$fecha', '$horario','$numPersonas')";

        #tenemos completa la sentencia MYSQL solo falta ejecutarla crear la conexion y ejecutarla
        
        $sentencia=  mysqli_query($conectar,$sentenciaMYSQL);
        if($sentencia){
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>Se ha a&ntilde;adido una reserva nueva </h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Men&uacute;\" onclick=\"history.back(-1)\" />";
            print "</div>";
        }
        else{
            print "<div id='contenedor'>";
            print"<h1 id='resultado'>No ha podido a&ntilde;adir una reserva </h1>";
            print"<input id='atras' type=\"button\" value=\"Volver al Men&uacute;\" onclick=\"history.back(-1)\" />";
            print "</div>";
            exit();
        }
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