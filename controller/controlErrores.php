<?php 
	if (isset($_GET['error'])) $error = $_GET['error'] ;
		else 
			$error="";

	switch ($error) {
		case 'fail':
				$mensaje = "Tu usuario o password son incorrectos";
			return $mensaje;
			break;
		
		default:
			$mensaje = "No tienes acceso a esta secci&oacute;n!";
			return $mensaje;
			break;
	}

 ?>