<?php session_start(); ?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>LaRed - Index</title>
	<link rel="stylesheet" href="../resources/css/pruebas.css">
</head>
<body>
<?php 	
		// Modulo para comprobar la autenticacion del usuario
		include_once('../controller/acceso.php');
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
	<section id="actividadReciente">
		<h3>Actividad Reciente</h3>
		<?php require_once('../controller/controladorPosts.php');
			$posts = ControladorPosts::actividadReciente();
			foreach ($posts as $post) {
				print("<div>");
				print("<p>" . $post['post'] . "</p>");
				print("<p>Por <a href='../view/user.php?id=" . $post['idusuario'] ."'>" . $post['usuario'] . "</a></p>");
				print("</div>");
			}

		 ?>
	</section>
	<section id="misPost">
		<h3>Mis posts</h3>
		<?php 
			$registros = ControladorPosts::volcar($idusuario);
			if (count($registros) > 0) {
			foreach ($registros as $registro){
				print("<div class='post' id='" . $registro['idpost'] . "'>");
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
					print("<div class='postAmigo' id='" . $post['idpost'] . "'>");
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
	<section>
		<h3>Mis Amigos</h3>
		<?php 
			require_once('../controller/controladorUsuarios.php');
			$amigos = ControladorUsuarios::misAmigos($idusuario);
			if (count($amigos) > 0) {
				foreach ($amigos as $amigo) {
					print("<div>");
					print("<p><a href='../view/user.php?id=" . $amigo['idusuario'] . "'>" . $amigo['usuario'] ."</a></p>");
					print("</div>");
				}	
				unset($amigo);
			}else{
				print("<p>No tienes  amigos :(((</p>");
			}
		 ?>
	</section>
	


	
</body>
</html>