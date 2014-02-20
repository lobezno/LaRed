<?php
	session_start();
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
	    	print($datos['fecha']);


	    	$sql = "INSERT INTO posts(idusuario, post, fecha) VALUES (" . $datos['user'] . ",'" . $datos['post'] . "','" . $datos['fecha'] ."')";
	    	print($sql);
	    	$consulta = $pdo->exec($sql);
	    	if ($consulta) {
	    		print("Insertado.");
	    	}else{
	    		print("Error Insertando!!!!!!!!!");
	    	}
	    }
	}

	?>

