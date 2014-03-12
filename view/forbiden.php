<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LaRed - Acceso Denegado</title>
	<link rel="stylesheet" href="../resources/css/estructura.css">
	<link rel="stylesheet"  id="estilo" href="../resources/css/ocean.css">
</head>
<body>
	<section id="forbiden">
		<?php 
			include_once("../controller/controlErrores.php");
			print($mensaje);
		 ?>
		<p class='error'>Puedes <a href='../view/login.php'>logearte</a> o <a href='../view/signin.php'>registrarte</a><p>
	</section>
</body>
</html>