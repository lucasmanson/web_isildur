<?php
session_start();
require_once('/var/www/html/conexiones.php');
?>
<html lang="en">
<head>
    <title>Panel Principal</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/principal.css">
	<script>
	$(document).ready(function(){
  		$("#boton_box_izq_1").click(function(){
    		$.ajax({url:"pantallas/get_procesos.php",success:function(result){
      		$("#box_medio_todo").html(result);
	    }});
	  });
	});
	
	$(document).ready(function(){
  		$("#boton_box_izq_2").click(function(){
    		$.ajax({url:"pantallas/get_procesos2.php",success:function(result){
      		$("#box_medio_todo").html(result);
	    }});
	  });
	});
	</script>
</head>
<body>
	<div id="contenido_izq">
		<div id="box_izquierdo_todo">
			<p id="boton_box_izq_1" > 1. Ver Procesos </p>
			<p id="boton_box_izq_2" > 2. Crear Proceso </p>
		</div>
		<div id="box_medio_todo"></div>
		<div id="box_derecho_todo"></div>
	</div>
</body>
</html>
