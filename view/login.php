<?php session_start(); ?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>LaRed - Login</title>
</head>
<body>
	<form method="post" action="../controller/controladorUsuarios.php?action=login">
		<fieldset>
			<label>Usuario</label>
			<input type="text" name="user" id="user" placeholder='Usuario'>
			<label>Password</label>
			<input type="password" name="pass" id="pass" placeholder='Contraseña'>
			<input type="submit" value="Log in" name="enviar" id="enviar">
		</fieldset>
	</form>
</body>
</html>