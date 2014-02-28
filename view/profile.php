<?php if(!isset($_SESSION)){ session_start(); }  
		if (isset($_SESSION['usuario-validado'])) {
			require_once('../controller/controladorUsuarios.php');
			$user = $_SESSION['usuario-validado'];
			$idusuario = $_SESSION['idusuario'];
?>		
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LaRed - Perfil - <?php echo $user; ?></title>
</head>
<body>
	<h1>Perfil</h1>
	<?php 
			echo "Usuario: " . $user . "<br />Idusuario: " . $idusuario;
			print("<p>//////  PRUEBAS ////////////</p>");
			$informacion = ControladorUsuarios::miInfo($idusuario);
			print("<p>Usuario:" . $informacion['usuario'] . "</p>");
			print("<p>Email: " . $informacion['email'] . "</p>");
			print("<p>Nombre: " . $informacion['nombre'] . "</p>");

	?>

</body>
</html>
<?php

	}else{
		//no esta logeado
	}
?>