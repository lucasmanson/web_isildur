<?php
	class conexiones
	{
		public $conexion;
		
		public function conectar()
		{
			$conexion = mysql_connect('localhost', 'lukas', 'lukas', 'test');
				if (!$conexion) { die('No pudo conectarse: ' . mysql_error()); }
		}
		
		public function get_procesos()
		{
			$this->conectar();
			
			$resultado = mysql_query("
			select test.procesos.nombre, test.procesos.directorio from test.procesos 
			inner join test.usuarios on 
			test.usuarios.idusuarios = test.procesos.idusuario
			where test.usuarios.usuario = '".$_SESSION['usuario']."'
			"); 
							
			if (!$resultado) {
			echo 'No se pudo ejecutar la consulta: ' . mysql_error();
				exit; }

			$cont = 0;
			
			while( $row = mysql_fetch_array($resultado, MYSQL_NUM) ) 
			{
				$mensaje_shell = shell_exec('cat '.$row[1]);
				$mensaje_shell = trim(str_replace("\n","<br>",str_replace("$mensaje_shell/","",str_replace(".cfg","",$mensaje_shell))));
				
				echo '
				<script>
				$(document).ready(function(){
					  $("#titulo_proceso_'.$cont.'").click(function(){
							$("#base_proceso_'.$cont.'").toggle();
						});
					});
				</script>
				';
				echo '<div id="titulo_proceso_'.$cont.'" style="cursor: pointer;">';
					echo '<h1>'.$row[0].' -> '.$row[1].' -- </h1>';
				echo '</div>';
				echo '<div id="base_proceso_'.$cont.'">';
					echo '<p>'.$mensaje_shell.' </p>';
				echo '</div>';
				$cont++;
			}
			
			return true;
		}
		
		public function autenticar($user, $pass)
		{
			$resultado = mysql_query("SELECT * FROM test.usuarios where usuario = '$user'");
			
			if (!$resultado) {
			echo 'No se pudo ejecutar la consulta: ' . mysql_error();
				exit; }
			
			$fila = mysql_fetch_row($resultado);
			
			if ($fila == null) 
			{
				echo "Usuario Incorrecto.";
				unset($_SESSION['autenticado']);
				if (!isset($_SESSION['autenticado'])) { $_SESSION['autenticado'] = "USUARIO_NO_AUTENTICADO"; } 
				return false;
			}
			else 
				{
					if (($fila[1] == $user ) AND ($fila[2] == $pass ))
						{
							unset($_SESSION['autenticado']);
   							if (!isset($_SESSION['autenticado'])) { $_SESSION['autenticado'] = "USUARIO_AUTENTICADO"; }
							if (!isset($_SESSION['usuario'])) { $_SESSION['usuario'] = $user; }
							if (!isset($_SESSION['idusuario'])) { $_SESSION['idusuario'] = $fila[0]; }
							return true;
						}
					else {
							echo "Contraseña Incorrecta.";
							unset($_SESSION['autenticado']);
   							if (!isset($_SESSION['autenticado'])) { $_SESSION['autenticado'] = "USUARIO_NO_AUTENTICADO"; }
							return false;
						}					
				}
		}
	}
?>
