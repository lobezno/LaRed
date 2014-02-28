<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LaRed - SigIn</title>
</head>
<body>
	<form action="../controller/controladorUsuarios.php?action=signin" method="post">
		<label>Usuario</label>
		<input type="text" id="user" name="user" />
		<label>Password</label>
		<input type="password" id="pass" name="pass" />
		<label>Nombre</label>
		<input type="text" id="nombre" name="nombre" />
		<label>Email</label>
		<input type="text" id="mail" name="mail" />
		<input type="submit" value="Registrar" name="enviar" id="enviar">
	</form>	
</body>
</html>
