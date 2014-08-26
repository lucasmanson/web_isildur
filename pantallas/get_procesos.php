<link rel="stylesheet" type="text/css" href="css/principal.css">
<?php
	session_start();
	require_once('../conexiones.php');
	$bd = new conexiones();
	$bd->get_procesos();
?>
