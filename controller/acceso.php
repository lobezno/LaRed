<?php 
	if (isset($_SESSION['usuario-validado'])) {
			$user = $_SESSION['usuario-validado'];
			$idusuario = $_SESSION['idusuario'];
	}else if (isset($_SESSION['fail'])) {
		header("Location: ../view/forbiden.php?error=fail");
		print($_SESSION['fail']);
	}else{
		header("Location: ../view/forbiden.php?");
	}

 ?>