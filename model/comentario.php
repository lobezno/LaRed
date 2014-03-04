<?php 
	require_once('accessDB.php');
	//	Modelo del elemento Comentario
	class Comentario{
	    protected $idcomentario;
	    protected $recipiente;
	    protected $remitente;
	    protected $fecha;

	    protected static function ejecutaConsulta($sql) {
	        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
	        $host = "mysql:host=localhost;dbname=lared";
	        $dbuser = 'root';
	        $dbpass = '';
	        $pdo = new PDO($host, $dbuser, $dbpass, $opciones);
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $resultado = null;
	        if (isset($pdo)) $resultado = $pdo->query($sql);
	        return $resultado;
	    }

	    function getComments($idusuario){
	    	$sql = "SELECT * FROM comentarios c, usuarios u WHERE c.recipiente = " . $idusuario . " AND c.remitente = u.idusuario";
	    	$resultado = self::ejecutaConsulta($sql);
	    	$comentarios = $resultado->fetchAll();
	    	return $comentarios;

	    }

	    function insertComment($recipiente,$remitente,$comentario){
	    	$hoy = date("Y-m-d");
	    	$sql = "INSERT INTO comentarios(recipiente,remitente,comentario,fecha) VALUES (" . $recipiente . "," . $remitente . ",'" . $comentario . "','" . $hoy . "')";
	    	$resultado = self::ejecutaConsulta($sql);
	    	var_dump($resultado);
	    	if (count($resultado) > 0) {
	    		return true;
	    	}else{
	    		return false;
	    	}

	    }

	}
 ?>