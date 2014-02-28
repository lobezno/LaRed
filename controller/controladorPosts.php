<?php
	require_once('../model/post.php');
	require_once('../model/accessDB.php');

class ControladorPosts{


	function enviar(){
		$hoy = date("Y-m-d");
		$datos = array("user" => $_POST['user'], "post" => $_POST['post'], "fecha" => $hoy);
		$resultado = Post::insertarPost($datos);
		if ($resultado) {
			print("Post insertado :)");
			header("Refresh: 2; url='../view/index.php'");
		}else{
			print("Error insertando el post.");
		}
	}

	function volcar($id){
		return Post::mostrarPosts($id);
	}

	function postsAmigos($id){
		return Post::getFriendsPosts($id);
	}
	
}

		switch(@$_GET['action']){
			case 'send': 
				ControladorPosts::enviar();
				break;

		}
?>
