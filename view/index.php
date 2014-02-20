<?php session_start(); ?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>LaRed - Index</title>
</head>
<body>
	

	<?php
	// Modulo para comprobar la autenticacion del usuario

		if (isset($_SESSION['usuario-validado'])) {
			$user = $_SESSION['usuario-validado'];
			//	Usuario Autentificado
			print("usuario validado: " . $user);
			?>

	<ul>
		<ol>
			<li><a href='#'>TU Nombre</a></li>
			<li><a href='#'>Perfil</a></li>
			<li><a href='#'>Logout</a></li>
		</ol>
	</ul>
	<div id="insertarPost">
		<form>
			<textarea cols="50" rows="5"></textarea>
		</form>
	</div>


			<?php
		}
		else if(isset($user)){
			//	codigo de fail autentificando
			print("fail autentificando de " . $user);
			?>

			<h1>Fail</h1>



			<?php


		}else{
			//	codigo de la primera visita
			print("primera visita");
			?>

		<h1>Primera visita</h1>



			<?php
		}
		
	?>

	
</body>
</html>