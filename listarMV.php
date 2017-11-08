<?php
include("listar.php");
?>
<html>
<head>
    <link href="css/estilos.css" rel="stylesheet" type="text/css"> 
    <link rel="shortcut icon" href="imagenes/icono.ico">   
</head>
 <?php
 print "<h1>Menu Vegetariano - 15euros</h1><br>";
//LISTAR ENTRANTES    
 print"<h2>Entrante</h2>";     
		listar(1,1); 
//LISTAR PRIMEROS    
 print"<h2>Primero</h2>";
		listar(1,2);      
//LISTAR SEGUNDOS   
print"<h2>Segundo</h2>";
		listar(1,3); 
//LISTAR POSTRES     
print"<h2>Postre</h2>";
		listar(1,4); 
?>
    
