<?php
	session_start();
	session_unset($_SESSION['autenticado']);
	$_SESSION['autenticado'] = "NO";
	session_destroy();
	session_regenerate_id();	
	header('Location: index.php');
?>