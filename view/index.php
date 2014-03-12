<?php session_start(); ?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	
	<title>LaRed - Index</title>
	<!--css -->
	<link rel="stylesheet" href="../resources/css/estructura.css">
	<link rel="stylesheet" href="../resources/css/responsive.css">

	<!--Js -->
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
	<script type="text/javascript" src="../resources/js/enviarAjax.js"></script>
	<script type="text/javascript" src="../resources/js/meGusta.js"></script>
	<script type="text/javascript" src="../resources/js/buscador.js"></script>
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
			<div id="wrapper_panel">
				<section class="panel_left">
					<h3>Busca Gente</h3>

					<input class="buscador_texto"id="entrada" list="buscaUsuarios" placeholder='Introduce el nombre de usuario  a buscar' autocomplete="off" onchange="javascript:visitarUsuario(this);"/>
					<datalist id="buscaUsuarios">					
					</datalist>
					<input type="button" value="Buscar" onclick="buscar()" onchange="buscar()" class="boton">
				</section>
				<section class="panel_right">
					<h3>Mis Amigos</h3>
					<ul>
					<?php 
					$amigos = ControladorUsuarios::misAmigos($idusuario);
					if (count($amigos) > 0) {
						foreach ($amigos as $amigo) {
							print("<li><a href='../view/user.php?id=" . $amigo['idusuario'] . "'>" . $amigo['usuario'] ."</a></li>");
						}	
						unset($amigo);
					}else{
						print("<p>No tienes  amigos :(((</p>");
					}
					 ?>
					 </ul>
				</section>
				<section id="insertarPost" class="panel_middle">
					<h3>Insertar Comentario</h3>
					<article>
						<form method="post" action="../controller/controladorPosts.php?action=send" enctype='multipart/form-data'>
							<textarea  rows="5" name="post" id='post' placeholder="Que se te pasa por la cabeza?"></textarea>
							<input type="hidden" id='user' name="user" value="<?php echo $idusuario; ?>">
							<input type="file"  name="imagen" id="imagen" class="boton">
							<input type="submit" value="Enviar post" class="boton" />
						</form>
					</article>	
				</section>
				<section class="insertar_oculto">
					<h5>Insertar Comentario</h5>
					<input type="text" name="post" id='post' class="text_oculto" placeholder="Que se te pasa por la cabeza?">
					<input type="hidden" id='user' name="user" value="<?php echo $idusuario; ?>">
					<input type="submit" value="Enviar post" class="boton" />
					<h5>Buscar Gente</h5>
					<input id="entrada" list="buscaUsuarios"  class="text_oculto" placeholder='Introduce el nombre de usuario  a buscar' autocomplete="off" onchange="javascript:visitarUsuario(this);"/>
					<datalist id="buscaUsuarios">					
					</datalist>
					<input type="button" value="Buscar" onclick="buscar()" onchange="buscar()" class="boton">
				</section>
			</div>

			<div class="wrapper_left">
				<section id="misPost" class="section_principal">
				<h3 class="section_titulo">Mis posts</h3>
				<div class="section_wrapper">
			<?php 
				$registros = ControladorPosts::misPosts($idusuario);
				if (count($registros) > 0) {
				foreach ($registros as $registro){
					?>
					<article class="post">
							<header>
								<span class="header_post_der"><?php echo $registro['fecha']; ?></span>
							</header>
							<div id="post_contenido">
								<div class="post_imagen">
									<figure><img class="imagen_preview" src="../view/imagen.php?idpost=<?php echo $registro['idpost']; ?>" alt=""></figure>
									<div class="post_number"><a href="#">#<?php echo $registro['idpost']; ?></a></div>
								</div>
								<div class="post_texto">
									<div class="contenido_izquierda"><img src="../resources/images/comi.png" alt=""></div>
									<div class="contenido_derecha"><img src="../resources/images/comi2.png" alt=""></div>
									<div class="contenido_centro"><p><?php echo $registro['post']; ?></p></div>	
								</div>				
							</div>
							
							<footer class="post_footer">
								<div class="likes">
									<span class="likes_counter">Likes: <?php echo $registro['likes']; ?></span>
									
								</div>
								
							</footer>
						</article>
					<?php
				}
				unset($registro);
				}else{
					print("<p>No tienes actividad reciente. Por que no posteas algo?</p>");
				}
				 ?>
				</div>
				</section>
				<section id="postsAmigos" class="section_principal">
					<h3 class="section_titulo">Posts de mis amigos</h3>
					<div class="section_wrapper">
			<?php 
				$postsAmigos = ControladorPosts::postsAmigos($idusuario);
				if (count($postsAmigos) > 0) {
					foreach ($postsAmigos as $post) {
					?>
						<article class="post">
							<header>
								<span class="header_post_der"><?php echo $post['fecha']; ?></span>
							</header>
							<div id="post_contenido">
								<div class="post_imagen">
									<figure><img class="imagen_preview" src="../view/imagen.php?idpost=<?php echo $post['idpost']; ?>" alt=""></figure>
									<div class="post_number"><a href="#">#<?php echo $post['idpost']; ?></a></div>
								</div>
								<div class="post_texto">
									<div class="contenido_izquierda"><img src="../resources/images/comi.png" alt=""></div>
									<div class="contenido_derecha"><img src="../resources/images/comi2.png" alt=""></div>
									<div class="contenido_centro"><p><?php echo $post['post']; ?></p></div>	
								</div>				
							</div>
							
							<footer class="post_footer">
								<div class="likes">
									<span class="likes_counter">Likes: <?php echo $post['likes']; ?></span>
									<button class="boton_me_gusta" id="post<?php echo $registro['idpost']; ?>" onclick='meGusta(<?php echo $idusuario; ?>,<?php echo $post['idpost']; ?>)'>Me Gusta</button>
								</div>
								<div class="atri">
									<span class="by">Por <a class="by" href="../view/user.php?id=<?php echo $post['idusuario'];?>"><?php echo $post['usuario'] ?></a> <img class='avatar_mini' src="../view/imagen.php?id=<?php echo $post['idusuario']; ?>" /></span>
								</div>
							</footer>
						</article>

					<?php
					}
					unset($post);
				}else{
					print("<p>No tienes actividad de tus amigos :(</p>");
				}
				 ?>
					</div>
				</section>	
			</div>
			<div class="wrapper_right">
				<section id="actividadReciente" class="float_derecha">
					<h3 class="section_titulo">Actividad Reciente</h3>
					<div class="section_wrapper">
			<?php 
				$posts = ControladorPosts::actividadReciente();
				if (count($posts) > 0){
					foreach ($posts as $post) {
					?>
					
						<article class="post">
							<header>
								<span class="header_post_der"><?php echo $post['fecha']; ?></span>
							</header>
							<div id="post_contenido">
								<div class="post_imagen">
									<figure><img class="imagen_preview" src="../view/imagen.php?idpost=<?php echo $post['idpost']; ?>" alt=""></figure>
									<div class="post_number"><a href="#">#<?php echo $post['idpost']; ?></a></div>
								</div>
								<div class="post_texto">
									<div class="contenido_izquierda"><img src="../resources/images/comi.png" alt=""></div>
									<div class="contenido_derecha"><img src="../resources/images/comi2.png" alt=""></div>
									<div class="contenido_centro"><p><?php echo $post['post']; ?></p></div>	
								</div>				
							</div>
							
							<footer class="post_footer">
								<div class="likes">
									<span class="likes_counter">Likes: <?php echo $post['likes']; ?></span>
									<button class="boton_me_gusta" id="post<?php echo $post['idpost']; ?>" onclick='meGusta(<?php echo $idusuario; ?>,<?php echo $post['idpost']; ?>)'>Me Gusta</button>
								</div>
								<div class="atri">
									<span class="by">Por <a class="by" href="../view/user.php?id=<?php echo $post['idusuario'];?>"><?php echo $post['usuario'] ?></a> <img class='avatar_mini' src="../view/imagen.php?id=<?php echo $post['idusuario']; ?>" /></span>
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

				</div>
				</section>
				<section class="float_derecha" id="mejoresPosts">
					<h3 class="section_titulo">Mejores Posts</h3>
					<div class="section_wrapper">
			<?php 
				$topPosts = ControladorPosts::masVotados();
				if (count($topPosts) > 0) {
					foreach ($topPosts as $post) {
						?>
								
		
						<article class="post">
							<header>
								<span class="header_post_der"><?php echo $post['fecha']; ?></span>
							</header>
							<div id="post_contenido">
								<div class="post_imagen">
									<figure><img class="imagen_preview" src="../view/imagen.php?idpost=<?php echo $post['idpost']; ?>" alt=""></figure>
									<div class="post_number"><a href="#">#<?php echo $post['idpost']; ?></a></div>
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
									<button class="boton_me_gusta" id="post<?php echo $post['idpost']; ?>" onclick='meGusta(<?php echo $idusuario; ?>,<?php echo $post['idpost']; ?>)'>Me Gusta</button>
								</div>
								<div class="atri">
									<span class="by">Por <a class="by" href="../view/user.php?id=<?php echo $post['idusuario'];?>"><?php echo $post['usuario'] ?></a> <img class='avatar_mini' src="../view/imagen.php?id=<?php echo $post['idusuario']; ?>" /></span>
								</div>
							</footer>
							
							
						</article>

					<?php
					}
					unset($post);
				}else{
					print("<p>No hay suficientes posts con votos.</p>");
				}

				 ?>
				 </div>
				</section>
			</div>
	</div>
			<section class="amigos_oculto">
					<h3>Mis Amigos</h3>
					<ul>
					<?php 
					$amigos = ControladorUsuarios::misAmigos($idusuario);
					if (count($amigos) > 0) {
						foreach ($amigos as $amigo) {
							print("<li><a href='../view/user.php?id=" . $amigo['idusuario'] . "'>" . $amigo['usuario'] ."</a></li>");
						}	
						unset($amigo);
					}else{
						print("<p>No tienes  amigos :(((</p>");
					}
					 ?>
					</ul>
				</section>
	<footer>
		Footer de LaRed
	</footer>
</body>
</html>