<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
</head>
<body>
 <?php 
 function mostrarLogin(){
			if (isset($_SESSION['k_username'])) {
				//si esta logeado...
				echo 'Bienvenido, ';
				echo '<b>'.$_SESSION['k_username'].'</b>.';
				echo '<p><a href="logout.php">Logout</a></p>';
           }else{
			   //si no esta logeado...
				echo '<form action="validar_usuario.php" method="post" id="login">
                    Email:<input type="text" name="email" size="20" maxlength="30" onchange="validaEmail(this);"/>
                    <br />
                    Password:<input type="password" name="password" size="15" maxlength="10" onchange="validaPass1(this);" />
                    <br />
                    <input type="submit" value="Ingresar" />
                    </form>';
				echo '<p><a href="registrar.php">Registrar</a></p>';
			}
 }
 ?>
</body>
</html>