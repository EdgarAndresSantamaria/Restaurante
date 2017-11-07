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
		listar(0,1); 
//LISTAR PRIMEROS    
		listar(0,2);      
//LISTAR SEGUNDOS   
		listar(0,3); 
//LISTAR POSTRES     
		listar(0,4); 
?>