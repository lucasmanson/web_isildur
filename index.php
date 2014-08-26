<!DOCTYPE html>
<html>
	<?php 
	session_start();
	require_once('conexiones.php'); 
	//require_once('inicializar.php');
	?>
<head>
	<link rel="stylesheet" type="text/css" href="css/principal.css">
</head>
<body>
<div id="login">
<?php 
	if (isset($_SESSION['autenticado']))
	{
		if ($_SESSION['autenticado'] == 'USUARIO_AUTENTICADO')
			{
				header('Location: principal.php');
			}
		else 
		{
				echo '<div id="login-medio"><form method="post" action="login.php" autocomplete="off">';
				echo '<fieldset>';
				echo '<input name="usuario" id="usuario" autofocus required/><br>';
				echo '<input name="pass" type="password" /><br>';
				echo '</fieldset>';
				echo '<input type="submit" id="login" value="login" />';
				echo '</form></div>';
				session_regenerate_id();
		}
	}
	else 
	{
			echo "<p>Bienvenido</p><br>";
			echo '<form method="post" action="login.php" autocomplete="off">';
			echo '<input name="usuario" /><br>';
			echo '<input name="pass" type="password" /><br><br>';
			echo '<input type="submit" id="boton1" value="login" />';
			echo '</form>'; 
			?>
				<div id="mensaje_login">
				<?php 
					if (isset($_SESSION['error'])) 
					{
						if ($_SESSION['error'] == "LOGIN_FAILED")
						{
							echo "Error : ".$_SESSION["error"];
						}
						else
						{
							echo "Sin Error : ".$_SESSION["error"];
						}
					}
					?>
				</div>
				<?php
			session_regenerate_id();
	}
	echo "<br>";
	?>
</div>
</body>
</html>