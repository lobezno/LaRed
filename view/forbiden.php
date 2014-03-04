<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LaRed - Acceso Denegado</title>
</head>
<body>
	<?php 
		include_once("../controller/controlErrores.php");
		print($mensaje);
	 ?>
	<p class='error'>Puedes <a href='../view/login.php'>logearte</a> o <a href='../view/signin.php'>registrarte</a><p>
</body>
</html>