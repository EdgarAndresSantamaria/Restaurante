<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
</head>
<body>
 <?php 
 function mostrarMenu(){
 if (!(isset($_SESSION['k_username']))) {
					//si cualquiera...
                       echo'<li><a href="index.php">Inicio<br /></a></li>
                            <li><a href="cocina.php">Cocina<br /></a></li>		
                            <li><a href="restaurante.php">Restaurante<br /></a></li>		
                            <li><a href="contacto.php">Contacto<br /></a></li>' ;
                    }
                    else{if($_SESSION['k_username']=='admin@puzzle.com'){
						//si administrador...admin@puzzle.com
						echo'<li><a href="administrador.php">Administrador<br /></a></li>';
						echo'<li><a href="cocina.php">Cocina<br /></a></li>';	
						}
						else{
						//si usuario... 
						echo'<li><a href="index.php">Inicio<br /></a></li>
								<li><a href="cocina.php">Cocina<br /></a></li>		
								<li><a href="restaurante.php">Restaurante<br /></a></li>		
								<li><a href="contacto.php">Contacto<br /></a></li>' ;
						echo '<li><a href="reserva.php">Reserva<br /></a></li>';
						}
                    } 
 }					
            ?>
</body>
</html>