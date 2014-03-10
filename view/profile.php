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
	<header>
		<a href="../view/index.php">Volver</a>
	</header>
	<section>
		<h1>Perfil</h1>
	<?php 
			echo "Usuario: " . $user . "<br />Idusuario: " . $idusuario;
			print("<p>//////  PRUEBAS ////////////</p>");
			$informacion = ControladorUsuarios::miInfo($idusuario);
			print("<p>Usuario:" . $informacion['usuario'] . "</p>");
			print("<p>Email: " . $informacion['email'] . "</p>");
			print("<p>Nombre: " . $informacion['nombre'] . "</p>");
			print("<figure>");
			print("<img id='avatar' class='avatar' src='../view/imagen.php?id=" . $idusuario . "' />");
			print("<form action='../controller/controladorUsuarios.php?action=upload' method='post' enctype='multipart/form-data'>");
		    print("<label for='imagen'>Imagen:</label>");
		    print("<input type='file' name='imagen' id='imagen' />");
		    print("<input type='hidden' name='idusuario' id='idusuario' value=" . $idusuario . ">");
		    print("<input type='submit' name='subir' value='Subir'/>");
			print("</form>");
			print("</figure>");

	?>
	</section>
	<section>
		<h3>Administracion de posts</h3>
		<?php 
			$posts = ControladorPosts::misPosts($idusuario);
			foreach ($posts as $post) {
				print("<article class='post' id='" . $post['idpost'] . "'>");
					print("<form action='../controller/controladorPosts.php?action=edit' method='post'>");
						print("<input type='hidden' value='" . $post['idpost'] . "' name='idpost'/>");
						print("<input type='text' value='" . $post['post'] . "' name='texto'/>");
						print("<input type='image' src='../resources/images/edit.gif' >");
						print("<a href='../controller/controladorPosts.php?action=delete&id=" . $post['idpost'] . "'><img src='../resources/images/delete.gif'></a>");
					print("</form>");
				print("</article>");
			}
			unset($post);
		 ?>
	</section>
	<section>
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


	<section id="calendario">
	<div class="postit_oculo" id="postit">
		</div>
		<article id="contenedor_calendario">
		</article>
	</section>
</body>
</html>
