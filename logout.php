<html>
<head>
<link href="css/estilos.css" rel="stylesheet" type="text/css"> 
<link rel="shortcut icon" href="imagenes/icono.ico">  
    <title>Salir - Restaurante Puzzle</title>
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
<body>
    <?php session_start();
// Borramos toda la sesion
session_destroy();
?>
<SCRIPT LANGUAGE="javascript">
location.href = "index.php";
</SCRIPT>
</body>
</html>