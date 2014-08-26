<?php
	if (!isset($_SESSION['autenticado']) || ($_SESSION['autenticado'] == 'USUARIO_NO_AUTENTICADO'))
	{
		$_SESSION['error'] = 0;
	}
?>