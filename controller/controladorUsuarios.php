<?php
	require_once('../model/usuario.php');
	require_once('../model/accessDB.php');


class ControladorUsuarios{
	function entrar(){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$resultado = Usuario::check($user,$pass);
		if (!$resultado) {
			header("Location: ../view/forbiden.php?error=fail");
		}else{
			header("Location: ../view/index.php");
		}
	}

	function registraUsuario(){
		$datos = array("user" => $_POST['user'], "pass" => $_POST['pass'], "nombre" => $_POST['nombre'], "mail" => $_POST['mail']);
		$resultado = Usuario::insertarUsuario($datos);
		if ($resultado) {
			print("Usuario insertado! :)");
			header("Refresh: 3; url='../view/index.php'");

		}else{
			print("Te faltan datos o tus datos no son correctos. Registro cancelado.");
		}
	}

	function miInfo($idusuario){
		return Usuario::getMyInfo($idusuario);
	}

	function misAmigos($idusuario){
		return Usuario::getMisAmigos($idusuario);
	}

	function atri($post){
		print("<p>Por <a href='../view/user.php?id=" . $post['idusuario'] ."'>" . $post['usuario'] . "</a> <img class='avatar_mini' src='../view/imagen.php?id=" . $post['idusuario'] ."'/> el " . $post['fecha'] . "</p>");
	}

	function esAmigo($id,$idamigo){
		if (Usuario::isFriend($id,$idamigo)) {
			return true;
		}else{
			return false;
	}

	}

	function aniadirAmigo(){
		$id = $_GET['parama'];
		$idamigo = $_GET['paramb'];
		if ($id == $idamigo) {
			print("No puedes ser amigo tuyo!");
			header("Refresh: 2; url='../view/index.php'");
		}else{
			if (self::esAmigo($id,$idamigo)) {
				print("Ya es tu amigo!");
				header("Refresh: 2; url='../view/index.php'");
			}else{
				Usuario::addFriend($id,$idamigo);	
			}
		}
	}

	function subirImagen(){
		$idusuario = $_POST['idusuario'];
		Usuario::uploadImage($idusuario);
	}

	function borrarAmigo($miid, $idamigo){
		Usuario::deleteFriend($miid,$idamigo);
	}

	function buscarUsuario($texto){
		
		$resultado = Usuario::searchUser($texto);
		if (!$resultado) {
			$vuelta = array();
			echo json_encode($vuelta);
		}else{
			echo json_encode($resultado);
			//return($resultado[0]['usuario']);
		}
	}
}
	switch(@$_GET['action']){
		case 'login': 
			ControladorUsuarios::entrar();
			break;
		case 'signin':
			ControladorUsuarios::registraUsuario();
			break;
		case 'add':
			ControladorUsuarios::aniadirAmigo();
			break;
		case 'upload':
			ControladorUsuarios::subirImagen();
			break;
		case 'deleteFriend':
			ControladorUsuarios::borrarAmigo($_GET['miid'],$_GET['idamigo']);
			break;
		case 'search':
			ControladorUsuarios::buscarUsuario($_POST['texto']);
			break;
	}

?>
