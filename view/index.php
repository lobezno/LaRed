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
			<li><a href='#'><?php echo $user; ?></a></li>
			<li><a href='#'>Perfil</a></li>
			<li><a href='#'>Logout</a></li>
		</ol>
	</ul>
	<section>
		<div id="insertarPost">
			<form method="post" action="../controller/controladorPosts.php?action=send">
				<textarea cols="50" rows="5" name="post"></textarea>
				<input type="hidden" name="user" value="<?php echo $_SESSION['idusuario']; ?>">
				<input type="submit" >
			</form>
		</div>	
	</section>
	<section>
		aqui van los posts
	</section>
	


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