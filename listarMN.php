<?php
include("listar.php");
?>
<html>
<head>
    <link href="css/estilos.css" rel="stylesheet" type="text/css"> 
    <link rel="shortcut icon" href="imagenes/icono.ico">   
</head>
 <?php     
//LISTAR ENTRANTES         
		listar(2,1); 
//LISTAR PRIMEROS    
		listar(2,2);      
//LISTAR SEGUNDOS   
		listar(2,3); 
//LISTAR POSTRES     
		listar(2,4); 
?>