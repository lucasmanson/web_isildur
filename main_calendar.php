<?php 
	if (session_status() == PHP_SESSION_NONE) { session_start();}
	if (!isset($_SESSION['autenticado'])) { header('Location: index.php'); }
	if ($_SESSION['autenticado'] == "NO" ) { header('Location: index.php'); }
	require_once('calendar.php');
	require_once('conexiones.php');
	
	$bd2 = new conexiones();
	$bd2->conectar();
	
	if (!isset($_SESSION['anio'])) { $_SESSION['anio'] = 2014; }
	
	if (!isset($_SESSION['mes'])) { $_SESSION['mes'] = 3; }
	
	if (isset($_GET['mes'])) { $_SESSION['mes'] = $_GET['mes']; }
	if (isset($_GET['proceso'])) { $_SESSION['proceso_seleccionado'] = $_GET['proceso']; }
	if (!isset($_SESSION['proceso_seleccionado'])) { $_SESSION['proceso_seleccionado'] = 0; }
	
	$idusuario = $_SESSION['idusuario'];
	$procesos = $bd2->get_procesos($idusuario);
	
	$procesos_ejecutados = $bd2->dias_de_procesamiento_por_proceso($_SESSION['proceso_seleccionado'], $_SESSION['mes'],2014);
?>
			<table cellspacing="0">
			<?php
				$mes = $bd2->get_meses($_SESSION['mes'], $_SESSION['anio']);
				$dia_arranque = $mes[3];
				$ultimo_dia = $mes[5];
				$nombre_mes = $mes[1];
				$numero_mes = $mes[4];
				?>			
				<h1 id="mes"> <?php echo $nombre_mes; ?> </h1>
				<div id="div_listbox">	
				<select name="sometext" size="9" id="listbox" name="listbox" onchange="submitForm();" onfocus="this.selectedIndex = -1;">
				<?php
				if ( $_SESSION['proceso_seleccionado'] == 0 ) { $cont = 0; }
				foreach ($procesos as $valor ) 
				{
					if ( $cont == 0 && $_SESSION['proceso_seleccionado'] == 0 ) 
					{ 
						echo "<option selected=\"true\">".$valor[0]."- ".$valor[1]."</option>"; 
						$_SESSION['proceso_seleccionado'] = $valor[0]; 
					}
					else 
					{ 
						if ( $valor[0] == $_SESSION['proceso_seleccionado'] )
						{
							echo "<option selected=\"true\">".$valor[0]."- ".$valor[1]."</option>"; 
						}
						else {
							echo "<option>".$valor[0]."- ".$valor[1]."</option>"; 
						}
					}
					$cont++;
				}
				?>
				</select>		
				</div>
				<thead>
					<tr>
						<th>Mon</th><th>Tue</th><th>Wed</th>
						<th>Thu</th><th>Fri</th><th>Sat</th>
						<th>Sun</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php 
						primer_fila($dia_arranque, $procesos_ejecutados);
						?>
					</tr>
					<tr>
						<?php
						 segunda_fila($dia_arranque, $procesos_ejecutados);
						?>
					</tr>
					<tr>
						<?php
						 tercer_fila($dia_arranque, $procesos_ejecutados);
						?>

					</tr>
					<tr>
						<?php
						 cuarta_fila($dia_arranque, $procesos_ejecutados);
						?>
					</tr>	
					<tr>
						<?php
						 ultima_fila($dia_arranque, $ultimo_dia, $procesos_ejecutados);
						?>
					</tr>
				</tbody>
				<tfoot>
					<th>Mon</th><th>Tue</th><th>Wed</th>
					<th>Thu</th><th>Fri</th><th>Sat</th>
					<th>Sun</th>
				</tfoot>
			</table>
	<input type="button" value="Anterior" onclick="anterior_mes( <?php echo $_SESSION['mes']; ?> )">
	<input type="button" value="Siguiente" onclick="siguiente_mes( <?php echo $_SESSION['mes']; ?> )">
	