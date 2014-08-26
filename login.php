<?php
	session_start();
	require_once('conexiones.php');
	
	$bd = new conexiones();
	$bd->conectar();
	
	if (!isset($_SESSION['conexion'])) { $_SESSION['conexion'] = $bd; }
	
	$user = $_POST['usuario'];
	$pass = $_POST['pass'];
	
	if (strlen($user) > 8) {
		$_SESSION['autenticado']="USUARIO_NO_AUTENTICADO";
		$_SESSION['error'] = "LOGIN_FAILED"; 
		header('Location: index.php');
	}
	
	$auth = $bd->autenticar($user,$pass);
	
	if ($auth) { header('Location: index.php');  }
	else { header('Location: unlogin.php'); }
?>
