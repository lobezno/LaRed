<?php 
	include_once('../model/comentario.php');
	class ControladorComentarios{

		function volcarComentarios($idusuario){
			return Comentario::getComments($idusuario);
		}

		function insertarComentario(){
			$recipiente = $_POST['recipiente'];
			$remitente = $_POST['remitente'];
			$comentario = $_POST['comentario'];
			$respuesta = Comentario::insertComment($recipiente,$remitente,$comentario);
			if ($respuesta) {
				header("Location: ../view/user.php?id=" . $recipiente);
			}else{
				print("Error insertarndo comentario");
			}
		}
	
	}

	switch (@$_GET['action']) {
		case 'insertarComentario':
			ControladorComentarios::insertarComentario();
			break;
	}


 ?>