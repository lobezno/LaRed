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

	    public function insertarPost($datos){
	    	$pdo =  new PDO ('mysql:host=localhost;dbname=lared','root','') or die("Error de conexion.");
	    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    	$sql = "INSERT INTO posts(idusuario, post, fecha) VALUES (" . $datos['user'] . ",'" . $datos['post'] . "','" . $datos['fecha'] ."')";
	    	$consulta = $pdo->exec($sql);
	    	if ($consulta) {
	    		print("Insertado.");
	    	}else{
	    		print("Ha habido un error al guardar tu mensaje.");
	    	}
	    }

	    public function mostrarPosts($idusuario){
	    	$pdo =  new PDO ('mysql:host=localhost;dbname=lared','root','') or die("Error de conexion.");
	    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    	$sql = "SELECT * FROM posts WHERE idusuario=" . $idusuario;
	 		$consulta = $pdo->query($sql);
			$rows = $consulta->rowCount();
			$registros = $consulta->fetchAll();
			 return $registros;
	    }
	}

	?>

