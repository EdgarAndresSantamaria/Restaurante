<?php
include("listar.php");
?>
<html>
<head>
    <link href="css/estilos.css" rel="stylesheet" type="text/css"> 
    <link rel="shortcut icon" href="imagenes/icono.ico">   
</head>
 <?php   
 print "<h1>Menu Normal - 25euros</h1><br>"; 
//LISTAR ENTRANTES         
 print"<h2>Entrante</h2>";
		listar(2,1); 
//LISTAR PRIMEROS    
 print"<h2>Primero</h2>";
		listar(2,2);      
//LISTAR SEGUNDOS   
 print"<h2>Segundo</h2>";
		listar(2,3); 
//LISTAR POSTRES     
 print"<h2>Postre</h2>";
		listar(2,4); 
?>