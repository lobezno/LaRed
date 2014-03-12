<?php if(!isset($_SESSION)){ session_start(); }  
			require_once('../controller/acceso.php');
			require_once('../controller/controladorUsuarios.php');
			require_once('../controller/controladorPosts.php');

?>		
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LaRed - Perfil - <?php echo $user; ?></title>
	<link rel="stylesheet" href="../resources/css/estructura.css">
	<link rel="stylesheet" href="../resources/css/calendario.css">
	<script type="text/javascript" src="../resources/js/calendario.js"></script>
</head>
<body>
	<div id="menu">
			<nav>
					<ul>
							<li><a href="../view/index.php">Volver</a></li>
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
		<section class="perfil">
			<h3>Perfil</h3>
			<section id="calendario">
		<div class="postit_oculo" id="postit">
			</div>
			<article id="contenedor_calendario">
			</article>
		</section>
		<?php 
				$informacion = ControladorUsuarios::miInfo($idusuario);
		?>
			<div id="info">
				<div class="info_datos">
					<label for="user">IDUsuario</label>
					<input type="text" class="buscador_texto" value="<?php echo $idusuario; ?>" disabled>
				</div>
				<div class="info_datos">
					<label for="user">Usuario</label>
					<input type="text" class="buscador_texto" value="<?php echo $informacion['usuario']; ?>" disabled>
				</div>
				<div class="info_datos">
					<label for="mail">Email</label>
					<input type="mail" class="buscador_texto" value="<?php echo $informacion['email']; ?>" disabled>
				</div>
				<div class="info_datos">
					<label for="nombre">Nombre</label>
					<input type="text" class="buscador_texto" value="<?php echo $informacion['nombre']; ?>" disabled>
				</div>
				<figure>
					<img id='avatar' class='avatar' src='../view/imagen.php?id=<?php echo $idusuario; ?>' />
				</figure>
				<form action='../controller/controladorUsuarios.php?action=upload' method='post' enctype='multipart/form-data'>
				<input type='file'  class='boton' name='imagen' id='imagen' />
			    <input type='hidden' name='idusuario' id='idusuario' value="<?php echo $idusuario; ?>">
			    <input type='submit' name='subir' class='boton' value='Subir'/>
				</form>
			</div>

		</section>
		<section class="admin_posts">
			<h3>Administracion de posts</h3>
			<?php 
				$posts = ControladorPosts::misPosts($idusuario);
				foreach ($posts as $post) {
					print("<article class='post' id='" . $post['idpost'] . "'>");
						print("<form action='../controller/controladorPosts.php?action=edit' method='post'>");
							print("<input type='hidden' value='" . $post['idpost'] . "' name='idpost'/>");
							print("<input class='edita_texto' type='text' value='" . $post['post'] . "' name='texto'/>");
							print("<input type='image' src='../resources/images/edit.gif' >");
							print("<a href='../controller/controladorPosts.php?action=delete&id=" . $post['idpost'] . "'><img src='../resources/images/delete.gif'></a>");
						print("</form>");
					print("</article>");
				}
				unset($post);
			 ?>
		</section>
		<section  class="admin_amigos">
			<h3>Administracion de amigos</h3>
			<?php 
				$amigos = ControladorUsuarios::misAmigos($idusuario);
				foreach ($amigos as $amigo) {
					print("<p>" . $amigo['usuario']);
					print("<a href='../controller/controladorUsuarios.php?action=deleteFriend&miid=" . $idusuario . "&idamigo=" . $amigo['idusuario'] . "'><img src='../resources/images/delete.gif'></a></p>");
					
				}
				unset($amigo);
			 ?>
		</section>


		
	</div>
</body>
</html>
