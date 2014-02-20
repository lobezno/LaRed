<?php
	require_once('../model/usuario.php');
	require_once('../model/accessDB.php');



	function entrar(){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		Usuario::check($user,$pass);
	}

	function registraUsuario(){
		$datos = array("user" => $_POST['user'], "pass" => $_POST['pass'], "nombre" => $_POST['nombre'], "mail" => $_POST['mail']);
		Usuario::insertarUsuario($datos);
	}

	switch($_GET['action']){
		case 'login': 
			entrar();
			break;
		case 'signin':
			registraUsuario();
			break;
	}

?>
