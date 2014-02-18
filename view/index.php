<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>LaRed</title>
</head>
<body>
	<?php
		include_once('controladorUsuarios.php');

		if (isset($_SESSIOn['usuario_validado'])) {
			//	codigo del usuario validado
		}
		else if(isset($user)){
			//	codigo de fail autentificando

		}else{
			//	codigo de la primera visita
		}
		
	?>
</body>
</html>