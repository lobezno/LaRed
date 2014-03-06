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
	 <noscript>
        <h1>Tu navegador no tiene JavaScript habilitado :(</h1>
        <div class="deshabilitado">
            <img src="images/error.png" alt="Javascript deshabilitado" />
            Ya que LaRed es una web muy molona y supervanguardista, necesitas tener habilitado Javascript para poder visualizar correctamente el contenido.<br />
            Por favor, para ver correctamente este sitio,<br />
            <b><i>habilite javascript</i></b>.<br />
            <br />
            Para ver las instrucciones para habilitar javascript<br />
            en su navegador, haga click 
            <a href="http://www.enable-javascript.com/es/" 
            target="_blank">aquí</a>.
        </div>
            <form method="post" action="//Llamada a javasCript\\">
        <fieldset>
            <label>Usuario</label>
            <input type="text" name="user" id="user" placeholder='Usuario'>
            <label>Password</label>
            <input type="password" name="pass" id="pass" placeholder='Contraseña'>
            <input type="submit" value="Log in" name="enviar" id="enviar">
        </fieldset>
    </form>
    </noscript>
</body>
</html>