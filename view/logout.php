<?php 
	session_start();
	if (isset($_SESSION['usuario-validado'])) {
		print("<h3>Adios " . $_SESSION['usuario-validado'] . " !!</h3>");
		session_destroy();
		header("Refresh: 2; url='../view/index.php'");
		
	}else{
		print("<h3>No estás conectado!</h3>");
		header("Refresh: 2; url='../view/index.php'");
	}

 ?>