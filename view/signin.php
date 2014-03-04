<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LaRed - SigIn</title>
</head>
<body>
	<form action="../controller/controladorUsuarios.php?action=signin" method="post">
		<label for="user">Usuario</label>
		<input type="text" id="user" name="user" />
		<label for="password">Password</label>
		<input type="password" id="pass" name="pass" />
		<label for="passwordb">Repite Password</label>
		<input type="passwordb" id="passb" name="passb" />
		<label for="nombre">Nombre</label>
		<input type="text" id="nombre" name="nombre" />
		<label for="mail">Email</label>
		<input type="text" id="mail" name="mail" />
		<input type="submit" value="Registrar" name="enviar" id="enviar">
	</form>	
</body>
</html>
