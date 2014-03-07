<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>LaRed - SigIn</title>
	<script type="text/javascript" src="../resources/js/validacion.js"></script>
</head>
<body>
	<form action="../controller/controladorUsuarios.php?action=signin" method="post">
		<label for="user">Usuario</label>
		<input type="text" id="user" name="user" required/>
		<label for="password" >Password</label>
		<input type="password" id="pass" name="pass" required/>
		<label for="passwordb" >Repite Password</label>
		<input type="passwordb" id="passb" name="passb" required/>
		<label for="nombre">Nombre</label>
		<input type="text" id="nombre" name="nombre" required/>
		<label for="mail">Email</label>
		<input type="text" id="mail" name="mail" />
		<input type="submit" value="Registrar" name="enviar" id="enviar" onclick="validarFormulario()">
	</form>	
</body>
</html>
