<!DOCTYPE html>
<html lang="en">
<head>
<title>Panel Principal</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/principal.css">
	
	<script type="text/javascript">
	$(document).ready(function(){
  		$("#button2").click(function(){
    		$.ajax({url:"pantallas/inicio.php",success:function(result){
      		$("#controlizq").html(result);
	    }});
	  });
	});

	$(document).ready(function()
	{
	  $("#button2").click(function(){
  			$("#contenido_izq").toggle();
		});
	});
	</script>
	
</head>
<body>
	<div id="linea"></div>

	<div id="opciones">
		<div id="button2"></div>
	</div>
	
	<div id="controlizq">
		<?php
			include('pantallas/inicio.php');
		?>
	</div>
	
	<div id="footer"><p>So, if you want the execution to go on and show users the output, even if the include file is missing, use the include statement. Otherwise, in case of FrameWork</p></div>
</body>
</html>
