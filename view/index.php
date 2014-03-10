<?php session_start(); ?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>LaRed - Index</title>
	<link rel="stylesheet" href="../resources/css/estructura.css">
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
	<script type="text/javascript" src="../resources/js/enviarAjax.js"></script>
	<script type="text/javascript" src="../resources/js/meGusta.js"></script>
</head>
<body>
		<?php 	
				// Modulo para comprobar la autenticacion del usuario
				include_once('../controller/acceso.php');

				// Carga de controladores
				require_once('../controller/controladorUsuarios.php');
				require_once('../controller/controladorPosts.php');
					//	Usuario Autentificado
					?>
		<div id="menu">
			<nav>
					<ul>
							<li><a href='#'><?php echo $user; ?></a></li>
							<li><a href='../view/profile.php'>Perfil</a></li>
							<li><a href='../view/logout.php'>Logout</a></li>
					</ul>
			</nav>
		</div>
	<header id="cabecera">
	Header - La Red
	</header>

	<div id="wrapper_total">
			<section id="insertarPost">
				<article>
					<form method="post">
						<textarea cols="50" rows="5" name="post" id='post'></textarea>
						<input type="hidden" id='user' name="user" value="<?php echo $idusuario; ?>">
						<input type="file"  name="imagen" id="imagen">
						<input type="button" value="Enviar post" onclick="enviar()" />
					</form>
				</article>	
			</section>
			<div class="wrapper_left">
				<section id="misPost">
					<h3>Mis posts</h3>
			<?php 
				$registros = ControladorPosts::misPosts($idusuario);
				if (count($registros) > 0) {
				foreach ($registros as $registro){
					print("<article class='post' id='" . $registro['idpost'] . "'>");
					print("<header></header>");
					print("<p>" . $registro['post'] . "</p>");
					print("<footer>" . ControladorUsuarios::atri($registro) . "</footer>");
					print("</article>");
				}
				unset($registro);
				}else{
					print("<p>No tienes actividad reciente. Por que no posteas algo?</p>");
				}
				 ?>

				</section>
				<section id="postsAmigos">
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
			</div>
			<div class="wrapper_right">
				<section id="actividadReciente" class="derecha">
					<h3>Actividad Reciente</h3>
			<?php 
				$posts = ControladorPosts::actividadReciente();
				if (count($posts) > 0){
					foreach ($posts as $post) {
					?>
						<article class="post">
							<header><?php echo $post['fecha']; ?></header>
							<div id="post_contenido">
								<div class="post_imagen">
									<figure><img class="imagen_preview" src="../resources/images/background_tile7.jpg" alt=""></figure>
								</div>
								<div class="post_texto">
									<div class="contenido_izquierda"><img src="../resources/images/comi.png" alt=""></div>
									<div class="contenido_derecha"><img src="../resources/images/comi2.png" alt=""></div>
									<div class="contenido_centro"><p><?php echo $post['post']; ?></p></div>	
								</div>				
							</div>
							
							<footer class="post_footer">
								<div class="likes">
									Likes: <?php echo $post['likes']; ?>
									<button id="post<?php echo $post['idpost']; ?>" onclick='meGusta(<?php echo $idusuario; ?>,<?php echo $post['idpost']; ?>)'>Me Gusta</button>
								</div>
								<div class="atri">
									<span>Por <a href="../view/user.php?id=<?php echo $post['idusuario'];?>"><?php echo $post['usuario'] ?></a><img class='avatar_mini' src="../view/imagen.php?id=<?php echo $post['idusuario']; ?>" /></span>
								</div>
							</footer>
							
							
						</article>
					<?php
						}
						unset($post);
				}else{
					print("<p>No hay actividad reciente. Esto est&acute; muerto</p>");
				}
				 ?>


				</section>
				<section class="derecha" id="mejoresPosts">
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
			</div>
	</div>
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
				<h3>Busca Gente</h3>
				<form>
					<input type="text" placeholder='Introduce el nombre de usuario  a buscar'>
					<input type="button" value="Buscar">
				</form>
			</section>
</body>
</html>