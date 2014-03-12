<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>LaRed - SigIn</title>
	<link rel="stylesheet" href="../resources/css/estructura.css">
	<link rel="stylesheet"  id="estilo" href="../resources/css/ocean.css">
	<script type="text/javascript" src="../resources/js/validacion.js"></script>
</head>
<body>
	<div id="menu">
			<nav>
					<ul>
							<li><a href='../view/login.php' alt="Enlace a la seccion Acceder">Log In</a></li>
					</ul>
			</nav>
		</div>
	<header id="cabecera" alt="Cabecera de La Red.">
	Header - La Red
	</header>

	<div id="wrapper_total">
	<section id="signin">
		<h3 id="titulo_signin" alt="Registrate para poder acceder a nuestra red social.">Registrate</h3>
		<div class="wrapper_sign_in">
			<form action="../controller/controladorUsuarios.php?action=signin" method="post" alt="Formulario de ingreso.">
				<label for="user" class="etiqueta_signin">Usuario</label>
				<input type="text" id="user" name="user" class="texto_signin" required autofocus alt="Campo de Usuario. Introduce tu nick."/>
				<label for="password"  class="etiqueta_signin">Password</label>
				<input type="password" id="pass" name="pass" class="texto_signin" required alt="Campo de la contraseña."/>
				<label for="passwordb"  class="etiqueta_signin">Repite Password</label>
				<input type="passwordb" id="passb" name="passb" class="texto_signin" alt="Campo para repetir la misma contraseña de antes." required/>
				<label for="nombre" class="etiqueta_signin">Nombre</label>
				<input type="text" id="nombre" name="nombre" class="texto_signin" alt="Campo para introducir tu nombre de pila." required/>
				<label for="mail" class="etiqueta_signin">Email</label>
				<input type="email" id="mail" name="mail" class="texto_signin" alt="Campo para tu email. Nos servirá de comunicación." required/><br/>
				<input type="submit" value="Registrar" name="enviar" id="enviar" onclick="validarFormulario()" class="boton">
			</form>	
		</div>
	</section>
	</div>
</body>
</html>
