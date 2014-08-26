<?php
	require_once('conexiones.php');
	
	function primer_fila($dia_arranque, $procesos_ejecutados)
	{
		$dia = 1;
		$pading = 0;
		
		while ($pading < $dia_arranque)
		{
			echo '<td class="padding"></td>';
			$pading++;
		}
		
		for ($i = $dia_arranque; $i < 7; $i++)
		{
			$encontro = false;
			foreach ($procesos_ejecutados as $valor)
			{
				if ($dia == $valor[0]) { echo "<td class=\"today\"> ".$dia."</td>"; $encontro = true; }
			}
			
			if ( $encontro == false ) {	echo "<td> ".$dia."</td>"; }
			
			$dia++;
		}
	}
	
	function segunda_fila($dia_arranque, $procesos_ejecutados)
	{
		$dia = 0;
		for ($i = 8 - $dia_arranque; $dia < 7; $i++)
		{
			$encontro = false;
			
			foreach ($procesos_ejecutados as $valor)
			{
				if ($i == $valor[0]) { echo "<td class=\"today\"> ".$i."</td>"; $encontro = true; }
			}
			
			if ( $encontro == false ) {	echo "<td> ".$i."</td>"; }
			$dia++;
		}
	}
	
	function tercer_fila($dia_arranque, $procesos_ejecutados)
	{
		$dia = 0;
		for ($i = 15 - $dia_arranque; $dia < 7; $i++)
		{
			$encontro = false;
			
			foreach ($procesos_ejecutados as $valor)
			{
				if ($i == $valor[0]) { echo "<td class=\"today\"> ".$i."</td>"; $encontro = true; }
			}
			
			if ( $encontro == false ) {	echo "<td> ".$i."</td>"; }
			$dia++;
		}
	}
	
	function cuarta_fila($dia_arranque, $procesos_ejecutados)
	{
		$dia = 0;
		for ($i = 22 - $dia_arranque; $dia < 7; $i++)
		{
			$encontro = false;
			
			foreach ($procesos_ejecutados as $valor)
			{
				if ($i == $valor[0]) { echo "<td class=\"today\"> ".$i."</td>"; $encontro = true; }
			}
			
			if ( $encontro == false ) {	echo "<td> ".$i."</td>"; }
			$dia++;
		}
	}
	
	function ultima_fila($dia_arranque, $ultimo_dia, $procesos_ejecutados)
	{
		$dia = 0;
		$padding = 1;
		for ($i = 29 - $dia_arranque; $i <= $ultimo_dia; $i++)
		{
			$encontro = false;
			
			foreach ($procesos_ejecutados as $valor)
			{
				if ($i == $valor[0]) { echo "<td class=\"today\"> ".$i."</td>"; $encontro = true; }
			}
			
			if ( $encontro == false ) {	echo "<td> ".$i."</td>"; }
			$dia++;
			
			if ($dia == 7) 
			{ 
				echo "</tr>";
				$padding = 0;
			}
			$padding++;
		}
		
		while ($padding <= 7)
		{
			echo '<td class="padding"></td>';
			$padding++;
		}

	}
?>