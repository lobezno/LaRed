<?php
	require_once('../model/post.php');
	require_once('../model/accessDB.php');



	function enviar(){
		$hoy = date("Y-m-d");
		$datos = array("user" => $_POST['user'], "post" => $_POST['post'], "fecha" => $hoy);
		Post::insertarPost($datos);
	}


	switch($_GET['action']){
		case 'send': 
			enviar();
			break;

	}

?>
