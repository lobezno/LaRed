<?php
	require_once('../model/post.php');
	require_once('../model/accessDB.php');

class ControladorPosts{


	function enviar(){
		$hoy = date("Y-m-d");
		$datos = array("user" => $_POST['user'], "post" => $_POST['post'], "fecha" => $hoy);
		Post::insertarPost($datos);
	}

	function volcar($id){
		return Post::mostrarPosts($id);
	}
	
}

		switch(@$_GET['action']){
			case 'send': 
				ControladorPosts::enviar();
				break;

		}
?>
