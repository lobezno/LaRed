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
			$idusuario = $_SESSION['idusuario'];
			//	Usuario Autentificado
			?>

	<ul>
		<ol>
			<li><a href='#'><?php echo $user; ?></a></li>
			<li><a href='../view/profile.php'>Perfil</a></li>
			<li><a href='../view/logout.php'>Logout</a></li>
		</ol>
	</ul>
	<section>
		<div id="insertarPost">
			<form method="post" action="../controller/controladorPosts.php?action=send">
				<textarea cols="50" rows="5" name="post"></textarea>
				<input type="hidden" name="user" value="<?php echo $idusuario; ?>">
				<input type="submit" >
			</form>
		</div>	
	</section>
	<section>
	<h3>Mis posts</h3>
		<?php 
			require_once('../controller/controladorPosts.php');
			$registros = ControladorPosts::volcar($idusuario);
			if (count($registros) > 0) {
			foreach ($registros as $registro){
				print("<div id='" . $registro['idpost'] . "'>");
				print("<p>" . $registro['post'] . "</p>");
				print("<footer>Por " . $registro['usuario'] ." el " . $registro['fecha'] . "</footer>");
				print("</div>");
			}
			unset($registro);
			}else{
				print("<p>No tienes actividad reciente. Por que no posteas algo?</p>");
			}

		 ?>
	</section>
	<section>
	<h3>Posts de mis amigos</h3>
		<?php 
			$postsAmigos = ControladorPosts::postsAmigos($idusuario);
			if (count($postsAmigos) > 0) {
				foreach ($postsAmigos as $post) {
					print("<div id='" . $post['idpost'] . "'>");
					print("<p>" . $post['post'] . "</p>");
					print("<footer>Por " . $post['usuario'] ." el " . $post['fecha'] . "</footer>");
					print("</div>");
				}
				unset($post);
			}else{
				print("<p>No tienes actividad de tus amigos :(</p>");
			}
			

		 ?>
	</section>
	


			<?php
		}
		else if(@$_SESSION['fail']){
			//	codigo de fail autentificando

			?>

			<h1>Fail</h1>
			<p><a href="../view/login.php">Log In</a></p>
			<p><a href="../view/signin.php">Registrar</a></p>


			<?php


		}else{
			//	codigo de la primera visita
			?>

		<h1>Primera visita</h1>
		<p><a href="../view/login.php">Log In</a></p>
		<p><a href="../view/signin.php">Registrar</a></p>

			<?php
		}
	
	?>

	
</body>
</html>