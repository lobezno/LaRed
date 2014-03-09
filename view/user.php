<!doctype html> <?php session_start();
		include_once('../controller/acceso.php');
		include_once('../controller/controladorUsuarios.php');
		include_once('../controller/controladorComentarios.php');
		$id = $_GET['id'];
		$info = ControladorUsuarios::miInfo($id);

 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LaRed - Usuario <?php echo $info['usuario']; ?> </title>
	<link rel="stylesheet" href="../resources/css/estructura.css">

</head>
<body>
	<header>
		<a href="../view/index.php">Volver</a>
		<?php 
		print("<a href='../controller/controladorUsuarios.php?action=add&parama=" . $_SESSION['idusuario'] ."&paramb=" . $info['idusuario'] . "'>Añadir a mis amigos</a>") 
		?>
	</header>
	<h1>USER  <?php echo $info['usuario']; ?> </h1>
	<label for="nombre">Nombre: <span id='nombre'><?php echo $info['nombre']; ?></span></label>
	<label for="email">Email: <span id='email'><?php echo $info['email']; ?></span></label>
	<figure>
		<img id='avatar' class='avatar' src='../view/imagen.php?id=<?php echo $info['idusuario']; ?>'/>
	</figure>
	<section id='comentarios'>
		<?php 

			$comentarios = ControladorComentarios::volcarComentarios($info['idusuario']); 
			if (count($comentarios) > 0) {
				foreach ($comentarios as $comentario) {
					print("<article class='comentario'>");
					print("<p>" . $comentario['comentario'] ."<p>");
					ControladorUsuarios::atri($comentario);
					print("</article>");
				}
				unset($comentario);
				
			}else{
				print($info['usuario'] . " no tiene comentarios.");
			}

		?>
		<div id="insertarComentario">
			<form action="../controller/controladorComentarios.php?action=insertarComentario" method="post">
				<label for="comentario">Comentario</label>
				<textarea placeholder="Escribe algo" id="comentario" name="comentario"></textarea>
				<input type="hidden" id="remitente" name="remitente" value="<?php echo $idusuario; ?>" /> 
				<input type="hidden" id="recipiente" name="recipiente" value="<?php echo $id; ?>" /> 
				<input type="submit" value="Enviar comentario" />
			</form>
		</div>
	</section>
</body>
</html>