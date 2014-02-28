<?php
	require_once('../model/usuario.php');
	require_once('../model/accessDB.php');


class ControladorUsuarios{
	function entrar(){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$resultado = Usuario::check($user,$pass);
		if ($resultado) {
			print("true");
		}else{
			print("false");
		}
	}

	function registraUsuario(){
		$datos = array("user" => $_POST['user'], "pass" => $_POST['pass'], "nombre" => $_POST['nombre'], "mail" => $_POST['mail']);
		$resultado = Usuario::insertarUsuario($datos);
		if ($resultado) {
			print("Usuario insertado! :)");
			header("Refresh: 3; url='../view/index.php'");

		}else{
			print("Mal :(");
		}
	}

	function miInfo($idusuario){
		return Usuario::getMyInfo($idusuario);
	}
}
	switch(@$_GET['action']){
		case 'login': 
			ControladorUsuarios::entrar();
			break;
		case 'signin':
			ControladorUsuarios::registraUsuario();
			break;
	}

?>
