<?php
	//session_start();
	require_once('accessDB.php');
	//	Modelo del elemento Usuario
	class Post {
	    protected $user;
	    protected $post;
	    protected $fecha;
	 
	    // Constructor
	    function __construct($datos){
	        $this->user = $datos['user'];
	        $this->pass = $datos['post'];
	        $this->nombre = $datos['fecha'];
	    }
	    
	    // Getters
	    public function getUser(){ return $this->user; }
	    public function getPost(){ return $this->post; }
	    public function getFecha(){ return $this->fecha; }

	    // Otros métodos

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

	    public function insertarPost($datos){
	    	$sql = "INSERT INTO posts(idusuario, post, fecha) VALUES (" . $datos['user'] . ",'" . $datos['post'] . "','" . $datos['fecha'] ."')";
	    	$consulta = self::ejecutaConsulta($sql);
	    	if ($consulta) {
	    		return true;
	    	}else{
	    		return false;
	    	}
	    }

	    public function mostrarPosts($idusuario){
	    	$sql = "SELECT * FROM posts p,usuarios u WHERE p.idusuario = " . $idusuario ." and p.idusuario = u.idusuario";
	 		$consulta = self::ejecutaConsulta($sql);
			$rows = $consulta->rowCount();
			$registros = $consulta->fetchAll();
			// Devuelve los posty el nombre de los amigos
			// SELECT u.nombre,p.post FROM usuarios u, posts p WHERE u.idusuario=p.idusuario AND u.idusuario IN (SELECT idamigo2 from amigos a, usuarios u WHERE u.idusuario = a.idamigo1) 
			 return $registros;
	    }
	    public function getFriendsPosts($idusuario){
	    	
	    	$sql = "SELECT u.*, p.*, a.* FROM usuarios u, posts p, amigos a WHERE a.idamigo1 = " . $idusuario ." and p.idusuario = a.idamigo2 AND u.idusuario = a.idamigo2";

	 		$consulta = self::ejecutaConsulta($sql);
			$rows = $consulta->rowCount();
			$postsAmigos = $consulta->fetchAll();
			return $postsAmigos;
	    }

	    public function getRecentPosts(){
	    	
	    	$sql = "SELECT p.post, u.usuario,u.idusuario from posts p, usuarios u WHERE u.idusuario = p.idusuario ORDER BY p.idpost DESC LIMIT 3";
	 		$consulta = self::ejecutaConsulta($sql);
			$posts = $consulta->fetchAll();
			return $posts;
	    }

	    public function like($idpost){

	    }

	}
	?>

