<?php if(!isset($_SESSION)){ session_start(); }  
			require_once('../controller/acceso.php');
			require_once('../controller/controladorUsuarios.php');

?>		
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LaRed - Perfil - <?php echo $user; ?></title>
	<link rel="stylesheet" href="../resources/css/pruebas.css">
	<script type="text/javascript" src="../resources/js/calendario.js"></script>
</head>
<body>
	<header>
		<a href="../view/index.php">Volver</a>
	</header>
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
			print("</figure>");
			http://localhost/lared/view/imagen.php?id=1

	?>

	<section>
		<form action="../controller/controladorUsuarios.php?action=upload" method="post" enctype="multipart/form-data">
		    <label for="imagen">Imagen:</label>
		    <input type="file" name="imagen" id="imagen" />
		    <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $idusuario; ?>">
		    <input type="submit" name="subir" value="Subir"/>
		</form>
	</section>
	<section id="calendario">
		<article id="contenedor_calendario">
			
		</article>
	</section>
</body>
</html>
