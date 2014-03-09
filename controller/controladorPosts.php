<?php
	require_once('../model/post.php');
	require_once('../model/accessDB.php');

class ControladorPosts{


	function enviar(){
		$hoy = date("Y-m-d");
		$datos = array("user" => $_POST['user'], "post" => $_POST['post'], "fecha" => $hoy);
		$resultado = Post::insertarPost($datos);
		if ($resultado) {
			header("Location: ../view/index.php");
		}else{
			print("Error insertando el post.");
		}
	}

	function misPosts($id){
		return Post::mostrarPosts($id);
	}

	function postsAmigos($id){
		return Post::getFriendsPosts($id);
	}

	function actividadReciente(){
		return Post::getRecentPosts();
	}

	function meGusta($idpost,$idusuario){


		if (self::yaGusta($idpost,$idusuario)) {
			print("Un solo me gusta por persona! No seas avaricioso.:)");
			header("Refresh: 1; url='../view/index.php'");
		}else{
			$resultado = Post::like($idpost,$idusuario);
			if ($resultado) {
				print("Te gusta :)");
				header("Refresh: 2; url='../view/index.php'");
			}else{
				print("Error.");
				header("Refresh: 2; url='../view/index.php'");
			}
		}
		
	}

	function yaGusta($idpost,$idusuario){
		return Post::checkLike($idpost,$idusuario);
	}

	function masVotados(){
		return Post::topPost();
	}

	function borrarPost($idpost){
		$resulatado = Post::delete($idpost);
		if ($resulatado) {
			print("Post borrado.");
			header("Refresh: 2; url='../view/profile.php'");
		}
	}

	function editarPost($idpost,$texto){
		$resultado = Post::edit($idpost,$texto);
		if ($resultado) {
			print("Editado! ;)");
			header("Refresh: 2; url='../view/profile.php'");
		}else{
			print("Error editando el post.");
			header("Refresh: 2; url='../view/profile.php'");
		}
	}
	
}

		switch(@$_GET['action']){
			case 'send': 
				ControladorPosts::enviar();
				break;
			case 'like': 
				ControladorPosts::meGusta(@$_GET['id'],@$_GET['idusuario']);
				break;
			case 'delete':
				ControladorPosts::borrarPost(@$_GET['id']);
				break;
			case 'edit':
				$idpost = $_POST['idpost'];
				$texto = $_POST['texto'];
				ControladorPosts::editarPost($idpost,$texto);
				break;

		}
?>
