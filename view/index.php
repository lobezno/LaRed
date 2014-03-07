<?php session_start(); ?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>LaRed - Index</title>
	<link rel="stylesheet" href="../resources/css/pruebas.css">
</head>
<body>
	<div id="wrapper_total">
	<?php 	
			// Modulo para comprobar la autenticacion del usuario
			include_once('../controller/acceso.php');

			// Carga de controladores
			require_once('../controller/controladorUsuarios.php');
			require_once('../controller/controladorPosts.php');
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
			<?php 
			$posts = ControladorPosts::actividadReciente();
			if (count($posts)>0){
				foreach ($posts as $post) {
					print("<article>");
					print("<p>" . $post['post'] . "</p>");
					print("<p>Likes: " . $post['likes'] . "</p>");
					ControladorUsuarios::atri($post);
					print("<span><a href='../controller/controladorPosts.php?action=like&id=" . $post['idpost'] . "&idusuario=" . $idusuario ."'>Me gusta!</a></span>");
					print("</article>");
					}
			}else{
				print("<p>No hay actividad reciente. Esto est&acute; muerto</p>");
			}
			 ?>
		</section>
		<section id="misPost">
			<h3>Mis posts</h3>
			<?php 
			$registros = ControladorPosts::volcar($idusuario);
			if (count($registros) > 0) {
			foreach ($registros as $registro){
				print("<article class='post' id='" . $registro['idpost'] . "'>");
				print("<p>" . $registro['post'] . "</p>");
				ControladorUsuarios::atri($post);
				print("</article>");
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
					print("<article class='postAmigo' id='" . $post['idpost'] . "'>");
					print("<p>" . $post['post'] . "</p>");
					ControladorUsuarios::atri($post);
					print("</article>");
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
			$amigos = ControladorUsuarios::misAmigos($idusuario);
			if (count($amigos) > 0) {
				foreach ($amigos as $amigo) {
					print("<article>");
					print("<p><a href='../view/user.php?id=" . $amigo['idusuario'] . "'>" . $amigo['usuario'] ."</a></p>");
					print("</article>");
				}	
				unset($amigo);
			}else{
				print("<p>No tienes  amigos :(((</p>");
			}
			 ?>
		</section>
		<section>
			<h3>Mejores Posts</h3>
			<?php 
			$topPosts = ControladorPosts::masVotados();
			if (count($topPosts) > 0) {
				foreach ($topPosts as $post) {
					print("<article>");
					print("<p>" . $post['post'] . "</p>");
					print("<p>Likes: " . $post['likes'] . "</p>");
					ControladorUsuarios::atri($post);
					print("</article>");
				}
				unset($post);
			}else{
				print("<p>No hay suficientes posts con votos.</p>");
			}

			 ?>
		</section>

		<section>
			<h3>Busca Gente</h3>
			<form>
				<input type="text" placeholder='Introduce el nombre de usuario  a buscar'>
				<input type="button" value="Buscar">
			</form>
		</section>
	</div>
</body>
</html>