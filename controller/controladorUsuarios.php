<?php
	require_once('../model/usuario.php');
	require_once('../model/accessDB.php');


	function entrar($user,$pass){
		Usuario::check($user,$pass);
	}
?>